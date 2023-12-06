<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class EmailController extends Controller {

    public $mail, $users;
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->users = $this->model('UsersModel');
    }

    public function mail() {
        
    }

    public function send_mail() {
        $request = new Request();

        if($request->isPost()) {
            if($this->users->mailExisted($request->getFields()['email'])) {
                $newPassword = Helpers\Helpers::generatePassword();
                $receiver = $request->getFields()['email'];
                try {
                    //Server settings
                    $this->mail->isSMTP();                                            // Send using SMTP
                    $this->mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
                    $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $this->mail->Username   = 'khanhnqpc06731@fpt.edu.vn';            // SMTP username
                    $this->mail->Password   = 'ohmy eexw gxan xozw';                   
                    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $this->mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                    //Recipients
                    $this->mail->setFrom('khanhnqpc06731@fpt.edu.vn', 'Ninh Kieu');
                    $this->mail->addAddress($receiver, 'Recipient Name');     // Add a recipient
                
                    // Content
                    $this->mail->isHTML(true);                                  // Set email format to HTML
                    $this->mail->Subject = 'Quen mat khau';
                    $this->mail->Body    = $newPassword;
                
                    $this->mail->send();
                    if($this->mail->send()) {
                        $this->users->updatePassword($receiver, $newPassword);
                        $response = new Response;
                        $response->redirect(_WEB_ROOT. '/dang-nhap');
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
                }
            } else {
                echo 123;
            }
        }
    }
}