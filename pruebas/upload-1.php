<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload-1</title>

	<style type="text/css">
		.image-upload > input
		{
		    display: none;
		}
		.image-upload img
		{
		    width: 80px;
		    cursor: pointer;
		}
	</style>

</head>
<body>

<div>Click the upload icon below to upload a file.</div>

<div class="image-upload">
    <label for="file-input">
        <img src="camara-de-fotos.png"/>
    </label>

    <input id="file-input" type="file"/>
</div>

</body>
</html>