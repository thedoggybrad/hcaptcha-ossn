<?php
 $component = new OssnComponents;
 
 $site_key = input('hcaptcha_site_key');
 $secret_key = input('hcaptcha_secret_key');
 if(empty($site_key)){
	 ossn_trigger_message(ossn_print('hcaptcha:site_key:empty'), 'error');
	 redirect(REF);
 }else if(empty($secret_key)){
   ossn_trigger_message(ossn_print('hcaptcha:secret_key:empty'), 'error');
   redirect(REF);
 }
 $vars = array(
	'hcaptcha_site_key' => $site_key,
	'hcaptcha_secret_key' => $secret_key,
  );
 if($component->setSettings('hcaptcha', $vars)){
	 ossn_trigger_message(ossn_print('hcaptcha:saved'));
	 redirect(REF);
 } else {
	 ossn_trigger_message(ossn_print('hcaptcha:save:error'), 'error');
	 redirect(REF);	 
 }