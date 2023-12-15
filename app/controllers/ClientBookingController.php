<?php

class ClientBookingController extends Controller
{

    public $booking, $products, $data = [];

    public function __construct()
    {
        $this->booking = $this->model('BookingModel');
        $this->products = $this->model('ProductsModel');
    }

    public function index()
    {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'clients/booking';
        $this->data['sub_content']['count_view'] = $this->products->getProductCountView();
        $this->render('layouts/client_layout', $this->data);
    }
    public function add()
    {
        $request = new Request;
        $postValues = $request->getFields();
         //layid
        $data = [
            'phone' => $postValues['phone'],
            'full_name' => $postValues['full_name'],
            'user_id' => $postValues['user_id'],
            'number_people' => $postValues['number_people'],
            'arrival_date' => $postValues['arrival_date'],
            'arrival_time' => $postValues['arrival_time'],
            
        ];
        // var_dump($data);die();

        $result = $this->booking->addBooking($data);


        if ($result) {
            Session::flash('msg', 'Thêm thành công !');
            $response = new Response();
            $response->redirect(_WEB_ROOT . 'dat-ban');
        }
    }
}
