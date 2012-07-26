<?php
/*
	if(isset($_POST['submit'])){
			$filename = stripslashes($_FILES['image']['name']);
			$extension = strtolower($filename);
			$image_name = $extension;
			$newname = "images/".$image_name;
			$copied = copy($_FILES['image']['tmp_name'],$newname);
	}*/
?>
<script type="text/javascript" src="scripts/ajaxupload.js"></script>
<form action="scripts/ajaxupload.php" method="post" name="unobtrusive" id="unobtrusive" enctype="multipart/form-data">
	<input type="hidden" name="maxSize" value="9999999999" />
	<input type="hidden" name="maxW" value="200" />
	<input type="hidden" name="fullPath" value="images/" />
	<input type="hidden" name="relPath" value="../images/" />
	<input type="hidden" name="colorR" value="255" />
	<input type="hidden" name="colorG" value="255" />
	<input type="hidden" name="colorB" value="255" />
	<input type="hidden" name="maxH" value="300" />
	<input type="hidden" name="filename" value="filename" />
	<p><input type="file" name="filename" id="filename" value="filename" onchange="ajaxUpload(this.form,'scripts/ajaxupload.php?filename=filename&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=&amp;relPath=&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300','upload_area','File Uploading Please Wait...','Error in Upload, check settings and path info in source code.'); return false;" /></p>
	<noscript><p><input type="submit" name="submit" value="Upload Image" /></p></noscript>
</form>
<div id="upload_area">
</div>
<!--input type="file" id="file-input" name="image" /-->
<script type="text/javascript" src="js/load-image.min.js" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>

<script>
/*global jQuery, window, document */
(function ($) {
	'use strict';
	var result = $('#result'),
		load = function (e) {
			e = e.originalEvent;
			e.preventDefault();
			window.loadImage(
				(e.dataTransfer || e.target).files[0],
				function (img) {
					result.children().replaceWith(img);
				},
				{
					maxWidth: result.children().outerWidth(),
					canvas: true
				}
			);
		};
	$(document)
		.on('dragover', function (e) {
			e = e.originalEvent;
			e.preventDefault();
			e.dataTransfer.dropEffect = 'copy';
		})
		.on('drop', load);
	$('#filename').on('change', load);
}(jQuery));
</script>

