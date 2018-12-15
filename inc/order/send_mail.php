<?php foreach($css as $value)
  {
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
  }
?>

Konfirmasi Desain Pelanggan
    <body>
      <div class="notif">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <input type="text" placeholder="Email Tujuan" name="receiver">
          </div>
          <div class="row">
            <input type="text" placeholder="subject" name="subject">
          </div>
          <div class="row">
            <input type="text" placeholder="message" name="message">
          </div>
           <div class="row">
              <div class="fileUpload btn btn-primary">
                <span> Upload Gambar Desain</span>
                <input type="file" class="upload" name="file" />
              </div>
            </div>
            <input type="submit" name="submit" value="Send Email">
        </form>
        </div>
    </body>


<?php
  if (isset($_POST["submit"])){
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$sender = "sembiring9797@gmail.com";

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail ->Host = "smtp.gmail.com";  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $sender;                 // SMTP username
$mail->Password = 'biring97';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom($sender, 'RajaCetak');    // Add a recipient
$mail->addAddress($_POST["receiver"]);               // Name is optional


$file_name = $_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"], "img/email/$file_name");

$mail->addAttachment($file_name);         // Add attachments    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML


$mail ->Subject = $_POST["subject"];
$mail ->Body = $_POST["message"];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
  }
