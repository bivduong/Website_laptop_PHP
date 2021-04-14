  <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
              
              
            <div class="product_list">
              <div class="product_img"> <img class="img-responsive" src="admin/upload/<?php echo $row['image']?>" alt=""> </div>
              <div class="product_detail_btm">
                <div class="center">
                  <h4><a href="details.php?proid=<?php echo $row['productId']?>"><?php
echo $row['productName'];
              ?></a></h4>
                </div>
                <div class="starratin">
                  <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                </div>
                <div class="product_price">
                  <p style="font-weight: bold;font-size: 18px;
  color: #000;"> <?php
echo $fm->format_currency($row['price'])." " ."VND"?></p>
                </div>
              </div>
            </div>
          </div>