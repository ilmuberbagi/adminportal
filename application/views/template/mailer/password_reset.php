<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo isset($title)?$title:'Reset Password Portal Ilmu Berbagi'; ?></title>
    <style type="text/css">
    </style>
</head>
<body>
	<h2>Reset Password Portal Ilmu Berbagi</h2>
	<table>
		<tr>
			<td>Nama Member</td>
			<td>: <?php echo $name;?></td>
		</tr>
		<tr>
			<td>Kode IBF</td>
			<td>: <?php echo $code;?></td>
		</tr>
		<tr>
			<td>Username</td>
			<td>: <?php echo $username;?></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>: <?php echo $password;?></td>
		</tr>
	</table>
</body>
</html>
