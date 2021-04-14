<?php

include 'inc/header.php';
?>
<?php
  if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $ct->del_product_cart($cartid);
    }
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
       $quantity1=$_POST['quantity1'];
        $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId,$quantity1);
      
        if($quantity<=0){
          $delcart = $ct->del_product_cart($cartId);
        }
    }
?>

<?php
  if(!isset($_GET['id'])){
   echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
  }
?>
  <!-- end header top -->
  <!-- header bottom -->
  <style type="text/css">
    .media-object{
      width: 100px;
    }
  </style>
<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Giỏ hàng</h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Giỏ hàng</a></li>
                <li class="active">Giỏ hàng</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- end inner page banner -->
<div class="section padding_layout_1 Shopping_cart_section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="product-table">
         <?php
             if(isset($update_quantity_cart)){
              
              echo $update_quantity_cart;
             } 
            ?>
            <?php
             if(isset($delcart)){
              echo $delcart;
             }
            ?>
          <table class="table">
            <thead>
              <tr>
                <th width="20%">Tên sản phẩm</th>
                <th width="20%">Hình ảnh</th>
                <th width="15%" >Số lượng</th>
                <th width="20%">Đơn giá</th>
                
                <th width="15%">Tổng</th>
                <th width="15%">Xóa sản phẩm</th>
              </tr>
              </thead>
             <tbody>
              <?php 
              $get_product_cart = $ct->get_product_cart();
              if($get_product_cart){
                $subtotal = 0;
                $qty = 0;
                while ($result = $get_product_cart->fetch_assoc()) {
                  
                
               ?>
              <tr>
                <td>
                  <div class="media-body">
                      <h4 class="media-heading"><a href="#"><?php echo $result['productName']?></a></h4>
                </td>
                <td><img class="media-object" src="admin/upload/<?php echo $result['image'] ?>" alt=""/></td>
                
                <td>
                  <form action="" method="post" style="padding-right: 20px; text-align: center;">
                    <input type="hidden" name="cartId" min="0" value="<?php echo $result['cartId'] ?>"/>
                    <input type="hidden" name="proId" min="0" value="<?php echo $result['productId'] ?>"/>
                    <input type="hidden" name="quantity1" min="0" value="<?php echo $result['product_remain'] ?>"/>
                    <input class="form-control" type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>"/>
                    <input class="button" type="submit" name="submit" value="Update"/>
                  </form>
                </td>
                <td style="padding-top: 50px;"><?php echo $fm->format_currency($result['price'])." VND" ?></td>
                <td style="padding-top: 50px;">
                  <?php 
                  $total = $result['price'] * $result['quantity'];
                  echo $fm->format_currency($total)." VND";
                   ?>
                </td>
                
                <td style="padding-top: 5px;">
 <a href="?cartid=<?php echo $result['cartId'] ?>"><button type="button" class="bt_main"><i class="fa fa-trash"></i></button></a>
</td>
              </tr>
              <?php 

              $subtotal += $total;
              $qty = $qty + $result['quantity'];
                }
              }
               ?>
  </tbody>
            </table>
          
          
          
        </div>
        <div  class="shopping-cart-cart">
          <?php
              $check_cart = $ct->check_cart();
                if($check_cart){
                ?>
          <table>
            <tbody>
              <tr class="head-table">
                <td><h5>Tổng số</h5></td>
                <td class="text-right"></td>
              </tr>
              <tr>
                <td><h4>Phí ship</h4></td>
                <td class="text-right"><?php 

                  echo $fm->format_currency($subtotal)." "."VNĐ";
                  Session::set('sum',$subtotal);
                  Session::set('qty',$qty);
                ?></td>
              </tr>
              <tr>
                <td><h5>Estimated shipping</h5></td>
                <td class="text-right"><h4><?php echo $fm->format_currency(30000)." "."VNĐ";?></h4></td>
              </tr>
              <tr>
                <td><h3>Tổng tiền</h3></td>
                <td class="text-right"><h4><?php 

                $vat =  30000;
                $gtotal = $subtotal + $vat;
                echo $fm->format_currency($gtotal)." "."VNĐ";
                ?></h4></td>
              </tr>
              <tr>
                <td><a href="shop.php"><button type="button" class="button">Continue Shopping</button></a></td>
                <td><a href="payment.php"><button class="button">Checkout</button></a></td>
              </tr>
            </tbody>
          </table>
          <?php
          }else{
            echo 'Your Cart is Empty ! Please Shopping Now';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- section -->

<!-- end section -->
<!-- section -->

<!-- end section -->
<!-- section -->
<div class="section padding_layout_1" style="padding: 50px 0;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <ul class="brand_list" >
            <li ><img src="images/brand/1.png" alt="#" style="width: 80px;" /></li>
            <li><img src="images/brand/2.png" alt="#" style="width: 80px;" /></li>
            <li><img src="images/brand/3.png" alt="#" style="width: 80px;" /></li>
            <li><img src="images/brand/4.png" alt="#" style="width: 80px;" /></li>
            <li><img src="images/brand/5.png" alt="#" style="width: 80px;" /></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<!-- Modal -->
<div class="modal fade" id="search_bar" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
            <div class="navbar-search">
              <form action="#" method="get" id="search-global-form" class="search-global">
                <input type="text" placeholder="Type to search" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                <button class="search-global__btn"><i class="fa fa-search"></i></button>
                <div class="search-global__note">Begin typing your search above and press return to search.</div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include 'inc/footer.php';

?>