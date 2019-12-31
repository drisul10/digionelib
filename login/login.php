<?php 
    $base_url="http://".$_SERVER['HTTP_HOST'].'/digionelib/';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>DigiOneLib | Login </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="<?=$base_url?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$base_url?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=$base_url?>dist/css/skins/_all-skins.min.css">
</head>
<body class="bg-green">
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
<center><h2> Silahkan Login </h2></center>
	<div class="col-sm-4 col-sm-offset-4">
	<div class="login box box-info">
	<br/>
		<form action="proseslogin.php" method="post" onSubmit="return validasi()">
			<div class="form-group">
				<label>Username:</label>
				<input class="form-control" type="text" name="username" id="username" class="text-black"/>
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input class="form-control" type="password" name="password" id="password" class="text-black" />
			</div>			
			<div class="form-group text-right">
                <button type="submit" class="btn btn-info ">Login</button>
              </div>


		</form>
	</div>
	</div>
</body>

<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');
			return false;
		}
	}

</script>
</html>

