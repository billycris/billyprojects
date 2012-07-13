<?php
	if(isset($_POST['submit'])){
		$filename = stripslashes($_FILES['a_photo']['name']);
		$extension = strtolower($filename);
		$image_name = $extension;
		$newname = "images/".$image_name;
		$copied = copy($_FILES['a_photo']['tmp_name'],$newname);
	}
?>
<form enctype="multipart/form-data" method="POST" action ="#">
	<div style="text-align:center;">
		<input type="file" name="a_photo" id="a_photo" />
		<input type="submit" name="submit" value="OK" style="margin:0 0 0 0;">
	</div>
</form>
