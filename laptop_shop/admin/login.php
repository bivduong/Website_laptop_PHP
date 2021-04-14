<?php
  include '../classes/admin_login.php';
?>
<?php

  $class = new adminlogin();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $adminUser = $_POST['adminUser'];
      $adminPass = md5($_POST['adminPass']);

      $login_check = $class->login_admin($adminUser,$adminPass);
      
  
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style_login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave " src="img/wave.png" >
	<div class="container">
		<div class="img">
			<img src="img/bg.svg" >
		</div>
		<div class="login-content">
			<form action="login.php" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
        <span><?php

      if(isset($login_check)){
        echo $login_check;
      }
       ?></span>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		
           		   		<input type="text" name="adminUser" placeholder="Username" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	
           		    	<input type="password" name="adminPass" placeholder="Password" class="input">
            	   </div>
            	</div>
            	
            	<button class=" btn submit" type="submit" >Đăng nhập</button>
              <a href="../index.php" style="text-align: center;">Quay lại trang chủ</a>
            </form>
        </div>
    </div>
    
</body>
</html>
