<?php
echo "<p>" . ossn_print('hcaptcha:com:note') . "</p>";
?>

<div>
    <label><?php echo ossn_print('hcaptcha:com:site_key'); ?></label>
    <?php if (isset($params['hcaptcha']) && isset($params['hcaptcha']->hcaptcha_site_key)): ?>
        <input type="text" name="hcaptcha_site_key" value="<?php echo $params['hcaptcha']->hcaptcha_site_key; ?>" />
    <?php else: ?>
        <input type="text" name="hcaptcha_site_key" value="" />
    <?php endif; ?>
</div>

<div>
    <label><?php echo ossn_print('hcaptcha:com:secret_key'); ?></label>
    <?php if (isset($params['hcaptcha']) && isset($params['hcaptcha']->hcaptcha_secret_key)): ?>
        <input type="text" name="hcaptcha_secret_key" value="<?php echo $params['hcaptcha']->hcaptcha_secret_key; ?>" />
    <?php else: ?>
        <input type="text" name="hcaptcha_secret_key" value="" />
    <?php endif; ?>
</div>

<div>
    <input type="submit" class="btn btn-success" />
</div>
