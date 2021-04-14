<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	if(!isset($_GET['catid']) || $_GET['catid']==NULL){
       echo "<script>window.location ='error.php'</script>";
    }else{
        $id = $_GET['catid']; 
    }
    
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //     $catName = $_POST['catName'];
    //     $updateCat = $cat->update_category($catName,$id);
        
    // }
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
              <h1 class="page-title">Category</h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Category</li>
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
<div class="section ">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <?php
         $name_cat = $cat->get_name_by_cat($id);
           if($name_cat){
            while($result_name = $name_cat->fetch_assoc()){
          ?>
          <div class="main_heading text_align_center">
            <h2><?php echo $result_name['catName'] ?></h2>
           
          </div>
        </div>
        <?php
      }}
      ?>
      </div>
    </div>
    <div class="row">
     <?php
	      	 $productbycat = $cat->get_product_by_cat($id);
	      	 if($productbycat){
	      	 	while($result = $productbycat->fetch_assoc()){
	      	?>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
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
            <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
            <div class="product_price">
              <p style="font-weight: bold;font-size: 18px;
  color: #000;"> <?php
echo $result['price']." " ."VND"?></p>
            </div>
          </div>
        </div>
      </div>
      <?php
			}

		}else{
			echo 'Category Not Avaiable';
		}
			?>
     
 
     
     
   
   
    </div>
  </div>
</div>

<?php 
	include 'inc/footer.php';
	
 ?>
