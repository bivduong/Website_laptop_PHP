<?php
ob_start();
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
  $cs = new customer();
  $fb=new feecback();
  $mn=new management();
  ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>LapTop shop</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icons -->
<link rel="icon" href="images/fevicon/fevicon.png" type="image/gif" />
<!-- bootstrap css -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- Site css -->
<link rel="stylesheet" href="css/style.css" />
<!-- responsive css -->
<link rel="stylesheet" href="css/responsive.css" />
<!-- colors css -->
<link rel="stylesheet" href="css/colors1.css" />
<!-- custom css -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="css/custom.css" />
<!-- wow Animation css -->
<link rel="stylesheet" href="css/animate.css" />
<link rel='stylesheet' href='css/hizoom.css'>
<!-- revolution slider css -->
<link rel="stylesheet" type="text/css" href="revolution/css/settings.css" />
<link rel="stylesheet" type="text/css" href="revolution/css/layers.css" />
<link rel="stylesheet" type="text/css" href="revolution/css/navigation.css" />
<link rel="stylesheet" href="own/dist/assets/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css" href="own/dist/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
             <link rel="stylesheet" type="text/css" href="css/aos.css">
             <link rel="stylesheet" type="text/css" href="css/smoothproducts.css">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ffb709ec31c9117cb6d3f38/1ern2vref';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</head>
<body id="default_theme" class="shopping-cart">
<!-- loader -->

<!-- end loader -->
<!-- header -->
<header id="default_header" class="header_style_1">
  <!-- header top -->
  <div class="header_top">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="full">
            <div class="topbar-left">
              <ul class="list-inline">
                <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">Khoa CNTT và Truyền Thông, Đại học Đà Nẵng</span> </li>
                <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:dvbi.19it5@vku.udn.vn">dvbi.19it5@vku.udn.vn</a></span> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 right_section_header_top">
          <div class="float-left">
            <div class="social_icon">
              <ul class="list-inline">
                <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank">


</a></li>
                <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank">
</a></li>
                <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
              </ul>
            </div>
          </div>
          <div class="float-right">
            <div class="make_appo"> <a class="btn white_btn" href="admin/index.php">Admin</a> </div>
          </div>

        
        </div>
      </div>
    </div>
  </div>
  <!-- end header top -->
  <!-- header bottom -->
  <div class="header_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
          <!-- logo start -->
          <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="logo" /></a> </div>
          <!-- logo end -->
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
          <!-- menu start -->
          <div class="menu_side">

           
            <div id="navbar_menu">
              <ul class="first-ul">
                <li> <a class="active" href="index.php">Trang chủ</a>
                  
                </li>
                
               
                <li> <a href="shop.php">Sản phẩm</a>
                  
              </li>
                   <li>  <a href="cart.php" title="View my shopping cart" rel="nofollow">
              <i class=" fa fa-cart-plus"></i>

                <span class="cart_title">Giỏ hàng</span>
                <span class="no_product"><?php
                $check_cart = $ct->check_cart();
                if ($check_cart) {
                  $sum = Session::get("sum");
                  $qty = Session::get("qty");
                  echo ' SL: '.$qty;

                 }else {
                  echo '(Trống)';
                 } 
                
                 ?></span>
              </a></li>

           
    

              <?php 
        if(isset($_GET['customer_id'])){
          $customer_id = $_GET['customer_id'];
          $delCart = $ct->del_all_data_cart();
          $delCompare = $ct->del_compare($customer_id);
          Session::destroy();
        }
      ?> 
   
          <li> 
                <?php 
      $login_check = Session::get('customer_login');
     $ids = Session::get('customer_id');
        $get_customers = $cs->show_customers($ids);
        
      if ($login_check==false) {
        echo '<a href="login.php"><i class="fa fa-user" aria-hidden="true"></i>


</a></li>'; 
      }else {
if ($get_customers) {
          while ($result = $get_customers->fetch_assoc()) {

        echo '<li >';
$m=$result['name'];
        echo  ' <a >'.$m.'</a>';
        echo '<ul style="
position: relative;" >';
        $login_check = Session::get('customer_login');
    if ($login_check==false) {
      echo '';
    }else {
      echo '<li ><a href="profile.php">Thông tin</a></li>';
    }
    $check_cart = $ct->check_cart();
    if ($check_cart==true) {
      echo '<li><a href="cart.php">Giỏ hàng</a></li>';
    }else {
      echo '';
    }

 $customer_id = Session::get('customer_id'); 
    $check_order = $ct->check_order($customer_id);
    if ($check_order==true) {
      echo '<li><a href="orderdetails.php">Đơn hàng</a></li>';
      echo '<li><a href="paymentdetails.php">Lịch sử mua hàng</a></li>';
    }else {
      echo '';
    }

    $login_check = Session::get('customer_login');
    if ($login_check) {
      echo '<li><a href="wishlist.php">Yêu thích</a> </li>';
    }

       
        
        echo '<li><a href="compare.php ">So sánh </a></li>';
         echo '<li><a href="feedback.php ">Liên hệ quản lý</a></li>';
         echo '<li><a href="matkhau.php ">Đổi mật khẩu</a></li>';
          echo '<li><a href="?customer_id='.Session::get('customer_id').' ">Đăng xuất</a></li>'; 
        echo '</li>';
        echo '</ul>';
        echo '</li>';
      }
    }}
       ?>
                    

   
              </ul>
              
            </div>
            <div class="search_icon" >
              <ul>
                <li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
              </ul>
            </div>
            
          </div>
          <!-- menu end -->
        </div>
      </div>
    </div>
  </div>
  <!-- header bottom end -->
  
    
    

   

</header>