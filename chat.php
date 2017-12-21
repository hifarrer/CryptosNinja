<?php
include ("includes/header.php");
$room = "none";
$url = "";
$js_function = "createChat()";
if (!empty($_GET['r'])) {
	$room = $_GET["r"]; 
	$js_function = "checkPwd('".$room."')";
}

$chat_user = "User".rand(1, 10);

?>

<div id="create">
<form name="form_create" class="form-horizontal form-bordered">
       <div class="form-group">
            <label class="control-label col-md-3">Room Password: </label>
            <div class="col-md-4">
                <input type="text" name="pwd" id="pwd" class="form-control"/><br />
            </div>
        </div>
        <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
<button type="button" class="btn green" onClick="<?php echo $js_function;?>"><i class="fa fa-lock"></i> Enter</button><br>
<div id="pwdmsg"></div>

					</div>
               </div>
        </div>
        </form>
</div>



<div id="chat" style="display:none;">
<form name="form1" class="form-horizontal form-bordered">
<div class="form-group">
            <label class="control-label col-md-3">Share this room: </label>
            <div class="col-md-4">
                <input type="text" name="url" class="form-control" value="<?php echo $url;?>"/><br />
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-md-3">Message: </label>
            <div class="col-md-4">
            <input type="hidden" name="uname" class="form-control" value="<?php echo $chat_user;?>"/>
            	<textarea name="msg" class="form-control" id="msg"></textarea>
            </div>
        </div>
        	<div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
        <button type="button" class="btn green" onClick="submitChat('<?php echo $room;?>')"><i class="fa fa-lock"></i> Send</button>
    			</div>
    		</div>
    </div>
</form>
</div>

<div id="imageload" style="display:none;">
<img src="images/1-0.gif" />
</div>

<div id="chatlogs">
LOADING CHATLOGS PLEASE WAIT... <img src="images/1-0.gif" />
</div>


<?php
include("includes/footer.php");
?>           