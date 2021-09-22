<?php
	include('saveRegister.php');
	$p = new save();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Register</title>
</head>
<body>
	<form id="form1" name="form1" method="post">
  		<h2>Register</h2>
  		<p>Your's Fullname:</p>
  		<input name="txtfullname" type="text" id="txtuser">
		<p>Password:</p>
		<input type="password" name="txtpass" id="txtpass">
		<p>Address:</p>
		<input type="text" name="txtaddress" id="txtpass">
		<p>City:</p>
		<input type="text" name="txtcity" id="txtpass"><br><br>
    	<input class="submit" type="submit" name="nut" id="nut" value="Register">
    	<?php
			switch ($_POST['nut']){
				case 'Register':
				{
					$fullname=$_REQUEST['txtfullname'];
					$pass=$_REQUEST['txtpass'];
					$address=$_REQUEST['txtaddress'];
					$city=$_REQUEST['txtcity'];
					if($fullname!='' && $pass!='' && $address!='' && $city!=''){
						$p->saveregister($fullname,$pass,$address,$city);
					}
					else{
						echo 'Chưa nhập đủ thông tin';
					}
				}
			}
		?>
    </form>
</body>
</html>