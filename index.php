<?php
include ("includes/header.php");
//$url_key = generateRandomString();
$passkey = "";
$msg = "";
$cryptotext = "";
$salt ="THISISCOOL";
//POST decrypt

		

			if(isset($_POST["submit"])){
				$pwd = $_POST["passkey"];
				$msg = $_POST["msg"];
				//echo $msg;
				$cipher = new Cipher($pwd,$salt);
				
				if ($_POST["submit"]=="encrypt"){
						$cryptotext = $cipher->encrypt($msg);
				}
				if ($_POST["submit"]=="decrypt"){
						$cryptotext = $cipher->decrypt($msg,$pwd,$salt);
				}
			}
			
			$decrypted_msg = '<div class="form-group">
										<label class="control-label col-md-3">Decrypted Message</label>
										<div class="col-md-9">
											<textarea id="maxlength_textarea" name="msg" class="form-control" rows="10" maxlength="2000">'.$cryptotext.'</textarea>
										</div>
						  </div>';


	



?>

						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="" method="post" class="form-horizontal form-bordered">
								<div class="form-body">
									
									<?php
									echo $decrypted_msg;
									 ?>
                                    <div class="form-group">
										<label class="control-label col-md-3">Password</label>
										<div class="col-md-4">
											<input type="password" class="form-control" maxlength="25" name="passkey" id="maxlength_defaultconfig">
											<span class="help-block">
											Make sure you remember this password! </span>
										</div>
									</div>
									
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" name="submit" class="btn green" value="encrypt"><i class="fa fa-lock"></i> Encrypt</button>&nbsp;
											<button type="submit"  name="submit" class="btn green" value="decrypt"><i class="fa fa-unlock"></i> Decrypt</button>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
                </div></div></div>
<?php
include("includes/footer.php");
?>                