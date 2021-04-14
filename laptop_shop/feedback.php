<?php 
include 'inc/header.php';

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
      $customer_id = Session::get('customer_id');
        $insertCustomers = $fb->insert_feedback($_POST,$customer_id);      
      
    }
?>
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="full">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="main_heading text_align_center">
                <h2>GET IN TOUCH</h2>
              </div>
            </div>
            <div class="contact_information">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                <div class="information_bottom text_align_center">
                  <div class="icon_bottom"> <i class="fa fa-road" aria-hidden="true"></i> </div>
                  <div class="info_cont">
                    <h4>KHOA CONG NGHE THONG TIN VA TRUYEN THONG,DHDN</h4>
                    <p>DA NANG</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                <div class="information_bottom text_align_center">
                  <div class="icon_bottom"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                  <div class="info_cont">
                    <h4>0325454832</h4>
                    <p>Mon-Fri 8:30am-11:30pm</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                <div class="information_bottom text_align_center">
                  <div class="icon_bottom"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                  <div class="info_cont">
                    <h4>dvbi.19it5@vku.udn.vn</h4>
                    <p>24/7 online support</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
            	
              <h2 class="text_align_center">SEND MESSAGER</h2>
              <div class="form_section">
                <form class="form_contant" action="" method="post">
                	<?php
        if(isset($insertCustomers)){
          echo $insertCustomers;
        }
        ?>
                	<?php  
                	$get_customers = $cs->show_customers($customer_id);
if ($get_customers) {
    			while ($result = $get_customers->fetch_assoc()) {
                	?>
                  <fieldset>
                  <div class="row">
                    
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="Your name" type="text" value="<?php echo $result['name']; ?>">
                    </div>
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="Email adress" type="email" value="<?php echo $result['email']; ?>">
                    </div>
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="phone" type="text" value="<?php echo $result['phone']; ?>">
                    </div>
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="title" type="text" name="title">
                    </div>
                    <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <textarea class="field_custom" placeholder="Messager" name="content"></textarea>
                    </div>
                    <div class="center"><button type="submit" class="btn main_bt" name="submit">SUBMIT NOW</button></div>
                  </div>
                  </fieldset>
              <?php }}?>
                </form>
              </div>
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