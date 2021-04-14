<?php

include 'inc/header.php';
?>

<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Shop Page</h1>
              <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Shop</li>
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
<div class="section padding_layout_1 product_list_main">
 
            
  <div class="container">
     <form action="shop.php" method="post">
              <div class="input-group stylish-input-group" style="margin-bottom: 20px;">
                   <span class="input-group-addon"style="padding-right: 10px;">

                <button type="submit" name="sortdefault" class="btn sqaure_bt" style="border-radius: 10px;min-width:100px;">Mặc định</button>
                </span>
                 <span class="input-group-addon"style="padding-right: 10px;">

                <button type="submit" name="sort_desc" class="btn sqaure_bt" style="border-radius: 10px;min-width:100px;">Giảm dần</button>
                </span>
                <span class="input-group-addon"style="padding-right: 10px;">

                <button type="submit" name="sort_asc" class="btn sqaure_bt" style="border-radius: 10px;min-width:100px;">Tăng dần</button>
                </span>
              
             <span class="input-group-addon"style="padding-right: 10px;">

                <button type="submit" name="sort2" class="btn sqaure_bt" style="border-radius: 10px;min-width:100px;">1-10 Triệu</button>
                </span>
                 <span class="input-group-addon"style="padding-right: 10px;">

                <button type="submit" name="sort3" class="btn sqaure_bt" style="border-radius: 10px;min-width:100px;">10-20 Triệu</button>
                </span> 
                <span class="input-group-addon" style="padding-right: 10px;">

                <button type="submit" name="sort1" class="btn sqaure_bt"style="border-radius: 10px;min-width:100px;">20-40 Triệu</button>
                </span> 
               
              </div>

              </form>
              
    <div class="row">
      <div class="col-md-9" >
        <div class="row ">
          <?php 
          if(isset($_POST['searchs'])){
                $timkiem_bn = $_POST['searchs'];
                $data = $product->search_all($timkiem_bn);
            while ($row = $data->fetch_assoc()) {
              include 'View/SanPham/show.php';
              ?>
           
             <?php 
            }
                
              }else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sort1'])) {

                $data = $product->sort1();
                if($data){
                while ($row = $data->fetch_assoc()) {
                  include 'View/SanPham/show.php';
?>

 



<?php

}}
              }else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sort3'])) {

                $data = $product->sort3();
                if($data){
                while ($row = $data->fetch_assoc()) {
                  include 'View/SanPham/show.php';

              }}}else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sortdefault'])) {

                $data = $product->show_shop();
                if($data){
                while ($row = $data->fetch_assoc()) {
                  include 'View/SanPham/show.php';

              }}}
              else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sort_desc'])) {

                $data = $product->sort_desc();
                if($data){
                while ($row = $data->fetch_assoc()) {
                  include 'View/SanPham/show.php';

              }}}
              else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sort_asc'])) {

                $data = $product->sort_asc();
                if($data){
                while ($row = $data->fetch_assoc()) {
                  include 'View/SanPham/show.php';

              }}}

else  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sort2'])) {

                $data = $product->sort2();
                if($data){
                while ($row = $data->fetch_assoc()) {
                  include 'View/SanPham/show.php';

              }}}
else  if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sort_search']) ) {
$st1=$_POST['search1'];
$st2=$_POST['search2'];
                $data = $product->sort_search($st1,$st2);
                if($data){
                while ($row = $data->fetch_assoc()) {
                  include 'View/SanPham/show.php';

              }}}
              else{
$product_show=$product->show_shop();
if($product_show){
  while($result=$product_show->fetch_assoc()){

      ?>
          <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
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
}}}
    ?>
         
          
          
        </div>
        
        <div>
         
          
               <nav class="center" >
   <ul class="pagination ">
    
    
  <li class="page-item ">
    <?php
          $product_all=$product->get_all_product();
          $product_count=mysqli_num_rows($product_all);
          $product_button=ceil($product_count/6);
          $i=1;

echo '<p class="center">Page: </p>'; 
          for($i=1;$i<=$product_button;$i++)
          {
          ?>
          
   
  
  
      <a  style="background-color:#039ee3;color: white;" href="shop.php?trang=<?php echo $i ?>" ><?php echo $i;?> </a>



<?php
  }

?>
 </li>
 
  </ul>
  </nav>
        </div>
      </div>
      <div class="col-md-3">
             
        <div class="side_bar">
          <div class="side_bar_blog">
            <h4>SEARCH</h4>
            <div class="side_bar_search">
         
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
          <div class="side_bar_blog">
            
          <div class="side_bar_search">
          <form action="shop.php" method="post">
         
                   
          <h4>Price</h4>
          <input type="hidden" id="hidden_minimum_price" value="0"  name="search1" />
                    <input type="hidden" id="hidden_maximum_price" value="50000000" name="search2" />
                    <p id="price_show" style="font-weight: bold;">0 - 50000000</p>
                    <div id="price_range" ></div>
                
                <center><button type="submit" name="sort_search" class="btn sqaure_bt" style="border-radius: 10px;min-width:100px;">Tìm kiếm</button></center>
                  </form>
               </div>  
          </div>
        
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
              <ul>
                <li><a href="#">DELL</a></li>
                <li><a href="#">ASUS</a></li>
                <li><a href="#">Macbook</a></li>
                <li><a href="#">ACER</a></li>
                <li><a href="#">Lenovo</a></li>
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
  
$('#price_range').slider({
        range:true,
        min:0,
        max:50000000,
        values:[0, 50000000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
  </script>
