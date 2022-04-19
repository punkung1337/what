<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<title>Library</title>
<link rel="icon" href="assets/favicon.ico"/>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
html {
  -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
}
body {
    background-image: linear-gradient(to right, #141E30, #243B55);
}
.container .gallery a img {
  float: left;
  width: 20%;
  height: auto;
  border: 2px solid #fff;
  -webkit-transition: -webkit-transform .15s ease;
  -moz-transition: -moz-transform .15s ease;
  -o-transition: -o-transform .15s ease;
  -ms-transition: -ms-transform .15s ease;
  transition: transform .15s ease;
  position: relative;
}

.container .gallery a:hover img {
  -webkit-transform: scale(1.05);
  -moz-transform: scale(1.05);
  -o-transform: scale(1.05);
  -ms-transform: scale(1.05);
  transform: scale(1.05);
  z-index: 5;
}

.clear {
  clear: both;
  float: none;
  width: 100%;
}
h1 , h2 {
    font-family: 'Roboto', sans-serif;
}
</style>
<div class='container'>
 <div class="gallery">
 <h1><font color="#FFFFFF">Library</font></h1>
 <h2><font color="red"><i class="fa fa-exclamation-triangle fa-1x"></i></font> <font size="3" color="#fc5a03">WARNING: This document might contain inappropriate content.</font><h2>
 
  <?php 
  // Image extensions
  $image_extensions = array("png","jpg","jpeg","gif");

  // Target directory
  $dir = '../attachments/';
  if (is_dir($dir)){
 
   if ($dh = opendir($dir)){
    $count = 1;

    // Read files
    while (($file = readdir($dh)) !== false){

     if($file != '' && $file != '.' && $file != '..'){
 
      // Thumbnail image path
      $thumbnail_path = "../attachments/".$file;

      // Image path
      $image_path = "../attachments/".$file;
 
      $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
      $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

      // Check its not folder and it is image file
      if(!is_dir($image_path) && 
         in_array($thumbnail_ext,$image_extensions) && 
         in_array($image_ext,$image_extensions)){
   ?>

       <!-- Image -->
       <a href="<?php echo $image_path; ?>" target="_blank">
        <img src="<?php echo $thumbnail_path; ?>" alt="" title=""/>
       </a>
       <!-- --- -->
       <?php

       // Break
       if( $count%4 == 0){
       ?>
         <div class="clear"></div>
       <?php 
       }
       $count++;
      }
     }
 
    }
    closedir($dh);
   }
  }
 ?>
 </div>
</div>

<script type='text/javascript'>
$(document).ready(function(){
 // Intialize gallery
 var gallery = $('.gallery a').simpleLightbox();
});
</script>

</html>