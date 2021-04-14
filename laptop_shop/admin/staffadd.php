<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>

<?php include '../classes/management.php';  ?>
<?php
    // gọi class category
    $mn = new management(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertadmin = $mn->insert_admin($_POST);    // hàm check catName khi submit lên
    }
  ?> 
   <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thêm Nhân viên</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Staff</li>
              <li class="breadcrumb-item active" aria-current="page">Thêm Nhân viên</li>
            </ol>
          </div>



        <div class="row">
              <div class="col-lg-12 mb-4">
                  <div class="card">
                    <div class="table-responsive">
                          <?php 
            if(isset($insertadmin)){
                echo $insertadmin;
            }
         ?>   
                        <form action="staffadd.php" method="post" enctype="multipart/form-data">
                        <table class="table align-items-center table-flush">
                            <tbody>
                                <tr>
                    <td>
                        <label>Tên nhân viên</label>
                    </td>
                    <td>
                        <input name="name" type="text" placeholder="Nhập tên nhân viên..." class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nhập email</label>
                    </td>
                    <td>
                        <input name="email" type="text" placeholder="Nhập email..." class="form-control" />
                    </td>
                </tr>
              
                  <tr>
                    <td>
                        <label>Số điện thoại</label>
                    </td>
                    <td>
                        <input name="phone" type="text" placeholder="Nhập số điện thoại..." class="form-control" />
                    </td>
                </tr>
          
              <tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input name="address" type="text" placeholder="Nhập địa chỉ..." class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Thành phố</td>
                    <td><select id="country" name="country" onchange="change_country(this.value)" class="form-control required">
              <option value="null" >Chọn lựa thành phố</option>   

              <option value="Hồ Chí Minh">TP.Hồ Chí Minh</option>
              <option value="Nghệ An">Nghệ An</option>
              <option value="Hà Nội">TP.Hà Nội</option>
              <option value="Đà Nẵng">TP.Đà Nẳng</option>
              

             </select></td>
                </tr>
               <tr>
                    <td>
                        <label>Tên tài khoản</label>
                    </td>
                    <td>
                        <input name="user" type="text" placeholder="Tên tài khoản..." class="form-control" />
                    </td>
                </tr>
             <tr>
                    <td>
                        <label>Mật khẩu</label>
                    </td>
                    <td>
                        <input name="password" type="password" placeholder="Nhập mật khẩu..." class="form-control" />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                       
                    <button type="submit" name="submit"  class="btn btn-primary ">Submit</button>
                    
                        
                    </td>
                </tr>
                            </tbody>
                        </table>
                    </form>
                    </div>
                      
                  </div>
              </div>
          </div>
    </div>

<?php include 'inc/footer.php';?>