<?php
require_once("connect.php") ;

if (isset($_REQUEST['fname']))
{
	$fname=$_REQUEST['fname'];
	//echo $fname;
	$path="upload/$fname";
	$fp=fopen("$path", "r");
	$size=filesize($path);
	header("Content-Disposition:Attachment;filename=$fname");
	header("Content-type:octet-stream");
	header("Content-Length:$size");
	fpassthru($fp);  //fpassthru:To download the attached file
}
$res=mysqli_query($cn,"select * from Product ");
if(isset($_REQUEST['pid']))
{
	$pid=$_REQUEST['pid'];
	mysqli_query($cn,"delete from product where pid=$pid");
	echo "delele from product where pid=$pid";
}
$res=mysqli_query($cn,"select * from Product ");
?>

<a href="uploadsample.php">Enter New Product</a>
<center>
<table border="1" cellpadding="10" cellspacing="1">
	<tr>
		<th>Photo</th>
		<th>PName</th>
		<th>Price</th>
		<th>Delete</th>
		<th>Edit</th>
		
</tr>
 <?php
 		$cnt=0;
		while($row=mysqli_fetch_array($res)) //mysqli_fetch_assoc($res)
		{
		?>	 

		<tr>	 
		<td width=200px>
		<a href="downloadsampleimg.php?fname=<?php echo $row['photo'];?>">
    		<img src="upload/<?php echo $row['photo'];?>" height=50 width=50>
		</a>
		</td>
			<td> <?php echo $row['pname'];?></td>
		    <td> <?php echo $row['price'];?></td>

			<td><a href="downloadsampleimg.php?pid=<?php echo $row['pid'];?>">Delete</a></td>
			<td><a href="updatesample.php?pid=<?php echo $row['pid'];?>">Edit</a></td>	
		</td>

        </tr>
<?php
	}
?>
</table>
</center>