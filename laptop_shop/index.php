
<?php
include 'inc/header.php';
include 'inc/slider.php';
?>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<section class="section padding_layout_1 " style="margin-bottom: -100px;" >
               <div class="container-fluid">
                  <div class="row d_flex">
                     <div class="col-md-5">
                         
      
        <div class="full">
          <div class="main_heading text_align_left" >
            <h2>Sản phẩm bán chạy</h2>
            <p class="large">Sản phẩm được khách hàng lựa chọn tháng này</p>
          </div>
        </div>
       
        <div class="text-bg" >
           <?php $pro=$mn->show_product_top1();
  if($pro){
              while($result = $pro->fetch_assoc()){

        ?>
                           <span><?php echo $result['productName']?></span>
                            
                           <a href="details.php?proid=<?php echo $result['productId']?>"><button class="btn sqaure_bt">Mua Ngay nào</button></a>
                        </div>
   
                     </div>
                     <div class="col-md-7 padding_right1">
                        <div class="text-img">
                           <figure><img src="admin/upload/<?php echo $result['image']?>" alt="#"/></figure>
                           <h3>01</h3>
                        </div>
                     </div>
                     <?php }}?>
                  </div>
               </div>
            </section>
<div class="section padding_layout_1 ">
  <div class="container">
    <div class="row" >
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>CÁC SẢN PHẨM NỔI BẬT</h2>
            <p class="large">Sự tinh tế luôn là điều làm các sản phẩm được tôn vinh</p>
          </div>
        </div>
      </div>
    </div>
     <div class="row">
          <?php 
$product_show=$product->getproduct_featheread();
if($product_show){
  while($result=$product_show->fetch_assoc()){

      ?>
          <div class="col-md-3 col-sm-6 col-xs-12 margin_bottom_30_all">
            <div class="product_list">
              <div class="product_img"> <img class="img-responsive" src="admin/upload/<?php echo $result['image']?>" alt=""> </div>
              <div class="product_detail_btm">
                <div class="center">
                  <h4><a href="details.php?proid=<?php echo $result['productId']?>"><?php
echo $result['productName'];
              ?></a></h4>
                </div>
                <div class="starratin">
                  <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                </div>
                <div class="product_price">
                  <p style="font-weight: bold;font-size: 18px;
  color: #000;"> <?php
echo $fm->format_currency($result['price'])." " ."VND"?></p>
                </div>
              </div>
            </div>
          </div>
    <?php
}}
    ?>
         
          
          
        </div>
    
   



  </div>
</div>

      

<?php  include 'commentindex.php'; ?>



<div class="section padding_layout_1 product_list_main" >
  <div class="container">
     <div class="row">
          <div class="col-md-12">
            <div class="full">
              <div class="main_heading text_align_left" >
                <h3>Những sản phẩm được đánh giá cao</h3>
              </div>
            </div>
          </div>
        </div>
   <div class="row">
        
        <div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">

        <!-- Slides -->
        <?php 
$product_show=$mn->product_rating();
if($product_show){
  while($result=$product_show->fetch_assoc()){

      ?>
        <div class="swiper-slide" >

  
        
          <div class="col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all">
            <div class="product_list" >
              <div class="product_img"> <img class="img-responsive" src="admin/upload/<?php echo $result['image']?>" alt=""> </div>
              <div class="product_detail_btm" >
                <div class="center">
                  <h4><a href="details.php?proid=<?php echo $result['productId']?>"><?php
echo $result['productName'];
              ?></a></h4>
                </div>
                <div class="starratin">
                  <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                </div>
                <div class="product_price">
                  <p style="font-weight: bold;font-size: 18px;
  color: #000;"> <?php
echo $fm->format_currency($result['price'])." " ."VND"?></p>
                </div>
              </div>
            </div>
          </div>
     
        
    </div>
       
        <?php
}}
    ?>
          
        ...
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
</div> 
          

          <!--gfgf-->
        </div>
        </div>
        </div>
<?php

include 'inc/footer.php';

?>