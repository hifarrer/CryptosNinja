<?php
include ("header.php");
$url_key = $_GET["m"];


//POST encrypt
if(isset($_GET["m"])){
	$sql = "select * from ninja_messages where url_key = '".$url_key."'";
	$stmt = $db->prepare($sql);
		   $stmt->execute();
		while($row = $stmt->fetch()) {
			$res_id = $row['id'];
			$res_msg = $row['msg'];
	
			$encrypted_msg = '<div class="form-group">
										<label class="control-label col-md-3">Encrypted Message</label>
										<div class="col-md-9">
											<textarea id="maxlength_textarea" name="decrypt_msg" class="form-control" rows="10" maxlength="2000">'.$res_msg.'</textarea>
										</div>
						  </div>';
		}
	}

if(isset($_POST["encrypt_msg"])){
		$passkey = $_POST["password"];
		$cipher = new Cipher($passkey);

		
		$encryptedtext = $cipher->encrypt($_POST["encrypt_msg"]);
		
		$encrypted_msg = '<div class="form-group">
										<label class="control-label col-md-3">Encrypted Message</label>
										<div class="col-md-9">
											<textarea id="maxlength_textarea" name="decrypt_msg" class="form-control" rows="10" maxlength="2000">'.$encryptedtext.'</textarea>
										</div>
						  </div>';
		//echo "->encrypt = $encryptedtext<br />";
		
		try{
			
			$sql = "INSERT INTO ninja_messages (date_created,msg,url_key) VALUES (now(), '".$encryptedtext."','".$url_key."')";
			//echo $sql."<br>";
			$stmtI = $db->prepare($sql);
			$stmtI->execute();
			$msg = "Ok!";
		} 
		catch(PDOException $e) {
			$msg = 'Error: ' . $e->getMessage();
			
		}
}

	
?>


						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="index.php?m=<?php echo $url_key;?>" method="post" class="form-horizontal form-bordered">
								<div class="form-body">
									<?php
									echo $encrypted_msg;
									 ?>
                                     <div class="form-group">
										<label class="control-label col-md-3">Decrypt with Password</label>
										<div class="col-md-4">
											<input type="password" class="form-control" name="password" id="maxlength_defaultconfig" maxlength="25">
										</div>
									</div>
                                     <div class="form-group">
										<label class="control-label col-md-3">Share URL</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="URL" id="maxlength_defaultconfig" value="<?php echo "http://encrypt.ninja/encrypt.php?m=".$url_key; ?>">
                                            <span class="help-block">
											Copy this URL and send to your contacts, also send the password key using a separate method.</span>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green"><i class="fa fa-unlock"></i> Decrypt</button>
											
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
include("footer.php");
?>                