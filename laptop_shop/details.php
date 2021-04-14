<?php 

include 'inc/header.php';
?>
<?php
if(!isset($_GET['proid']) || $_GET['proid']==NULL){
       echo "<script>window.location ='error.php'</script>";
    }else{
         $id = $_GET['proid']; 
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
      $quantity=$_POST['quantity'];
      $quantity1=$_POST['quantity11'];
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $add_to_cart = $ct->add_to_cart($id, $quantity,$quantity1); // hàm check catName khi submit lên
    }
    $customer_id = Session::get('customer_id'); // bỏ $ nha chú , $ là biến chứ không phải thuộc tính 
  //$customer_id = Session::get('$customer_id'); // dòng lỗi ,nản chú ghê,easy vậy mà
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $productid = $_POST['productid'];
        $insertCompare = $product -> insertCompare($productid, $customer_id); // hàm check catName khi submit lên
    }
      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $productid = $_POST['productid'];
        $insertWishlist = $product -> insertWishlist($productid, $customer_id); // hàm check catName khi submit lên
    }

?>

<style type="text/css">
  
.swiper-container {
     width: 100%;
      height: 100%;
}

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
    .swiper-button-next,
    .swiper-button-prev{
     
    background-color: #039ee3;
    right:10px;
    padding: 15px;
    color: #fff !important;
    height: 10px;

    
    }
</style>

<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">SHOPPING</h1>
              <ol class="breadcrumb">
                <li><a href="index.html">Sản phẩm</a></li>
                <li class="active">Chi tiết sản phẩm</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end inner page banner -->
<!-- section -->

<div class="section padding_layout_1 product_detail">
  <div class="container">
    <div class="row">
      <div class="col-md-9 ">
        <div class="row">
          <?php 
        $get_product_details = $product->get_details($id);
        if ($get_product_details) {
          while ($result_details = $get_product_details->fetch_assoc()) {
            # code...
          
         ?>
            
          <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="product_detail_feature_img sp-wrap" style="max-width: 500px;max-height: 500px;">
             
           
            
           
          <a href="admin/upload/<?php echo $result_details['image']?>" ><img  src="admin/upload/<?php echo $result_details['image']?>" alt="" ></a>
          <a href="admin/upload/<?php echo $result_details['image1']?>"><img src="admin/upload/<?php echo $result_details['image1']?>" alt=""></a>
          <a href="admin/upload/<?php echo $result_details['image2']?>"><img src="admin/upload/<?php echo $result_details['image2']?>" alt=""></a>
          <a href="admin/upload/<?php echo $result_details['image3']?>"><img src="admin/upload/<?php echo $result_details['image3']?>" alt=""></a>
        </div>
          </div>
          <div class="col-xl-6 col-lg-12 col-md-12 product_detail_side detail_style1">
            <div class="product-heading">
              <h2><?php echo $result_details['productName'] ?></h2>
            </div>
            <div class="product-detail-side"><span class="new-price"><?php
echo $fm->format_currency($result_details['price'])." " ."VND"?></span> <span class="rating">
<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
</span> <span class="review">(5 customer review)</span> </div>
            <div class="detail-contant">
              <p><?php echo $fm->textShorten($result_details['product_desc'], 100) ?><br>
                <span class="stock">2 in stock</span> </p>
                
                
              <form class="cart" method="post" action="">
                <input type="hidden" name="quantity11" value="<?php echo $result_details['product_remain'] ?>">
                <div class="quantity">
                  <input  min="1" max="5" name="quantity" value="1"  class="input-text qty text" size="4" type="number" >
                </div>
                <?php
if($result_details['product_remain']<=0)
{
  echo 'hết hàng';
}else{
                ?>
                <button type="submit" class="btn sqaure_bt" name="submit">Add to cart</button>
<?php
}
?>
              </form>
              <form action="" method="POST">
          
          <input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>

          
          <?php
  
          $login_check = Session::get('customer_login'); 
            if($login_check){
              
              echo '<button type="submit" class="btn sqaure_bt" name="wishlist" value="" style="margin-left:75px;
  
  "><i class="fa fa-heart" aria-hidden="true"></i>
</button>';
            }else{
              echo '';
            }
              
          ?>
          <?php 
            if(isset($insertWishlist)) {
              echo $insertWishlist;
            }
             ?>
          
          </form>
           <?php 
              if(isset($insertCompare)) {
                echo $insertCompare;
              }
               ?>
             <form action="" method="POST">
          
          <input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>

          
          <?php
  
          $login_check = Session::get('customer_login'); 
            if($login_check){
              echo '<button type="submit" class="btn sqaure_bt" name="compare" style="margin-left:75px;">sosanh</button>'.'  ';
              
            }else{
              echo '';
            }
              
          ?>
          
          
          </form>
            </div>
            <div class="share-post"> <a href="#" class="share-text">Share</a>
              <ul class="social_icons">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
          <?php
}}
          ?>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="full">
              <div class="tab_bar_section">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#description">Mô tả</a> </li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reviews">Bỉnh luận



                  </a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">

                  <div id="description" class="tab-pane active">
                     <?php 
        $get_product_details = $product->get_details($id);
        if ($get_product_details) {
          while ($result_details = $get_product_details->fetch_assoc()) {
            # code...
          
         ?>
                    <div class="product_desc">
                   <?php echo $result_details['product_desc'];?>
                    </div>
                    <?php
}}
                    ?>
                  </div>
                  <div id="reviews" class="tab-pane fade">
                    
<!--gfgf-->
<?php
include 'rating.php';
?>








<!---gf-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="full">
              <div class="main_heading text_align_left" style="margin-bottom: 35px;">
                <h3>Những sản phẩm liên quan</h3>
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
$product_show=$product->getproduct_featheread();
if($product_show){
  while($result=$product_show->fetch_assoc()){

      ?>
        <div class="swiper-slide">

  
        
          <div class="col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all">
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
      <div class="col-md-3">
        <div class="side_bar">
          <div class="side_bar_blog">
            <h4>SEARCH</h4>
            <div class="side_bar_search">
              <div class="input-group stylish-input-group">
              <form action="shop.php" method="post">
              <div class="input-group stylish-input-group">
             
                <input class="form-control" placeholder="Search" type="text" name="searchs" value="<?php if(isset($_GET['searchs'])) echo $_GET['searchs']; ?>">
                <span class="input-group-addon">

                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span> 
              </div>
              </form>
              </div>
            </div>
          </div>
          <div class="side_bar_blog">
            <h4>GET A QUOTE</h4>
            <p>An duo lorem altera gloriatur. No imperdiet adver sarium pro. No sit sumo lorem. Mei ea eius elitr consequ unturimperdiet.</p>
            <a class="btn sqaure_bt" href="">View Service</a> </div>
          <div class="side_bar_blog">
            <h4>Loại sản phẩm</h4>
            <div class="categary">
             <ul>
                <?php 
          $getall_category = $cat->show_category_fontend();
            if($getall_category){
              while($result_allcat = $getall_category->fetch_assoc()){
          ?>
                <li><a href="productbycat.php?catid=<?php echo $result_allcat['catID'] ?>"><?php echo $result_allcat['catName'] ?> </a></li>
                
                <?php
              }
          }
            ?>
          </ul>
            </div>
          </div>
         
          <div class="side_bar_blog">

            <h4>TAG</h4>
            <div class="tags">

              </ul>
              <ul>
                <li><a href="index.php">ASUS</a></li>
                <li><a href="#">DELL</a></li>
                <li><a href="#">Lenovo</a></li>
                <li><a href="#">ACER</a></li>
                <li><a href="#">MacBook</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- end section -->
<!-- section -->


<?php 

include 'inc/footer.php';

?>

<script type="text/javascript">
 var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    $(".sp-wrap").smoothproducts();
  
</script>

