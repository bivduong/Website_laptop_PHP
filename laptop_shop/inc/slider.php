

<div class="section main_slider " data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
  <div class="intro-section custom-owl-carousel" id="home-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mr-auto">

            <div class="owl-carousel slide-one-item-alt-text">
                <?php 
            $get_slider = $product->show_slider();
            if ($get_slider) {
              while ($result_slider = $get_slider->fetch_assoc()) {
                # code...b
              
             ?>
              <div class="slide-text" data-aos="zoom-in">
                <h1><?php echo $result_slider['sliderName']?></h1>
                <p class="mb-5"><?php echo $result_slider['slider_contact']?></p>
                <p><a href="details.php?proid=<?php echo $result_slider['productId'] ?>" target="_blank" class="btn sqaure_bt" style="background: black;">Mua Ngay</a></p>
              </div>
               <?php 
            }
            }
             ?>
           
            </div>

          </div>
          <div class="col-lg-7 ml-auto">
                        
            <div class="owl-carousel slide-one-item-alt" >
              <?php 
            $get_slider = $product->show_slider();
            if ($get_slider) {
              while ($result_slider = $get_slider->fetch_assoc()) {
                # code...b
              
             ?>
            
              <img  src="admin/upload/<?php echo $result_slider['slider_image'] ?>" alt="Image" class="img-fluid">
             
               <?php 
            }
            }
             ?>
            
            </div>

            <div class="owl-custom-direction">
              <a href="#" class="custom-prev"><i class="fas fa-chevron-left"></i></a>
              <a href="#" class="custom-next"><i class="fas fa-chevron-right"></i></span></a>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>
