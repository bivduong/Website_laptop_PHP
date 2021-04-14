<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php 
 $product = new product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        
        $insertSlider = $product -> insert_slider($_POST, $_FILES); // hàm check catName khi submit lên
    }
?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thêm slider banner</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Banner</li>
              <li class="breadcrumb-item active" aria-current="page">Thêm Slider banner</li>
            </ol>
          </div>
        <div class="row" >
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
            <div class="card-body" >
                    

                
               <?php

			if (isset($insertSlider)) {
				echo $insertSlider;
				# code...
			}
			?>
                 <form  action="slideradd.php" method="post" enctype="multipart/form-data">
                 	  <tr>
                    <td>
                        <label>Chọn sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="productid"  style=" height: 7vh;border-radius: 5px;border:1px solid #6777ef;width: 276px;">
                            <option >Chọn chuyên mục</option>
                            <?php 
                            $cat = new product();
                            $catlist = $cat->show_product();
                            if($catlist){
                                while ($result = $catlist->fetch_assoc()){
                            
                             ?>
                            <option value=" <?php echo $result['productId'] ?> "> <?php echo $result['productName'] ?> </option>
                            
                            <?php 
                            }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
                    <tr>
						<td>
							<label>Title</label>

						</td>
						<td>
							<input type="text" name="sliderName" placeholder="OK thêm đi..." class="form-control"/>
						</td>
					</tr>
            <tr>
            <td>
              <label>Contact</label>

            </td>
            <td>
              <input type="text" name="contact" placeholder="Thêm nội dung..." class="form-control"/>
            </td>
          </tr>


					<tr>
						<td>
							<label>upload ảnh</label>

						</td>
						<td>
							<input type="file" name="image" class="form-control">
						</td>
					</tr>
					<td>
						<td>
							<label>type</label>

						</td>
						<td>
							<select name="type" class="form-control">
								<option value="1">on</option>
								<option value="0">off</option>
							</select>
						</td>
					</td>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="submit" value="Save"/ class="btn btn-primary">
						</td>
					</tr>
                    </form>
                
            </div>
            </div>
        </div>
    </div>





<script src="js/tinymce/jquery.tinymce.min.js" type="text/javascript"></script>
<script src="js/tinymce/tinymce.min.js" type="text/javascript"></script>

<script type="text/javascript">
   
    tinymce.init({
        selector:"#mydesc"
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>
