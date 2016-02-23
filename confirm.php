<!DOCTYPE html>
<head>
<title>Confirmation</title>
<meta charset="UTF-8">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<p>
Welcome <?php echo $_POST["name"]; ?> <?php echo $_POST["surname"]; ?></p>
<p>Your email address is: <?php echo $_POST["email"]; ?></p>
<p>Your major is: 
<?php 
switch($_POST["major"]){
  case "game":
     echo "เอกพัฒนาเกม";
	 break;
  case "digi":
     echo "เอกดิจิตอล";
	 break; 
  case "bio":
     echo "เอกแพทย์";
	 break;
}
?>
<p>Your favorite color is:
<?php echo "<font color=".$_POST["color"].">This color</font>"?>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileImage"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileImage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileImage"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileImage"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileImage"]["name"]). " has been uploaded.";
		echo "<p>You have uploaded</p>";
		echo "<img src=".$target_file.">";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

</p>
</body>
</html>