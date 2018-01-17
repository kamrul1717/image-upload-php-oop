<?php include('inc/header.php') ?>
<?php
include('lib/config.php');
include('lib/Database.php');
$db = new Database();
?>

<div class="myform">
	<?php 
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$permitted = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_tmp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if (empty($file_name)) {
				echo "<span class='error'>Please Select Any Image!</span>";
			}elseif ($file_size > 1048576) {
				echo "<span class='error'>Image Size should be less than 1MB!</span>";
			}elseif (in_array($file_ext, $permitted) === false) {
				echo "<span class='error'>You can upload only:- ".implode(',', $permitted)."</span>";
			}else{
				move_uploaded_file($file_tmp, $uploaded_image);
				$query = "INSERT INTO tbl_image(image) VALUES('$uploaded_image')";
				$inserted_rows = $db->insert($query);

				if ($inserted_rows) {
					echo "<span class='success'>Image Inserted Successfully.</span>";
				}else{
					echo "<span class='error'>Image Not Inserted</span>";
				}
			}
		}
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Select Image</td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Upload"></td>
			</tr>
		</table>
	</form>
</div>
<?php include('inc/footer.php') ?>