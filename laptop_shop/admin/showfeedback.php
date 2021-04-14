<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php  include '../classes/feecback.php'?>
<?php
    
    $fb= new feecback();
    if(!isset($_GET['contact_id']) || $_GET['contact_id'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }
   else{
        $id = $_GET['contact_id']; 
        $delpro = $fb->del_contact($id);
    }
    
?>
 <div class="container-fluid" id="container-wrapper">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Danh sách khách hàng phản hồi</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Khách hàng</li>
              <li class="breadcrumb-item active" aria-current="page"> Danh sách Khách hàng phản hồi</li>
            </ol>
          </div>
<div class="row">
  <div class="col-lg-12 mb-4">
    <div class="card">
      <div class="table-responsive">
        <?php 
                    if(isset($delpro)){
                        echo $delpro;
                    }
                 ?>
        <table class="table align-items-center table-flush" id="table1">
            <thead class="thead-light">
                      <tr>
                      <th>STT</th>
              <th>Name</th>
              
                  <th>Phone</th>     
                  <th>title</th> 
                  <th>content</th>
                  <th>Phản hồi</th>
                  <th>Xóa phản hồi</th>
                      </tr>
                    </thead>
                    <tbody>
            <?php 
            $show_cat=$fb->show_feedback();
            if($show_cat){
              $i=0;
              while ($result=$show_cat->fetch_assoc()) {
                $i++;
              
            ?>
          <tr class="odd gradeX">
              <td><?php echo $i; ?></td>
              <td><?php echo $result['name']; ?></td>
             
             <td><?php echo $result['phone']; ?></td>
             <td><textarea style="width: 200px;height: 200px;" class="form-control"readonly="readonly"><?php echo $result['title']; ?></textarea></td>
             <td ><textarea style="width: 300px;height: 200px;" class="form-control" readonly="readonly"><?php echo $result['content']; ?></textarea></td>
             <td><a href="feedback.php?emails=<?php echo $result['email']; ?>">Phản hồi khách hàng</a></td>
             <td><a onclick = "return confirm('Are you want to delete???')" href="showfeedback.php?contact_id=<?php echo $result['contact_id'] ?>">Delete</a></td>
            </tr>
            <?php
            }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

      
<?php include 'inc/footer.php';?>
