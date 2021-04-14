<?php
include 'lib/session.php';
Session::init();
?>
<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';
spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
  });
  $db = new Database();
  $fm = new Format();
  $ct = new cart();
  $us = new user();
  $cat = new category();
  $product = new product();
  $cs= new customer();
  ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
    $login_check = Session::get('customer_login'); 
    if($login_check){
      header('Location:order.php');
    }
?>
<?php
   if(isset($_POST['submit'])){
  $input = $_POST['namecap'];
  if($input == $_SESSION['captcha']){
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $_SESSION['message'] = "* Right captcha !!!";
        $insertCustomers = $cs->insert_customers($_POST);      
        echo '<script language="javascript">';
  echo 'alert("Tạo tài khoản thành công, vui lòng đăng nhập")';  
  echo '</script>';
    }
  }
    else{

  echo '<script language="javascript">';
  echo 'alert("Bạn đã nhập sai thông tin hoặc nhập không đúng mã captcha")';
    $_SESSION['message'] = "* Wrong captcha !!!";
     echo '</script>';
  }
}
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        
        $login_Customers = $cs->login_customers($_POST);
        
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Đăng Nhập Khách hàng</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style_login.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
 
  <div class="cont">
    <div class="form sign-in">
      <h2 class="h2_header">Đăng nhập</h2>
      
      

  <form action="" method="post">
    <?php
      if(isset($login_Customers)){
          echo $login_Customers;
        }
          ?>
        <label>
        <span>Tên đăng nhập</span>
        <input  type="text" name="user" class="field" placeholder="Enter User...." required="">
      </label>
      <label>
        <span>Nhập tài khoản</span>
        <input  type="password" name="password" class="field"  placeholder="Enter Password...." required="">
      </label>
      <button class="submit" type="submit" name="login">Đăng nhập</button>
             </form>
              <?php

         ?> 

<p class="forgot-pass"><a href="index.php">Quay lại trang chủ</a></p>
      <div class="social-media">
        <ul>
          <li><img src="images/facebook.png"></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li>
        </ul>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>Bạn chưa có tài khoản?</h2>
          <p>Đăng ký và khám phá rất nhiều cơ hội mới!</p>
        </div>
        <div class="img-text m-in">
          <h2>Một trong số chúng tôi?</h2>
          <p>Nếu bạn đã có tài khoản, chỉ cần đăng nhập. Chúng tôi rất nhớ bạn!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Đăng ký</span>
          <span class="m-in">Đăng nhập</span>
        </div>
      </div>
      <div class="form sign-up">
        <form action="" method="POST">
        <h2 class="h2_header">Đăng ký</h2>
        <?php
        if(isset($insertCustomers)){
          echo $insertCustomers;
        }
        ?>
        <label>
          
          <input type="text" name="name" placeholder="Vui lòng nhập tên..." required>
        </label>
        <label>
          
          <input type="text" name="email"  placeholder="Vui lòng nhập địa chỉ email..."  required="">
        </label>
        <label>
          
          <input type="text" name="address"  placeholder="Vui lòng nhập địa chỉ của bạn..."  required="">
        </label>
        
        <label>
          <select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
              <option value="null" >Chọn lựa thành phố</option>   

              <option value="Hồ Chí Minh">TP.Hồ Chí Minh</option>
              <option value="Nghệ An">Nghệ An</option>
              <option value="Hà Nội">TP.Hà Nội</option>
              <option value="Đà Nẵng">TP.Đà Nẳng</option>
              

             </select>
        </label>
        <label>
          <input type="text" name="phone"  placeholder="Vui lòng nhập số điện thoại..." required="">
        </label>
        <label>
          
          <input type="text" name="user"  placeholder="Vui lòng nhập tên tài khoản..."  required="">
        </label>
        <label>
          <input type="password" name="password"  placeholder="Nhập Password..." required="">
        </label>
        <input type="text" name="namecap" placeholder="Nhập mã captcha" style="width: 200px;
    height: 48px;
    padding: 0;
    margin: 0;
    margin-left: 180px;
    float: left;

    "><img src="captcha.php" title="" alt="" style="border-radius: 50px;" />
        
        <button type="submit" class="submit" name="submit">Đăng ký</button>
        </form>
      </div>
      
    </div>
  </div>
<script type="text/javascript" src="js/script_login
.js"></script>
</body>
</html>