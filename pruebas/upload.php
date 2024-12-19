<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.rawgit.com/shabuninil/fileup/master/src/fileup.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.rawgit.com/shabuninil/fileup/master/src/fileup.min.js"></script>

</head>
<body>

    <div class="btn btn-success fileup-btn">
        Select file
        <input type="file" id="upload-1">
    </div>

    <div id="upload-1-queue""></div>


    <script>
        $.fileup({
            url: '/pruebas/upload',
            inputID: 'upload-1',
            queueID: 'upload-1-queue',
            onSuccess: function(response, file_number, file) {
                Snarl.addNotification({
                    title: 'Upload success',
                    text: file.name,
                    icon: '<i class="fa fa-check"></i>'
                });
            },
            onError: function(event, file, file_number) {
                Snarl.addNotification({
                    title: 'Upload error',
                    text: file.name,
                    icon: '<i class="fa fa-times"></i>'
                });
            }
        });
    </script>


</body>
</html>