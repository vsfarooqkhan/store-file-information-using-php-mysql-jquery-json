<?php
	$fileExistsFlag = 0; 
	$fileName = $_FILES['Filename']['name'];
	$link = mysqli_connect("localhost","root","aaaa0000","farooq") or die("Error ".mysqli_error($link));
	/* 
	*	Checking whether the file already exists in the destination folder 
	*/
	$query = "SELECT filename FROM filedetails WHERE filename='$fileName'";	
	$result = $link->query($query) or die("Error : ".mysqli_error($link));
	while($row = mysqli_fetch_array($result)) {
		if($row['filename'] == $fileName) {
			$fileExistsFlag = 1;
		}		
	}
	/*
	* 	If file is not present in the destination folder
	*/
	if($fileExistsFlag == 0) { 
		$target = "files/";		
		$fileTarget = $target.$fileName;	
		$tempFileName = $_FILES["Filename"]["tmp_name"];
		$extension = end(explode(".", $fileTarget));
		$size = filesize($fileTarget);
		if( move_uploaded_file($tempFileName,$fileTarget))
		{
			echo "upload to directory: /$target complete";
			echo "<br>";
		}
		else
		{
			echo " upload failed";
		}
		/*
		*	If file was successfully uploaded in the destination folder
		*/
			echo "<br>Your file <html><b><i>".$fileName."</i></b></html> has been successfully uploaded";		
			$query = "INSERT INTO filedetails(filename,extension,size) VALUES ('$fileName','$extension','$size')";
			echo " <br>File informations updated in database. ";
			$link->query($query) or die("Error : ".mysqli_error($link));			
		mysqli_close($link);
	}
	/*
	* 	If file is already present in the destination folder
	*/
	else {
		echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
		mysqli_close($link);
	}	
	echo "<br> <a href ='index.php'> Go back To home ";
?>
