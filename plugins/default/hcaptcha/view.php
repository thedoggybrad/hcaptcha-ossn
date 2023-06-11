<?php
$hcaptchaCom = new OssnComponents();

$hcaptcha = $hcaptchaCom->getSettings('hcaptcha');
?>

<div class="margin-top-10">
  <div class="h-captcha" data-sitekey="<?= $hcaptcha->hcaptcha_site_key ?>"></div>
</div>

<script src="https://js.hcaptcha.com/1/api.js" async defer></script>

<style>
@media only screen and (max-width: 500px) {
.h-captcha {
transform:scale(0.77);
transform-origin:0 0;
}
}
@media only screen and (max-width: 991px) and (min-width: 768px) {
.h-captcha {
transform:scale(0.86);
transform-origin:0 0;
}
}
</style>