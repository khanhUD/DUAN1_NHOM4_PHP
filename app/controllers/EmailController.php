<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{

    public $mail, $users, $data = [];
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->users = $this->model('UsersModel');
    }

    public function mail()
    {
    }

    public function send_mail()
    {
        $request = new Request();

        if ($request->isPost()) {
            if ($this->users->mailExisted($request->getFields()['email'])) {

                $current_time = time();
                $expire_time = $current_time + 180; 

                $otp = Helpers\Helpers::generateOTP();
                $otp_md5 = md5($otp);
                setcookie("otp", "$otp_md5", $expire_time, "/");
                $receiver = $request->getFields()['email'];
                setcookie("email", "$receiver", $expire_time, "/");
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
                    $this->mail->setFrom('khanhnqpc06731@fpt.edu.vn', 'Ninh Kieu Restaurant');
                    $this->mail->addAddress($receiver, 'Recipient Name');     // Add a recipient

                    // Content
                    $this->mail->isHTML(true);                                  // Set email format to HTML
                    $this->mail->Subject = 'Ninh Kieu Restaurant Xac thuc ma OTP';
                    $this->mail->Body    =
                        '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                                            <div style="margin:50px auto;width:70%;padding:20px 0">
                                            <div style="border-bottom:1px solid #eee">
                                                <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Ninh Kiều Restaurant xin chào quý khách</a>
                                            </div>
                                            
                                            <p>Sử dụng OTP dưới đây để hoàn tất thủ tục đổi mật khẩu. Mã OTP có hiệu lực trong 3 phút.</p>
                                            <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">' . "$otp" . '</h2>
                                            <p style="font-size:0.9em;">Thân chào,<br />Ninh Kiều Restaurant</p>
                                            <hr style="border:none;border-top:1px solid #eee" />
                                            <div style="float:left;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                                                <p>Ninh Kiều Restaurant</p>
                                                <p>Địa chỉ: 02 Đường Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ</p>
                                                <p>Số điện thoại: 0909 1509 09
                                                </p>
                                            </div>
                                            </div>
                                        </div>';

                    $this->mail->send();
                    if ($this->mail->send()) {
                        $response = new Response;
                        $response->redirect(_WEB_ROOT . '/quen-mat-khau/xac-thuc');
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
                }
            } else {
                echo 123;
            }
        }
    }

    public function otp()
    {
        if (isset($_COOKIE['otp'])) {
            $request = new Request;

            if ($request->isPost()) {
                $postValues = $request->getFields();
                $otp = md5($postValues['otp']);
                if ($otp === $_COOKIE['otp']) {
                    setcookie("otp", "", time() - 3600, "/");
                    $response = new Response;
                    $response->redirect(_WEB_ROOT . '/quen-mat-khau/doi-mat-khau');
                } else {
                    $response = new Response;
                    $response->redirect(_WEB_ROOT . '/quen-mat-khau/xac-thuc');
                }
            }
        } else {
            $response = new Response;
            $response->redirect(_WEB_ROOT . '/quen-mat-khau');
        }
    }

    public function updatePass()
    {
        if (isset($_COOKIE['email'])) {

            $request = new Request;
            if ($request->isPost()) {
                $postValues = $request->getFields();
                $email = $postValues['email'];
                $newPass = $postValues['password'];

                if($email == $_COOKIE['email']){
                    $result = $this->users->updatePassword($email, $newPass);

                if ($result) {
                    setcookie("email", "", time() - 3600, "/");
                    $response = new Response;
                    $response->redirect(_WEB_ROOT . '/dang-nhap');
                }
                }else{
                    $response = new Response;
                    $response->redirect(_WEB_ROOT . '/quen-mat-khau/doi-mat-khau');
                }
                
            }
        } else {
            $response = new Response;
            $response->redirect(_WEB_ROOT . '/quen-mat-khau');
        }
    }
}
