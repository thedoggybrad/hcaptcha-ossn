    <p><?php echo ossn_print('hcaptcha:com:note');?></p>
 <div>
 	<label><?php echo ossn_print('hcaptcha:com:site_key');?></label>
    <input type="text" name="hcaptcha_site_key" value="<?php echo $params['hcaptcha']->hcaptcha_site_key;?>" />
 </div>
 <div>
   <label><?php echo ossn_print('hcaptcha:com:secret_key');?></label>
   <input type="text" name="hcaptcha_secret_key" value="<?php echo $params['hcaptcha']->hcaptcha_secret_key;?>" />
 </div>
 <div>
 	<input type="submit" class="btn btn-success"/>
 </div>
