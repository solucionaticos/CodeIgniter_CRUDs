<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
var fileReader = new FileReader();
var filterType = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

fileReader.onload = function (event) {
  var image = new Image();
  
  image.onload=function(){
      // document.getElementById("original-Img").src=image.src;
      var canvas=document.createElement("canvas");
      var context=canvas.getContext("2d");
      canvas.width=image.width/4;
      canvas.height=image.height/4;
      context.drawImage(image,
          0,
          0,
          image.width,
          image.height,
          0,
          0,
          canvas.width,
          canvas.height
      );
      
      document.getElementById("upload-Preview").src = canvas.toDataURL();
      var base64image = $('#upload-Preview').attr('src');
      $("#imgsrc").val(base64image);
  }
  image.src=event.target.result;


};

var loadImageFile = function () {
  var uploadImage = document.getElementById("upload-Image");
  
  //check and retuns the length of uploded file.
  if (uploadImage.files.length === 0) { 
    return; 
  }
  
  //Is Used for validate a valid file.
  var uploadFile = document.getElementById("upload-Image").files[0];
  if (!filterType.test(uploadFile.type)) {
    alert("Please select a valid image."); 
    return;
  }
  
  fileReader.readAsDataURL(uploadFile);
}
    

function step1()
{
  var base64image = $('#upload-Preview').attr('src');
  $("#imgsrc").val(base64image);
}

</script>
</head>

<body onload="loadImageFile();">
  <form name="uploadForm" action="upload.php" method="post">
    <table>
      <tbody>
        <tr>
          <td>Select Image - <input id="upload-Image" type="file" onchange="loadImageFile();" /></td>
        </tr>
<!--
        <tr>
          <td>Origal Img - <img id="original-Img"/></td>
        </tr>
-->        
         <tr>
          <td>Compress Img - <img name="upload-Preview" id="upload-Preview"/></td>
        </tr>
      </tbody>
    </table>
<!--     <button type="button" onclick="step1();">step 1</button>
 -->    <textarea id="imgsrc" name="imgsrc"></textarea>
    <input type="submit" name="" value="step 2">
  </form>
</body>
</html>