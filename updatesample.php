<?php
require_once("connect.php");
$pname="";
$price="";
$photo="";

if(isset($_REQUEST['pid']))
{
    $pid=$_REQUEST['pid'];
    $res=mysqli_query($cn,"select * from product where pid=$pid");
    $row=mysqli_fetch_array($res);

    $pid=$row['pid'];
    $pname=$row['pname'];
    $price=$row['price']; 
    $photo=$row['photo']; 
}
if (isset($_POST['s1']))
{
$path = "upload/"; 
$pid=$_POST['t1']; 
$pname=$_POST['t2'];
$price=$_POST['t3'];
$fname= $_FILES['f1']['name'];   
$fullpath=$path.$fname; 
if($_FILES['f1']['size']>0)
{
    mysqli_query($cn,"update product set pname='$pname',price='$price',photo='$fname' where pid=$pid");
    echo "Update  product set pname='$pname',price=$price,photo='$fname' where pid=$pid ";
    if(move_uploaded_file($_FILES['f1']['tmp_name'],$fullpath))
    {
        echo "file uploaded succeffully";
    }
    else{
        echo "sorry,file not uploaded!";
    }

}
else{
    
	mysqli_query($cn,"Update  product set pname='$pname',price=$price where pid=$pid ");
}
header("Location:downloadsampleimg.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
	<table >
		<tr>
		<td>ProductName </td>
		<td>
            <input type="hidden" name="t1" value="<?php echo $pid?>">
			<input type="text" name="t2" value="<?php echo $pname?>"> </td>
		</tr>
	
		<tr>
	<td>	Price</td>
	<td>	 <input type="text" name="t3" value="<?php echo $price?>"   > </td>
	</tr>
	
	<tr>
	<td>Photo/Image </td>
	<td>
        <input type="file" name="f1"> 
    <img src="upload/<?php echo $row['photo'];?>" height=50 width=50></td>
	</tr>
	
	<tr>
		<td><input type="submit" name="s1" value="Update Product">  
	    </td>
	</table>
	
</form>
</body>
</html>