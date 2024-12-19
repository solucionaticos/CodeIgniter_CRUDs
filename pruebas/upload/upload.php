<?php
    $img = $_POST['imgsrc'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    
    $data = base64_decode($img);
    $file = date('YmdHis') . "-image.png";
    $success = file_put_contents($file, $data);
    
    //reading from file: 

    echo '<img src="'.$file.'" />';

    // //reading from text variable/ database (in case yousaved the text in the db as a field)

    // echo '<img src="data:image/png;base64,'. $img .'" />';

