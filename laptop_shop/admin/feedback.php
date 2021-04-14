<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php 
 if(!isset($_GET['emails']) || $_GET['emails'] == NULL){
        echo "<script> window.location = 'showfeedback.php' </script>";
        
    }else {
        $id = $_GET['emails']; // Lấy catid trên host
    }

?>
 <div class="container-fluid" id="container-wrapper">
 	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gửi mail phản hồi khách hàng</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Phản hồi</li>
              <li class="breadcrumb-item active" aria-current="page">Gửi mail phản hồi khách hàng</li>
            </ol>
          </div>


   <div class="row">
            <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="table-responsive p-3">
<?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send']) ) {
            if (empty($_POST['email'])) { //Kiểm tra xem trường email có rỗng không?
                $error = "Bạn phải nhập địa chỉ email";
            } elseif (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error = "Bạn phải nhập email đúng định dạng";
            } elseif (empty($_POST['content'])) { //Kiểm tra xem trường content có rỗng không?
                $error = "Bạn phải nhập nội dung";
            }
            if (!isset($error)) {
                include 'sendmail/library.php'; // include the library file
                require 'sendmail/vendor/autoload.php';
                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->CharSet = "UTF-8";
                    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = SMTP_UNAME;                 // SMTP username
                    $mail->Password = SMTP_PWORD;                           // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = SMTP_PORT;                                    // TCP port to connect to
                    //Recipients
                    $mail->setFrom(SMTP_UNAME, "Tên người gửi");
                    $mail->addAddress($_POST['email'], 'Tên người nhận');     // Add a recipient | name is option
                    $mail->addReplyTo(SMTP_UNAME, 'Tên người trả lời');
//                    $mail->addCC('CCemail@gmail.com');
//                    $mail->addBCC('BCCemail@gmail.com');
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $_POST['title'];
                    $mail->Body = $_POST['content'];
                    $mail->AltBody = $_POST['content']; //None HTML
                    $result = $mail->send();
                    if (!$result) {
                        $error = "Có lỗi xảy ra trong quá trình gửi mail";
                    }

                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
            }

            ?>

            <div class = "container">
                <div class = "error" style="font-size: 15px;"><?= isset($error) ? $error : "Gửi email thành công" ?></div>
                <a href = "feedback.php">Quay lại form gửi mail</a>
            </div>
        <?php } else {
            ?>
 <form id="send-email-form" method="POST" action="">
<table class="table align-items-center table-flush" id="table1">

     <tr>
                    <td>
                         <label>Gửi đến email: </label>
                    </td>
                    <td>
                         <input type="text" name="email" value="<?php  echo $id?>" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>
                         <label>Tiêu đề: </label>
                    </td>
                    <td>
                         <input type="text" name="title" value="" class="form-control"/><br/>
                    </td>
                </tr>
  <tr>
                    <td>
                         <label>Nội dung </label>
                    </td>
                    <td>
                        <textarea name="content" class="form-control" class="tinymce" id="mydesc"></textarea><br/>
                    </td>
                </tr>
                <tr><td></td><td> <input type="submit" value="Send Email" class="btn btn-primary" name="send" /></td></tr>

</table>





                   
                   
                    
                   
                </form>
                <?php } ?>
            </div>
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
<?php include 'inc/footer.php';?>