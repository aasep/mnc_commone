<?php
session_start();
############ Configuration ##############
$thumb_square_size 		= 50; //Thumbnails will be cropped to 200x200 pixels
$max_image_size 		= 250; //Maximum image size (height and width)
$thumb_prefix			= '../../data/tmp_images_thumb/'; //Normal thumb Prefix
$destination_folder		= '../../data/tmp_images/'; //upload directory ends with / (slash)
$jpeg_quality 			= 100; //jpeg quality
#####################################################
 require_once('../../config/config.php');
 require_once('../../function/function.php');

$nik=$_POST['nik'];
echo $nik;
die();
if(is_array($_FILES)) {

if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
	$image_temp=$_FILES['userImage']['tmp_name'];
//======tambahan=============================
    $image_name = $_FILES['userImage']['name']; //file name
	$image_size = $_FILES['userImage']['size']; //file size
	$image_temp = $_FILES['userImage']['tmp_name']; //file temp

	$image_size_info 	= getimagesize($image_temp); //get image size

	if($image_size_info){
		$image_width 		= $image_size_info[0]; //image width
		$image_height 		= $image_size_info[1]; //image height
		$image_type 		= $image_size_info['mime']; //image type
	}else{
		die("Make sure image file is valid!");
	}

	
	switch($image_type){

		case 'image/png':
			$image_res =  imagecreatefrompng($image_temp); break;
		case 'image/gif':
			$image_res =  imagecreatefromgif($image_temp); break;			
		case 'image/jpeg': case 'image/pjpeg':
			$image_res = imagecreatefromjpeg($image_temp); break;
		default:
			$image_res = false;
	}

	if($image_res){
		//=====get date time original file============

		
			
			//Get file extension and name to construct new file name
			$image_info = pathinfo($image_name);
			$image_extension = strtolower($image_info["extension"]); //image extension
			$image_name_only = strtolower($image_info["filename"]);//file name only, no extension
          
		  
			//create a random name for new image (Eg: fileName_293749.jpg) ;
			$new_file_name = $nik.".".$image_extension;
			$image_save_folder 	= $destination_folder . $new_file_name; //pat image foto...
		//====================================DELETE FOTO SEBELUMNYA====================================
		  // unlink($image_save_folder);	
		//==========================================DIISi CODE UPDATE FOTO===============================
    	   // logSpk($id_spk,"Foto Uploaded","Upload Foto By MSO");

	        $query_up_ori="UPDATE karyawan set photo='$new_file_name' where nik='$nik'";
			$result_up_ori = pg_query($query_up_ori);
			
			
			//call normal_resize_image() function to proportionally resize image
			if(normal_resize_image($image_res, $image_save_folder, $image_type, $max_image_size, $image_width, $image_height, $jpeg_quality))
			{
			$var=rand(0,99999999999999999);
				//echo "sukses <br> $image_save_folder";
				echo "<img src='$image_save_folder?id=$var' height='300' >";
			}
		
		imagedestroy($image_res); //freeup memory
	} else {
		echo "<img src='images-logo/noimage_2.png'>";
		//echo "<strong>FORMAT FOTO TIDAK DISUPPORT, HARUS DALAM JPEG.....!</strong>";
	}
	unlink($temp_images_file);

  }
}//lama





#####  This function will proportionally resize image ########################################################################
function normal_resize_image($source, $destination, $image_type, $max_size, $image_width, $image_height, $quality){

	if($image_width <= 0 || $image_height <= 0){return false;} //return false if nothing to resize

	//do not resize if image is smaller than max size
	if($image_width <= $max_size && $image_height <= $max_size){
		if(save_image($source, $destination, $image_type, $quality)){
			return true;
		}
	}

	//Construct a proportional size of new image
	$image_scale	= min($max_size/$image_width, $max_size/$image_height);
	$new_width		= ceil($image_scale * $image_width);
	$new_height		= ceil($image_scale * $image_height);

	$new_canvas		= imagecreatetruecolor( $new_width, $new_height ); //Create a new true color image

	//Copy and resize part of an image with resampling
	if(imagecopyresampled($new_canvas, $source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height)){
		save_image($new_canvas, $destination, $image_type, $quality); //save resized image
	}

	return true;
}

##### This function corps image to create exact square, no matter what its original size! ######
function crop_image_square($source, $destination, $image_type, $square_size, $image_width, $image_height, $quality){
	if($image_width <= 0 || $image_height <= 0){return false;} //return false if nothing to resize

	if( $image_width > $image_height )
	{
		$y_offset = 0;
		$x_offset = ($image_width - $image_height) / 2;
		$s_size 	= $image_width - ($x_offset * 2);
	}else{
		$x_offset = 0;
		$y_offset = ($image_height - $image_width) / 2;
		$s_size = $image_height - ($y_offset * 2);
	}
	$new_canvas	= imagecreatetruecolor( $square_size, $square_size); //Create a new true color image

	//Copy and resize part of an image with resampling
	if(imagecopyresampled($new_canvas, $source, 0, 0, $x_offset, $y_offset, $square_size, $square_size, $s_size, $s_size)){
		save_image($new_canvas, $destination, $image_type, $quality);
	}

	return true;
}

##### Saves image resource to file #####
function save_image($source, $destination, $image_type, $quality){
	switch(strtolower($image_type)){//determine mime type
		case 'image/png':
			imagepng($source, $destination); return true; //save png file
			break;
		case 'image/gif':
			imagegif($source, $destination); return true; //save gif file
			break;
		case 'image/jpeg': case 'image/pjpeg':
			imagejpeg($source, $destination, $quality); return true; //save jpeg file
			break;
		default: return false;
	}
}


?>