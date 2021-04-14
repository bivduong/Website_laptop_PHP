<?php
ob_start();
include '../lib/session.php';
Session::checkSession();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
 //if(!isset($_GET['pro']) || $_GET['pro']==NULL){
    // echo "<script>window.location ='error.php'</script>";
//}else{
     
      // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Admin - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/admin.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->

    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <?php

  //$id = $_GET['pro']; 

         //if(!isset($_SESSION['matk']))
//{
//$_SESSION['matk']=$id;
//echo  $_SESSION['matk'];


    //echo      $_SESSION['pro'];




?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo.png">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
         
<?php  
 
         
        
    ?>

            
      <?php
     
       
        //else 
          //if(  $_SESSION['matk']=='2'){
            ?>
            <li class="nav-item">
        <a class="nav-link collapsed" href="calendar/calendars.php" 
          >
          <i class="fas fa-fw fa-table"></i>
          <span>Xem lịch đơn hàng</span>
        </a>
       
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="https://dashboard.tawk.to/#/monitoring" target="blank" 
          >
          <i class="fas fa-fw fa-table"></i>
          <span>Chat với khách hàng</span>
        </a>
       
      </li>
        <li class="nav-item" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethongke" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Thống kê</span>
        </a>
        <div id="collapsethongke" class="collapse" aria-labelledby="headingbrand" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Thống kê</h6>

 
    <a class="collapse-item" href="thongke.php">Thống kê doanh thu</a>
   

            <a class="collapse-item" href="thongkebinhluan.php">Thống kê số bình luận về sản phẩm</a>

            
          
            
       
          </div>
        </div>
      </li>
             <?php if(Session::get('admintk')=='1') { ?>  
  <li class="nav-item" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsestaff" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Danh sách nhân viên</span>
        </a>
        <div id="collapsestaff" class="collapse" aria-labelledby="headingbrand" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Nhân viên</h6>


    <a class="collapse-item" href="staffadd.php">Thêm nhân viên</a>
    
  <?php //}else {?>

            <a class="collapse-item" href="staff.php">Danh sách nhân viên</a>

            
          
            
       
          </div>
        </div>
      </li>
<?php } ?>
 
           <li class="nav-item" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Thương hiệu sản phẩm</span>
        </a>
        <div id="collapseBrand" class="collapse" aria-labelledby="headingbrand" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Brand</h6>

 <?php if(Session::get('admintk')=='1') { ?>  
    <a class="collapse-item" href="brandadd.php">Thêm thương hiệu</a>
    <?php } ?>
  <?php //}else {?>

            <a class="collapse-item" href="brandlist.php">Danh sách thương hiệu</a>

            
          
            
       
          </div>
        </div>
      </li>

  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCat" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Loại sản phẩm</span>
        </a>
        <div id="collapseCat" class="collapse" aria-labelledby="headingbrand" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category</h6>
            <?php if(Session::get('admintk')=='1') { ?>  
            <a class="collapse-item" href="catadd.php">Thêm loại sản phẩm</a>
            <?php } ?>
            <a class="collapse-item" href="catlist.php">Danh sách loại sản phẩm</a>
          </div>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Sản phẩm</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingbrand" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product</h6>
             <?php if(Session::get('admintk')=='1') { ?>
            <a class="collapse-item" href="productadd.php">Thêm sản phẩm</a>
             <?php } ?>
            <a class="collapse-item" href="productlist.php">Danh sách sản phẩm</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseslide" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>SLIDER BANNER</span>
        </a>
        <div id="collapseslide" class="collapse" aria-labelledby="headingbrand" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">SLIDE</h6>
             <?php if(Session::get('admintk')=='1') { ?>
            <a class="collapse-item" href="slideradd.php">Thêm SLIDE</a>
             <?php } ?>
            <a class="collapse-item" href="sliderlist.php">Danh sách </a>
          </div>
        </div>
      </li>
      <li class="nav-item" style="display: block;">
        <a class="nav-link collapsed" href="inbox.php" 
          >
          <i class="fas fa-fw fa-table"></i>
          <span>Đơn hàng</span>
        </a>
       
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="showcus.php" 
          >
          <i class="fas fa-fw fa-table"></i>
          <span>Danh sách khách hàng</span>
        </a>
       
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="showfeedback.php" 
          >
          <i class="fas fa-fw fa-table"></i>
          <span>Phản hồi khách hàng</span>
        </a>
       
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="showwarehouse.php" 
          >
          <i class="fas fa-fw fa-table"></i>
          <span>Kho hàng</span>
        </a>
       
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="warehouse.php" 
          >
          <i class="fas fa-fw fa-table"></i>
          <span>Lịch sử nhập hàng</span>
        </a>
       
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="showpayment.php" 
          >
          <i class="fas fa-fw fa-table"></i>
          <span>Lịch sử các đơn hàng</span>
        </a>
       
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="show_comment.php" 
          >
          <i class="fas fa-fw fa-table"></i>
          <span>Đánh giá sản phẩm từ khách hàng</span>
        </a>
       
      </li>
      
      
      
          
       
      
<?php
     // }    //}
          
         //else echo'gf';
   //}
  ?>
 



      
      
    
       
       
      
  
      
      <hr class="sidebar-divider">
     
     
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>

