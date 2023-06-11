<?php
/**
 * Open Source Social Network
 *
 * @packageOpen Source Social Network
 * @author    Open Social Website Core Team <info@informatikon.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */

define('hcaptcha', ossn_route()->com . 'hcaptcha/');

/**
 * hcaptcha initialize
 *
 * @return void
 */
function hcaptcha_init()
{
  ossn_extend_view('forms/signup/before/submit', 'hcaptcha/view');
  ossn_extend_view('forms/resetlogin/before/submit', 'hcaptcha/view');
  ossn_register_callback('action', 'load', 'hcaptcha_check');
  ossn_register_com_panel('hcaptcha', 'settings');
  if(ossn_isAdminLoggedin()){
    ossn_register_action('hcaptcha/admin/settings', hcaptcha . 'actions/admin.php');
  }
}

/**
 * hcaptcha the actions which you wanted to validate
 *
 * @return array
 */
function hcaptcha_actions_validate()
{
  return ossn_call_hook('hcaptcha', 'actions', false, array(
    'user/register',
    'resetlogin'
  ));
}

/**
 * Validate the hcaptcha actions
 *
 * @param string $callback The callback type
 * @param string $type The callback type
 * @param array $params The option values
 *
 * @return string
 */
function hcaptcha_check($callback, $type, $params)
{
  $hcaptcha_data = input('h-captcha-response');
  if (isset($params['action']) && in_array($params['action'], hcaptcha_actions_validate()) && !hcaptcha_verify($hcaptcha_data)) {
    if ($params['action'] == 'user/register') {
      header('Content-Type: application/json');
      echo json_encode(array(
        'dataerr' => ossn_print('hcaptcha:error'),
      ));
      exit;
    } else {
      ossn_trigger_message(ossn_print('hcaptcha:error'));
      redirect(REF);
    }
  }
}

/**
 * Verify a captcha based on the input value entered by the user and the seed token passed.
 *
 * @param string $input_value
 * @return bool
 */
function hcaptcha_verify($input_value)
{
  ini_set('allow_url_fopen', 1);

  $hcaptchaCom = new OssnComponents();

  $hcaptcha = $hcaptchaCom->getSettings('hcaptcha');

  $vetParametros = array(
    "secret" => $hcaptcha->hcaptcha_secret_key,
    "response" => $input_value,
    "remoteip" => $_SERVER["REMOTE_ADDR"]
  );
  $curlhcaptcha = curl_init();
  curl_setopt($curlhcaptcha, CURLOPT_URL, "https://api.hcaptcha.com/siteverify");
  curl_setopt($curlhcaptcha, CURLOPT_POST, true);
  curl_setopt($curlhcaptcha, CURLOPT_POSTFIELDS, http_build_query($vetParametros));
  curl_setopt($curlhcaptcha, CURLOPT_RETURNTRANSFER, true);
  $vetResposta = json_decode(curl_exec($curlhcaptcha), true);
  curl_close($curlhcaptcha);
  if (isset($vetResposta["success"]) && $vetResposta["success"]) {
    return true;
  } else {
    return false;
  }
}

ossn_register_callback('ossn', 'init', 'hcaptcha_init');