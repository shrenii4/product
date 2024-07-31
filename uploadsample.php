<?php
require_once("connect.php");
if(isset($_POST['s1']))
{
    $pname=$_POST['t1'];
    $price=$_POST['t2'];
    $photo=$_FILES['f1']['name'];
    echo "size".$_FILES['f1']['size'];
    print_r($_FILES['f1']);
    echo "$photo";
    $path="upload/$photo";
    $qry="insert into product values(0,'$pname','$price','$photo')";
    $res=mysqli_query($cn,$qry);
    move_uploaded_file($_FILES['f1']['tmp_name'],$path);
    echo "inserted $res";

	header("location:downloadsampleimg.php");
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
			<input type="text" name="t1"   > </td>
		</tr>
	
		<tr>
	<td>	Price</td>
	<td>	 <input type="text" name="t2"   > </td>
	</tr>
	
	<tr>
	<td>Photo/Image </td>
	<td>	<input type="file" name="f1"    > </td>
	</tr>
	
	<tr>
		<td><input type="submit" name="s1" value="Add Product">  
					</td>
	</table>
	
</form>
</body>
</html>