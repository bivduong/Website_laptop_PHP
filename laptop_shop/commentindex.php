<div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container" >
    <div class="row" >
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_left">
            <h2 style="text-transform: none;">Khách hàng nói gì về sản phẩm chúng tôi?</h2>
            <p class="large">Đây là lời chứng thực từ khách hàng ..</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-7">
        <div class="full">
         
  <div class="owl-carousel odd owl-theme">
            <?php
        $show=$product->show_comment_start();
        if($show){
        while($result=$show->fetch_assoc())
        {
        ?>
    <div class="item" data-merge="6">
      <div class="testimonial-container">
                  <div class="testimonial-content">Nội dung tin:<br> <?php echo $result['comments'] ?></div>
                  <div class="testimonial-photo"> <img style= " width: 150px;"src="admin/upload/<?php echo $result['image'] ?>" class="img-responsive" alt="#" > </div>
                  <div class="testimonial-meta">
                    <h4>Khách hàng: <br><?php echo $result['title'] ?></h4>
                    <span class="testimonial-position"><?php echo $result['productName'] ?></span> </div>
                </div>
    </div>
    
    <?php }} ?>
</div>

        </div>
      </div>
      <div class="col-sm-5">
        <div class="full"> </div>
      </div>
    </div>
  </div>
</div>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="contact_us_section">
            <div class="call_icon"> <img src="images/it_service/phone_icon.png" alt="#" /> </div>
            <div class="inner_cont">
              <h2>REQUEST A FREE QUOTE</h2>
              <p>Get answers and advice from people you want it from.</p>
            </div>
            <div class="button_Section_cont"> <a class="btn dark_gray_bt" href="contact.php">Contact us</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
