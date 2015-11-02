<?php
//////////////////////////////////////////////////////////////////////////////////////
//
//				MFC - My Foundation Classes
//	Name:		mfc_image_gd.php
//	Desc:		class for uploading images and reszising them using gd2
//	Author:		Rob Curle (rob@twelvenoon.co.uk)
//	Date:		6 August 2008
//	Notes:		Please don't steal this code without asking me first, its only polite	
//
///////////////////////////////////////////////////////////////////////////////////////
	
	define ("MAX_FILE_SIZE", "2097152");
	define ("MAX_FILE_SIZE_TXT", "2Mb");
	
	
	interface iMFC_Image {
		public function check_size($label, $width, $height);
		public function check_max_width($label, $width);
		public function check_max_height($label, $height);
		public function check_size_exact($label, $width, $height, $tol=0);
		public function add_swf_type() ;
		public function add_gif_type() ;
		public function upload_image ($label, $form_field='upload', $path='uploads/', $filename='', $width=0, $height=0);
		public function move_image($path, $filename='');
		public function resize_image ($width, $height, $path, $filename='', $updateObject=true);
		public function resizecrop_image ($width, $height, $path, $filename='', $updateObject=true);
		public function delete_image();
	}
	
	class MFC_Image implements iMFC_Image {
		public $path;
		public $image_src;
		public $type;
		public $width;
		public $height;
		public $overwrite;
		
		private $valid_types;
		
	
		function __construct ($path='', $image_src='') {
			$this->path = $path;
			$this->image_src = $image_src;
			$this->overwrite = true;
			
			if ($this->image_src) {
				$check = getImageSize($this->path.$this->image_src);
				$this->width = $check[0];
				$this->height = $check[1];
				$this->type = $check[2];
			}
			
			$this->valid_types[] = "image/pjpeg";
			$this->valid_types[] = "image/jpeg";
			$this->valid_types[] = "image/jpg";
			$this->valid_types[] = "image/gif";
			$this->valid_types[] = "image/png";
		}
		
		public function check_size($label, $width, $height) {
			$msg = "";
			
			if ($this->width > $width) {
				$msg = "The '{$label}' width is incorrect, the maximum width is {$width}.";
			}
			else if ($this->height > $height) {
				$msg = "The '{$label}' is height is incorrect, the maximum height is {$height}.";
			}
			
			return $msg;
		}
		
		public function check_max_width($label, $width) {
			$msg = "";
			
			if ($this->width > $width) {
				$msg = "The '{$label}' width is incorrect, the maximum width is {$width}.";
			}
			
			return $msg;
		}
		
		public function check_max_height($label, $height) {
			$msg = "";
			
			if ($this->height > $height) {
				$msg = "The '{$label}' is height is incorrect, the maximum height is {$height}.";
			}
			
			return $msg;
		}
		
		public function check_size_exact($label, $width, $height, $tol=0) {
			$msg = "";
			
			if ($this->width > ($width + $tol) || $this->width < ($width - $tol)) {
				$msg = "The '{$label}' width is incorrect, it should be {$width}.";
			}
			else if ($this->height > ($height + $tol) || $this->height < ($height - $tol)) {
				$msg = "The '{$label}' is height is incorrect, it should be {$height}.";
			}
			
			return $msg;
		}
		
		
		public function add_swf_type() {
			$this->valid_types[] = "application/x-shockwave-flash";
		}
		
		public function add_gif_type() {
			$this->valid_types[] = "image/gif";
		}
		
		public function upload_image ($label, $form_field='upload', $path='uploads/', $filename='', $width=0, $height=0) {
			$msg = "";
		
			if (!empty($filename)) {
				$dest_filename = $filename . strtolower(substr($_FILES[$form_field]['name'], strrpos($_FILES[$form_field]['name'], ".")));
			}
			else {
				$dest_filename = $_FILES[$form_field]['name'];
			}
			
			$type_valid = in_array($_FILES[$form_field]['type'], $this->valid_types);		// check types
			
			
			if ($_FILES[$form_field]['error'] > UPLOAD_ERR_OK) {
				switch ($_FILES[$form_field]['error']) {
					case UPLOAD_ERR_INI_SIZE: $msg[]="Sorry, the filesize for '{$label}' is too big, the maximum is ".ini_get('upload_max_filesize'); break;
					case UPLOAD_ERR_FORM_SIZE: $msg[]="Sorry, the filesize for '{$label}'is too big, the maximum is ".MAX_FILE_SIZE_TXT; break;
					case UPLOAD_ERR_PARTIAL: $msg[]="Sorry, we only got half the file '{$label}'.  Please try again."; break;
					case UPLOAD_ERR_NO_FILE: $msg[]="Sorry, there was a problem with the upload of '{$label}'. Please try again."; break;
					case UPLOAD_ERR_NO_TMP_DIR:
					case UPLOAD_ERR_CANT_WRITE: $msg[]="There has been a problem uploading your image for '{$label}'."; break;
				}
			}
			else {
				if (!$type_valid) {		// check file type
					$msg[] = "The file chosen for '{$label}' is not the right type.";
				}
				if (!is_uploaded_file($_FILES[$form_field]['tmp_name'])) {		// check file has been uploaded
					$msg[] = "There's been a problem uploading your image for '{$label}', make sure the file is smaller than " . MAX_FILE_SIZE_TXT;
				}
				if (!$this->overwrite && is_file($path.$dest_filename)) {
					$msg[] = "Sorry, that '{$label}' already exists on the server.";
				}
				if (!move_uploaded_file($_FILES[$form_field]['tmp_name'], $path.$dest_filename)) {		// check if upload was successful
					$msg[] = "There has been a problem uploading your image for '{$label}'.";
				}
			}
			
			if (empty($msg)) {
				$this->path = $path;
				$this->image_src = $dest_filename;
				$this->width = $image_stats[0];
				$this->height = $image_stats[1];
				$this->type = $image_stats[2];
				
				chmod($path.$dest_filename, 0644);
			}
			else {
				$msg = implode ("<br />", $msg);
			}
			
			return $msg;
		}
		
		public function move_image($path, $filename='') {
			if (!empty($filename)) $dest_filename = $filename . strtolower(substr($this->image_src, -4));
			else $dest_filename = $this->image_src;
			
			rename($this->path.$this->image_src, $path.$dest_filename);
		}
		
		public function resize_image ($width, $height, $path, $filename='', $updateObject=true) { 
			$success = false;
			
			if (empty($filename)) {
				$filename = substr($this->image_src, 0, strrpos($this->image_src, '.'));  // if empty use current image, minus the extension
			}
			
			
			if ($this->width<=$width && $this->height<=$height) {
				return true;		// no need to resize, small enough
			}
			
			if ($this->width > $this->height) {		// landscape
				$factor = $this->width/$this->height; 
				$new_width = $width;
				$new_height = round($width/$factor, 0);
			}
			else if ($this->width < $this->height) {	// portrait
				$factor = $this->height/$this->width; 
				$new_width = round($height/$factor, 0);
				$new_height = $height;
			}
			else {								// square
				$new_width = $width;
				$new_height = $width;
			}
			
			switch ($this->type) {
				case 1: 			// gif
					$im_src = @imageCreateFromGIF($this->path.$this->image_src);
					$im_dest = @imageCreate($new_width, $new_height);
					break;	
				case 2:				// jpg
					$im_src = @imageCreateFromJPEG($this->path.$this->image_src);
					$im_dest = @imageCreateTrueColor($new_width, $new_height);
					break;
				case 3:				// png
					$im_src = @imagecreatefrompng($this->path.$this->image_src);
					$im_dest = @imageCreateTrueColor($new_width, $new_height);
					break;	
			}
			
			if ($im_src) { 
				if (@imageCopyResampled($im_dest, $im_src, 0, 0, 0, 0, $new_width, $new_height, $this->width, $this->height)) {
					switch ($this->type) {
						case 1:	
							if (@imagegif($im_dest, $path.$filename.".gif")) {
								$success = true;
								$ext = ".gif"; 
							}
							break;
						case 2:	
							if (@imagejpeg($im_dest, $path.$filename.".jpg", 60)) {
								$success = true;
								$ext = ".jpg";
							}
							break;
						case 3:	
							if (@imagepng($im_dest, $path.$filename.".png")) {
								$success = true;
								$ext = ".png";
							}
							break;
					}
					
					if ($success && $updateObject) {
						$this->path = $path;
						$this->image_src = $filename . $ext;
						$this->width = $new_width;
						$this->height = $new_height;
					}
				}
			} 
			@imageDestroy($im_dest); 
			@imageDestroy($im_src); 
			
			return $success;
		}
		
		public function resizecrop_image ($width, $height, $path, $filename='', $updateObject=true) { 
			$success = false;
			
			if ($this->width<$width || $this->height<$height) {
				return $success;		// can't crop, image too small
			}
			
			if (empty($filename)) {
				$filename = substr($this->image_src, 0, strrpos($this->image_src, '.'));  // if empty use current image, minus the extension
			}
		
		
			switch ($this->type) {
				case 1: 			// gif
					$im_src = @imagecreatefromgif($this->path.$this->image_src);
					$im_dest = @imagecreate($width, $height);
					break;	
				case 2:				// jpg
					$im_src = @imagecreatefromjpeg($this->path.$this->image_src);
					$im_dest = @imagecreatetruecolor($width, $height);
					break;	
				case 3:				// png
					$im_src = @imagecreatefrompng($this->path.$this->image_src);
					$im_dest = @imageCreateTrueColor($width, $height);
					break;	
			}
			
			if ($im_src) { 
				$src_ratio = $this->width / $this->height;
				$dest_ratio = $width / $height;

				if ($src_ratio > $dest_ratio) {		// source image is wider
					$temp_height = $height;
					$temp_width = (int) ($height * $src_ratio);
				}
				else {
					$temp_width = $width;
					$temp_height = (int) ($width / $src_ratio);
				}
				
				
  				// Resize the image into a temporary GD image //
				$temp_im = @imagecreatetruecolor($temp_width, $temp_height);
				$ret = @imagecopyresampled($temp_im, $im_src, 0, 0, 0, 0, $temp_width, $temp_height, $this->width, $this->height);
		
			
				// Copy cropped region from temporary image into the desired GD image //
				if ($ret) {
					$x0 = ($temp_width - $width) / 2;
					$y0 = ($temp_height - $height) / 2;
					$ret = @imagecopy($im_dest, $temp_im, 0, 0, $x0, $y0, $width, $height);
				}
				
				if ($ret) {		// output image
					switch ($this->type) {
						case 1:	
							if (@imagegif($im_dest, $path.$filename.".gif")) {
								$success = true;
								$ext = ".gif"; 
							}
							break;
						case 2:	
							if (@imagejpeg($im_dest, $path.$filename.".jpg", 100)) {
								$success = true;
								$ext = ".jpg";
							}
							break;
						case 3:	
							if (@imagepng($im_dest, $path.$filename.".png")) {
								$success = true;
								$ext = ".png";
							}
							break;
					}
					
					if ($success && $updateObject) {
						$this->path = $path;
						$this->image_src = $filename . $ext;
						$this->width = $new_width;
						$this->height = $new_height;
					}
				}
			} 
			
			@imagedestroy($temp_im);
			@imagedestroy($im_dest); 
			@imagedestroy($im_src); 
			
			return $success;
		}
		
		public function delete_image() {
			if (is_file($this->image_src)) {
				unlink($this->image_src);
			}
		}
	} 
?>