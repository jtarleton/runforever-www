<?php 

class GoogleCaptchaValidator extends sfValidatorBase 
{
    protected function doClean($value) {


 				$ipAddress = $_SERVER['REMOTE_ADDR'];
                if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
                  $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
                }

                $googlepost = array();
                $googlepost['url'] ='https://www.google.com/recaptcha/api/siteverify';
                $googlepost['params'] = array();
                $googlepost['params']['secret'] ='6LdH8BYTAAAAAMNaWk-jp-eLAlD2QGZjZDlOI86y';
                $googlepost['params']['response'] = $value;
                $googlepost['params']['remoteip'] =$ipAddress;
                $ch = curl_init($googlepost['url']);
                $opts = array(
                  CURLOPT_HEADER=>0,
                  CURLOPT_URL => $googlepost['url'], 
                  CURLOPT_POST => true,
                  
                  CURLOPT_RETURNTRANSFER => true
                );
                curl_setopt_array($ch, $opts);

                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($googlepost['params']));

                $returnCurl = curl_exec($ch);
                curl_close($ch);

                $captchaStatus = json_decode($returnCurl, true);
				/* 
				                {
				  "success": true|false,
				  "error-codes": [...]   // optional
				} */
				$captchaOK = (bool) $captchaStatus['success'];










        if($captchaOK!==true){
           throw new sfValidatorError($this, "Bad captcha response: $value ". var_export($captchaStatus, true));
        }
        return $value; //this return is critical!
    }
}