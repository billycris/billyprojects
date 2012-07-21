<?php

	if(isset($_POST['submit'])){
			$filename = stripslashes($_FILES['image']['name']);
			$extension = strtolower($filename);
			$image_name = $extension;
			$newname = "images/".$image_name;
			$copied = copy($_FILES['image']['tmp_name'],$newname);
	}
?>
<input type="file" id="file-input" name="image" />
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
	$('#file-input').on('change', load);
}(jQuery));
</script>

