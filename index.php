<?php include('inc/header.php') ?>
<?php
include('lib/config.php');
include('lib/Database.php');
$db = new Database();
?>

<div class="myform">
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