<?php
/*
  Plugin Name: Custom Registration
  Plugin URI: https://code.tutsplus.com
  Description: Updates user rating based on number of posts.
  Version: 1.0
  Author: Agbonghama Collins
  Author URI: http://tech4sky.com
 */
function registration_form( $username, $password, $email, $nickname ,$saleid ) {
    echo '
    <style>
    div {
      margin-bottom:2px;
    }
     
    input{
        margin-bottom:4px;
    }
    </style>
    ';
 
    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post" id="reform">
    <div style=" position: relative;">
    <label for="username"style="width:15%;font-size: 15px;">會員帳號 <strong></strong></label>
    <input type="text"  name="username" id="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '"maxlength="10" autocomplete="off" onblur="cona();" onkeyup="cona();"   style="text-transform:uppercase;width:70%;height: 2.5em;display: inline-block;color:black;"  placeholder="4 ~ 10位英、數字符" >
    <span id="usernameaa" style="position: absolute;right:0px;height:2.2em;margin-right:11.4%;margin-top:2.4%;">&nbsp;&nbsp;</span>
    </div>
	<div id="usernamea" style="margin-left:22%;line-height:25px">&nbsp;&nbsp;</div>
   
	 

      
    <div style=" position: relative;">
    <label for="nickname" style="width:15%;text-align:justify;text-justify:inter-ideograph;font-size: 15px;">暱稱</label>
    <input type="text" style="width:70%;height: 2.5em;display: inline-block;color:black;" name="nickname" onkeyup="conn();" id="nickname" value="' . ( isset( $_POST['nickname']) ? $nickname : null ) . '"maxlength="5" autocomplete="off" placeholder="1 ~ 5位中、英、數字符">
	
	<span id="nicknameaa" style="position: absolute;right:0px;height:2.2em;margin-right:11.4%;margin-top:2.4%;">&nbsp;&nbsp;</span>
    </div>
	<div><div id="nicknamea" style="margin-left:22%;line-height:25px">&nbsp;&nbsp;</div></div>
	
	
	
	<div id="psw">
    <label for="password" style="width:15%;font-size: 15px;">帳號密碼 <strong></strong></label>
    <input type="text" style="width:70%;height: 2.5em;color:black;" name="password" onblur="conp();" onkeyup="conp();" id="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '"maxlength="10" autocomplete="off"  placeholder="6 ~ 10位英、數字符">
	<div class="btn_blankEye">
    <div class="icon_blankEye"></div>
    </div>
	
    </div>
    <div><div id="passwordaa" style="margin-left:22%;line-height:25px">&nbsp;&nbsp;</div></div>
	<hr style="margin-top:0px;">
	

	
	<div class="btn_poz" style=" position: relative;">
    <label for="saleid" style="position: absolute;width:15%;height: 2.5em;display:inline-block;font-size: 15px;">經銷商<br>帳號</label>
    <input type="text" class="form-control"  style="margin-left:15%;position: absolute;display:inline-block;width: 70%;padding-right: 80px;height: 2.5em;color:black;" name="saleid" id="saleid"  value="" autocomplete="off"  maxlength="10" placeholder="沒有推薦的經銷商可不填寫">
	
    </div>
	<div><div style="margin-left:22%;line-height:25px">&nbsp;&nbsp;</div></div>
	
	
	
    <div class="btn_poz" style=" position: relative;">
    <label for="email" style="width:15%;font-size: 15px;">手機號碼</label>
    <input type="text" class="form-control"  style="display: inline-block;width: 70%;padding-right: 80px;height: 2.5em;color:black;" name="email" id="email" onkeyup="phonesend();" value="" autocomplete="off" onfocus="allinput();" maxlength="10">
	
	<button type="button" class="btn btn-primary btn-lg"  style="position: absolute;right:0px;height:2.2em;margin-right:8.7%;background-color:#025fff;border:0px;"  id="phonecon" onclick="reconphone();" disabled="disabled">簡訊</button>
    </div>
	
	<div><div id="emailaa" style="margin-left:22%;line-height:25px">&nbsp;&nbsp;</div></div>
	  
	  
	  
	<div class="btn_poz" style=" position: relative;">
	 
    <label for="conre" style="width:15%;font-size: 15px;"> 驗證碼</label>
    <input type="text" class="form-control"  style="display: inline-block;width: 70%;padding-right: 80px;height: 2.5em;color:black;" name="conre" id="conre" value="" autocomplete="off"  maxlength="4" disabled="disabled">
	<button type="button" class="btn btn-primary btn-lg"  style="position: absolute;top:0;right:0px;margin-right:8.7%;margin-bottom: 1px;height:2.2em;background-color:#025fff;border:0px;" onclick="allr();" id="phonerecon" disabled="disabled" >送出</button>

	</div>
	
	<div><div id="emailaa" style="margin-left:22%;line-height:25px">&nbsp;&nbsp;</div></div>
	  
<hr style="margin-top:0px;">
	  
	  
	<div>
    <input type="checkbox" checked="checked" style="width:30px;height:25px;" id="check0" name="check0"><label for="check0">&nbsp;&nbsp;是否通過手機接收優惠訊息</label>
	</div>
	<div>
    <input type="checkbox" checked="checked" style="width:30px;height:25px;" id="check1" name="check1"><label for="check1">&nbsp;&nbsp;我已年滿18歲，並同意投注相關規範以及服務條款</label>
	</div>
	<br>
	
	
	<div style="text-align:center;">
    <input type="submit" id="formsub" class="btn btn-primary btn-lg" style="background-color:#025fff;border-radius:6px;border:0px;width:90%;margin-left:-3%;" name="submit" value="確認送出" disabled="disabled"  />
	</div>
	
	

	  
	  
    </form>
	
    ';
}
function registration_validation()  {
    global $reg_errors;
$reg_errors = new WP_Error;


    if ( is_wp_error( $reg_errors ) ) {
 
        foreach ( $reg_errors->get_error_messages() as $error ) {
         
            echo '<div>';
            echo '<strong>ERROR</strong>:';
            echo $error . '<br/>';
            echo '</div>';
             
        }
     
    }
}
    function complete_registration() {
        global $reg_errors, $username, $password, $email, $nickname, $saleid,$passwordcon;
        if ( 1 > count( $reg_errors->get_error_messages() ) ) {
            $userdata = array(
            'user_login'    =>   $username,
            'user_email'    =>   $email,
            'user_pass'     =>   $password,
            'nickname'      =>   $nickname,
	
            );
            $user = wp_insert_user( $userdata );
            global $wpdb;
	
			
			
			$email = substr($email,0,10);
			
			$data = [ 'saleid' => $saleid ,'phone' => $email,'passwordcon' => $password];
  			$format = [ '%s','%s','%s'];
   			$where = [ 'user_login' => $username];
			$wpdb->update( $wpdb->prefix . 'users', $data, $where );
			
			$data = [ 'user_login' => $username ,'bagname' => 'mainbag','balance' => '0' ,'bag_id' => '0'];
  			$format = [ '%s','%s','%s','%s'];
   			
			$wpdb->insert( $wpdb->prefix . 'bag', $data, $format );
			echo  "
			<script>
			var creatname = '".$username."';
			var creatpsd = '".$password."';

				$.ajax({
  			  type: 'POST',
  			  url: '../wp-content/themes/new/ag/creatuser.php',
  			  data: 'creatname=' + creatname + '&creatpsd=' + creatpsd,
 			   success: function(response) {
 		       if (response == 'null') {
		
		            console.log(response);
		        } else {
		
		            console.log(response);
		        }
		    },
		    error: function() {
		        console.log('錯誤');
		    }
			});
			</script>
			
			";
			
			
			header('Location:http://08-2.xyz/');
			
        }
    }
    function custom_registration_function() {
        if ( isset($_POST['submit'] ) ) {
            registration_validation(
            $_POST['username'],
            $_POST['password'],
            $_POST['nickname'],
			$_POST['saleid'],
		
				
            );
             
            // sanitize user form input
            global $username, $password, $email, $nickname,$phone;
            $username   =   sanitize_user( $_POST['username'] );
            $password   =   esc_attr( $_POST['password'] );
            $email      =   $_POST['email']."@gmail.com";
            $nickname   =   sanitize_text_field( $_POST['nickname'] );
			$saleid  =	 $_POST['saleid'];
			
     
            // call @function complete_registration to create the user
            // only when no WP_error is found
            complete_registration(
            $username,
            $password,
            $email,
            $nickname,
			$saleid,
		

            );
        }
     
        registration_form(
            $username,
            $password,
            $email,
            $nickname,
			$saleid,
			$passwordcon
			
            );
		
    }
    // Register a new shortcode: [cr_custom_registration]
add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}


add_action( 'wp_login_failed', 'my_front_end_login_fail' );
function my_front_end_login_fail( $username ) {
     $referrer = $_SERVER['HTTP_REFERER'];
     if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin')     ) {
          wp_redirect($referrer);
          exit;
		 
     }
	
}

