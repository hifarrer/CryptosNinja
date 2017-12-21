<?php
ob_start();
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL ^ E_WARNING);

$encrypted_msg = '';
$decrypted_msg = '';
$page = "";
if (!empty($_GET['p'])) {
$page = $_GET["p"];
}
$htitle = "Encrypt any text or message";
$hdesc = "This site uses the latest encryption algorithms to encrypt your data, no data is stored or saved for your security.<br>Remember to save your password or you won't be able to recover your encrypted messages.";
if ($page == "chat"){
	$htitle = "Secure Chat";
	$hdesc = "Encrypted Messages in this Chat older than 5 min will be automatically deleted.";
	}
class Cipher {
	
			private $securekey, $iv;
			
			
			function __construct($textkey,$salt) {
				
				$textkey = $textkey.$salt;
				$this->securekey = hash('sha256',$textkey,TRUE);
				$this->iv = mcrypt_create_iv(32);
			}
			function encrypt($input) {
				
				return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->securekey, $input, MCRYPT_MODE_ECB, $this->iv));
			}
			function decrypt($input,$passkey,$salt) {
				$passkey = $passkey.$salt;
				$keydecrypt = hash('sha256',$passkey,TRUE);
				try {
				return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $keydecrypt, base64_decode($input), MCRYPT_MODE_ECB, $this->iv));}
				catch(Exception $e){
					throw new Exception( 'Error decrypting your shit', 0, $e);
					}
			}
		}
		
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
	
		
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.2.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Cryptos.ninja - Encrypt and Decrypt text and messages</title>
<meta name="description" content="Encrypt and Decrypt text and messages using this encryption and decryption online web tool for free.">
<meta name="keywords" content="encrypt,decrypt,encryption,decryption,encrypt text, decrypt text,encrypt url, decrypt url, encrypt web, decrypt web, encrypt html, decrypt html, encrypt code, decrypt code, encrypt chat, decrypt chat, encrypt tool decrypt tool, encryption tool, decryption tool, encrypt online, decrypt online, encryption tool online, decryption tool online, pgp, online pgp, crypt, crypto, cipher,decipher">
<!-- Meta Tags Created With: STW Meta Tag Builder http://www.scrubtheweb.com/ -->

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>

<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="assets/global/plugins/typeahead/typeahead.css">
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->

<link href="assets/global/css/components.css" rel="stylesheet" type="text/css">
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">

<!-- END THEME STYLES -->

<!-- Theme styles START -->
  <link href="assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
  <link href="assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="assets/frontend/layout/css/themes/turquoise.css" rel="stylesheet" id="style-color">
  <link href="assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- for Chat START -->
<script src="https://code.jquery.com/jquery-1.9.0.js"></script>
<script src="js/jquery.js"></script>
<script>
function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 8; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
var newroom = makeid();
var room = '';
function createChat() {
	
	var pwd = form_create.pwd.value;
	var xmlhttp = new XMLHttpRequest();
	/*alert (newroom);*/
	xmlhttp.open('GET','create.php?room='+newroom+'&pwd='+pwd,true);
	xmlhttp.send();
	$('#create').hide();
	$('#chat').show();
	room = newroom;
	
	form1.url.value = "http://Cryptos.ninja/chat.php?p=chat&r="+newroom;
	}
	
function checkPwd(room){

var pwd = $('#pwd').val();
	var formData = {room:"room",pwd:"pwd"}; 
	//alert (room+" "+pwd);
	jQuery.ajax({
	   type: "POST",
	   url: "checkPwd.php",
	   data: 'room='+ room +'&pwd=' + pwd,
	   cache: false,
	   success: function(response){
			if(response == 1){
			$('#create').hide();
			$('#chat').show();
			form1.url.value = "http://Cryptos.ninja/chat.php?p=chat&r="+newroom;
			document.getElementById('pwdmsg').innerHTML = "Succesfull!";
			}
			else {
				//alert(response);
			document.getElementById('pwdmsg').innerHTML = "Wrong Password!";
				}
	   }
	});
		
}

function submitChat(roompost){
	if(roompost == 'none'){roompost = newroom;}
		if(form1.uname.value == '' || form1.msg.value == ''){
				alert('ALL FIELDS ARE MANDATORY!!!');
				return;
			}
			
			/*form1.uname.readOnly = true;
			form1.uname.style.border = 'none';*/
			$('#imageload').show();
			var uname = form1.uname.value;
			var msg = form1.msg.value;
			var xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState==4&&xmlhttp.status==200){
							document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
							$('#imageload').hide();
						}
				}
			xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg+'&room='+roompost,true);
			xmlhttp.send();
			room = roompost;
	}
	
	$(document).ready(function(e) {
        $.ajaxSetup({cache:false});
		setInterval(function() {$('#chatlogs').load('logs.php?room='+room);}, 2000);
    });

</script>
<!-- for Chat END -->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>


<!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
      <a class="site-logo" href="index.php"><img src="images/ninja50.png" alt="logo" class="logo-default">Cryptos.Ninja</a>

<!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li><a href="index.php">Encrypter</a></li>
            <li><a href="chat.php?p=chat">Secret Chat</a></li>
            </ul>
        </div>
</div></div>

<div class="page-container">
<div class="container">
<!-- BEGIN LOGO -->

			<!-- END LOGO -->
            
            <div class="panel-body">
															<p>
																<strong>Cryptos.ninja</strong> is the easiest safe way to encrypt and share text or messages.
															</p>
															<p>
																<?php echo $hdesc; ?>
															</p>
			</div>
<div class="row">
<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-lock font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase"><?php echo $htitle;?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>