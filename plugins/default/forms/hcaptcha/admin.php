<p><?php echo ossn_print('hcaptcha:com:note');?></p>
 <div>
 	<label><?php echo ossn_print('hcaptcha:com:site_key');?></label>
    <?php if(is_object($params['hcaptcha'])) { ?>
        <input type="text" name="hcaptcha_site_key" value="<?php echo $params['hcaptcha']->hcaptcha_site_key;?>" />
    <?php } else { ?>
        <input type="text" name="hcaptcha_site_key" value="" />
    <?php } ?>
 </div>
 <div>
   <label><?php echo ossn_print('hcaptcha:com:secret_key');?></label>
   <?php if(is_object($params['hcaptcha'])) { ?>
       <input type="text" name="hcaptcha_secret_key" value="<?php echo $params['hcaptcha']-> hcaptchasecretkey;?>" />
   <?php } else { ?>
       <input type="text" name=" hcaptchasecretkey "value="" />
   <? php}?>
 </div> 
<div> 
    	<input type = "submit"class ="btn btn-success"/> 
</ div>
