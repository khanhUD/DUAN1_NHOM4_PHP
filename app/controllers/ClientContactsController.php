<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ClientContactsController extends Controller
{

    public $mail, $contacts, $products, $data = [];

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->contacts = $this->model('ContactsModel');
        $this->products = $this->model('ProductsModel');
    }

    public function index()
    {

        $this->data['sub_content']['title'] = 'Hello';
        $this->data['content'] = 'clients/contact';
        $this->data['action'] = '';
        $this->data['sub_content']['count_view'] = $this->products->getProductCountView();
        $this->render('layouts/client_layout', $this->data);
    }

    public function postForm()
    {

        $request = new Request;

        if ($request->isPost()) {

            $postValues = $request->getFields();
            $full_name = $postValues['full_name'];
            $receiver = $postValues['email'];
            $data = [
                'full_name' => $postValues['full_name'],
                'phone' => $postValues['phone'],
                'email' => $postValues['email'],
                'note' => $postValues['note'],
                
            ];

            $result = $this->contacts->insertContacts($data);

            if($result){
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
                    $this->mail->Subject = 'Ninh Kieu Restaurant Thong bao';
                    $this->mail->Body    =
                        '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                    <div style="margin:50px auto;width:70%;padding:20px 0">
                        <div style="border-bottom:1px solid #eee">
                            <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Ninh Kiều Restaurant xin chào quý khách</a>
                        </div>
                      
                        <div>
                            <h3 style="color: #00466a">Cảm ơn bạn đã liên hệ với chúng tôi</h3>
                        </div>
                        <p>Xin chào '.$full_name.',</p>
                        <p>Chúng tôi sẽ cố gắng liên lạc với bạn sớm nhất.</p>
                        <p>Mọi thắc mắc xin liên hệ: 0909 1509 09</p>
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
                        $response = new Response();
                        $response->redirect(_WEB_ROOT . 'lien-he');
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
                }
                
            }
        }
    }
}
