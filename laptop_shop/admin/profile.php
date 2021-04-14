<?php
include 'inc/header.php';
include 'inc/headertop.php';
include '../classes/management.php';
 $mn= new management();
?>
<div class="container-fluid" id="container-wrapper">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thông tin quản trị viên</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active" aria-current="page"> Profile</li>
            </ol>
          </div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<div class="card">
			<div class="table-responsive">
				 
				<table class="table align-items-center table-flush">
					  <thead class="thead-light">
                      <tr>
                      <th></th>
							<th>Thông tin</th>
							
                        
                      </tr>
                    </thead>
                    <tbody>
						<?php 
						 if(Session::get('admintk')=='1') {  
						 	
						$show_adm=$mn->show_adm();
						if($show_adm){
							
							while ($result=$show_adm->fetch_assoc()) {
								
							
						?>
					<tr class="odd gradeX">
							<td>Tên</td>
							<td><?php echo $result['name']; ?></td>
							
							
						</tr>
						<tr>
							<td>Địa chỉ email</td>
							<td><?php echo $result['email']; ?></td></tr>
							<tr>
							<td>Ma quan tri</td>
							<td><?php echo $result['Matk']; ?></td></tr>
						<?php
						}
						}} else {
							$show_adms=$mn->show_admin();
						if($show_adms){
							
							while ($result=$show_adms->fetch_assoc()) {
								
							
						?>
					<tr class="odd gradeX">
							<td>Tên</td>
							<td><?php echo $result['name']; ?></td>
							
							
						</tr>
						<tr>
							<td>Địa chỉ email</td>
							<td><?php echo $result['email']; ?></td></tr>
							<tr>
							<td>Ma quan tri</td>
							<td><?php echo $result['Matk']; ?></td></tr>
						<?php
						}
						}

							# code...
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


	</div>

    <?php
      
include 'inc/footer.php';

?>