<?php

$com = new OssnComponents;
$params = $com->getSettings('hcaptcha');
echo ossn_view_form('hcaptcha/admin', array(
    'action' => ossn_site_url() . 'action/hcaptcha/admin/settings',
	'params' => array('hcaptcha' => $params),
    'class' => 'ossn-admin-form'	
));