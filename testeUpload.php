<?php
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        require_once "bd.php";
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
        
        $sql = "INSERT INTO image (imageType ,imageData) VALUES('".$imageProperties['mime']."', '".$imgData."')";
        $current_id = mysqli_query($mysqli, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($mysqli));

        if (isset($current_id)) {
            header("Location: testeUpload.php?deu=1");
        }
    }
}
?>


<HTML>
<HEAD>
<TITLE>Upload Image to MySQL BLOB</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
    <div>
    <form name="frmImage" enctype="multipart/form-data" action=""
        method="post" class="frmImageUpload">
        <label>Upload Image File:</label><br /> <input name="userImage"
            type="file" class="inputFile" /> <input type="submit"
            value="Submit" class="btnSubmit" />
    </form>
    </div>
<div>


<?php
if(isset($_GET["deu"])){

    require("bd.php");
    
    $sql = "SELECT * FROM image ORDER BY ID DESC LIMIT 1"; 
    $result = mysqli_query($mysqli, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($mysqli));; 

	while($row = mysqli_fetch_array($result)) {
        echo '<img src="data:'.$row['imageType'].';base64,'.base64_encode($row['imageData']).'"/>';
	?>
<?php		
	}
    mysqli_close($mysqli);
}
?>



</div>


</BODY>
</HTML>