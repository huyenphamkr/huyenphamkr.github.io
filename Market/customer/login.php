<?php
	include('checkLogin.php');
	$p = new checklogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Login</title>
</head>
<body>
	<form id="form1" name="form1" method="post">
  		<h2>Login</h2>
  		<p>Your's ID:</p>
  		<input name="txtuser" type="text" id="txtuser">
		<p>Password:</p>
		<input type="password" name="txtpass" id="txtpass"><br><br>
    	<input class="submit" type="submit" name="nut" id="nut" value="Login">
    	<input class="submit" type="submit" name="nut1" id="nut1" value="Register">  	
  		<?php
			switch ($_POST['nut']){
				case 'Login':
				{
					$user=$_REQUEST['txtuser'];
					$pass=$_REQUEST['txtpass'];
					if($user!='' && $pass!=''){
						$p->login($user,$pass);
					}
					else{
						echo 'Không tìm thấy tài khoản';
					}
				}
			}
		?>
    </form>
</body>
</html>
