<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>	
 <?php 

	$login_check = Session::get('customer_login');
	if ($login_check==false) {
		header('Location:login.php'); 
	}

 ?>
 <div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Chào mừng bạn !</h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Trang chủ</a></li>
                <li>Pages</li>
                <li class="active"></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
				<div class="order_page">
					<a href="index.php"><h3>Chào mừng bạn đến với thế giới máy tính</h3></a>
				</div>
					
			</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
	include 'inc/footer.php';
 ?>