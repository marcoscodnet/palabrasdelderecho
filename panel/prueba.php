<!DOCTYPE html>
<html>
<head>
<title>Upload Image using form</title>
<link href="style.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>
<div id="mainform">
<div id="innerdiv">
<h2>Upload Image using form</h2>
<!-- Required Div Starts Here -->
<div id="formdiv">
<h3>Upload Form</h3>
<form action="" enctype="multipart/form-data" id="form" method="post" name="form">
<div id="upload">
<input id="file" name="file" type="file">
</div>
<input id="submit" name="submit" type="submit" value="Upload">
</form>
<div id="detail">
<b>Note:</b>
<ul>
<li>To Choose file Click on folder.</li>
<li>You can upload- <b>images(jpeg,jpg,png).</b></li>
<li>Image should be less than 100kb in size.</li>
</ul>
</div>
</div>
<div id="clear"></div>
<div id="preview">
<img id="previewimg" src=""><img id="deleteimg" src="delete.png">
<span class="pre">IMAGE PREVIEW</span>
</div>
<div id="message">
<?php include 'uploadphp.php';?>
</div>
</div>
</div>
</body>
</html>