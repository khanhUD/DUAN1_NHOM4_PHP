<?php

class updateStatusController extends Controller
{
    public $data = [], $postComments, $orders,$productComments,$orderTables;

    public function __construct()
    {
        $this->postComments = $this->model('PostCommentsModel');
        $this->orders = $this->model('OrdersModel');
        $this->productComments = $this->model('ProductCommentsModel');
        $this->orderTables = $this->model('OrderTablesModel');

    }

    public function statusConmmentDetail()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $commentId = $postValues['comment_id'];
        $data = [
            'status' => $postValues['status'],
        ];
        $result = $this->postComments->updateStatusComment($data, $commentId);
        if ($result) {
            $response = new Response();
            $response->redirect('postComments');
        }
    }
    public function productComments()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $commentId = $postValues['comment_id'];
        $data = [
            'status' => $postValues['status'],
        ];
        $result = $this->productComments->updateStatusComment($data, $commentId);
        if ($result) {
            $response = new Response();
            $response->redirect('productComments');
        }
    }
    public function orders()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id']; // Đảm bảo bạn lấy đúng comment_id
        // Kiểm tra và xử lý giá trị status, có thể cần kiểm tra giá trị hợp lệ (on hoặc off)

        $data = [
            'status' => $postValues['status'],
        ];
        // Kiểm tra và cập nhật trạng thái
        $result = $this->orders->updateStatus($data, $id);

        if ($result) {
            $response = new Response();
            $response->redirect('orders');
        }
    }
    public function orderTables()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id']; // Đảm bảo bạn lấy đúng comment_id
        // Kiểm tra và xử lý giá trị status, có thể cần kiểm tra giá trị hợp lệ (on hoặc off)

        $data = [
            'status' => $postValues['status'],
        ];
        
        // Kiểm tra và cập nhật trạng thái
        $result = $this->orderTables->updateStatusOrderTables($data, $id);

        if ($result) {
            $response = new Response();
            $response->redirect('orderTables');
        }
    }
}
