<?php
	if(isset($_POST['submit'])){
		$filename = stripslashes($_FILES['a_photo']['name']);
		$extension = strtolower($filename);
		$image_name = $extension;
		$newname = "images/".$image_name;
		$copied = copy($_FILES['a_photo']['tmp_name'],$newname);
	}
?>
<!--form enctype="multipart/form-data" method="POST" action ="#">
	<div style="text-align:right;margin:100px 40px 0 0;">
		<input type="file" name="a_photo" id="a_photo" />
	</div>
	<input type="submit" name="submit" value="OK" style="float: right; margin: 35px 70px 0px 0px;">

	<div class="mws-button-row" style="float:right;margin:20px -15px 0px 0;">
		<input style="margin:10px 7px 0 0;" class="mws-button red left" id="submit" name="submit" type="submit" value="Cancel"/>
		<input style="margin:10px 100px 0 0; display:none;" class="mws-button green" id="a_add_save" type="submit" value="Save"/>
		<input style="margin:10px 100px 0 0; display:none;" class="mws-button green" id="a_update_save" type="submit" value="Save"/>
	</div>
</form-->
<form id="fileupload" action="server/php/" method="POST" enctype="multipart/form-data">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="span7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple>
                </span>
			</div>
		</div>
</form>
