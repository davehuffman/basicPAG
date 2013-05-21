<?PHP

//// Basic Php Auto Gallery by Dave Huffman

//// Create a basic image gallery from a folder full of images.
//// requires jQuery Colorbox https://github.com/jackmoore/colorbox
//// jQuery & jQuery UI
//// PHP 5+


//// basic php auto gallery assumes that full-size images are located in
//// the 'images' folder and that thumbnail images are located in
//// the 'thumbnails' folder as default.
//// change the variables below to change these folders.


	$imagesFolder = 'images';
	$thumbnailsFolder = 'thumbnails';


	//current domain
	$domain = $_SERVER['HTTP_HOST'];
	
	//current path
	$path = $_SERVER['SCRIPT_NAME'];
	
    
	//array of images folder
	$images = array();
		$currentfiles = opendir($imagesFolder);
		while ($file = readdir($currentfiles))
		if($file != "." && $file != "..")
		 {
		 array_push( $images, $file);
		 }//if
		closedir ($currentfiles);
		sort ($images);
		reset ($images);
////html starts here
?>



<html>
	<head>
		<title>Basic PHP Auto Gallery by Dave Huffman</title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7/jquery-ui.min.js" type="text/javascript"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.3/jquery.colorbox-min.js" type="text/javascript"></script>

	<link rel="stylesheet" href="colorbox.css" />
	<link rel="stylesheet" href="gallerystyle.css" />
</head>
      
<body>

<div id="title">


<div id="gallery">
      
<?php  
 $numberOfImages = count($images);
 $numberOfImages--;

 $counter = 0;
 while ($counter != count($images))
    {
    
    $string = $images[$counter];
    $words = explode(' ', $string);
    $first_word = $words[0];
    $filename = $images[$counter];
    
    

	echo'
	<a href="' . $imagesFolder . '/' . $filename . '" class="gallery"><img src="' . $thumbnailsFolder . '/' . $filename . '" border="0"></a>
	';            
    $counter++;
    }

?>

</div>


<script>
	$(document).ready(function(){
	
		//for customization of the jquery color box settings refer to;
		// https://github.com/jackmoore/colorbox
		$(".gallery").colorbox({rel:'gallery', transition:"elastic", width:"90%", height:"90%"});
	})
</script>			
      
      
</body>
</html>



