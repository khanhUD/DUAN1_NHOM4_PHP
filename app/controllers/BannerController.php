<?php

class BannerController extends Controller
{

    public $data = [], $banners;

    public function __construct()
    {
        $this->banners = $this->model('BannerModel');
    }

    public function add()
    {
        $this->data['sub_content']['banners'] = $this->banners->getList(); //lay danh sach banner
        $this->data['sub_content']['title'] = 'Day la banner';
        $this->data['content'] = 'admin/banner/add';
        $this->render('layouts/admin_layout', $this->data);
        $request = new Request;
        if ($request->isPost()) {
            if ($request->isPost()) {

                $request->rules([
                    'title' => 'unique:banner:title'
                ]);

                $request->messages([
                    'title.unique' => 'Tiêu đề đã tồn tại, vui lòng nhập tiêu đề mới'
                ]);

                $validate = $request->validate();

                if (!$validate) {
                    Session::flash('msg', 'Tiêu đề đã tồn tại, vui lòng nhập tiêu đề mới');
                    Session::flash('errors', $request->errors());
                    Session::flash('old', $request->getFields());

                    $response  = new Response();
                    $response->redirect('users');
                }
                $postValues = $request->getFields();

                $image = $postValues['image'];
                $targetDir = "public/uploads/";
                $targetFile = $targetDir . basename($image["name"]);
                if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                    echo "Tệp " . basename($image["name"]) . " đã được tải lên thành công.";
                } else {
                    // echo "Có lỗi xảy ra khi tải lên tệp.";
                }

                $data = [
                    'title' => $postValues['title'],
                    'link' => $postValues['link'],
                    'image' => $postValues['image']['name']
                ];

                $result = $this->banners->addBanner($data);

                if ($result) {
                    Session::flash('msg', 'Thêm thành công !');
                    $response = new Response();
                    $response->redirect('banner');
                }
            }
        }
    }
    // lay ve hien thi len form sua 
    public function edit()
    {
        $request = new Request;
        $id = $request->getFields()['id'];
        $this->data['sub_content']['banner_detail'] = $this->banners->getDetail($id);
        $this->data['content'] = 'admin/banner/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
    // update banner 
    public function edit_post()
    {
        $request = new Request;
        $postValues = $request->getFields(); //layid
        $id = $postValues['id'];
        $request->rules([
            'title' => 'unique:banner:title'
        ]);

        $request->messages([
            'title.unique' => 'Tiêu đề đã tồn tại, vui lòng nhập tiêu đề mới'
        ]);

        $validate = $request->validate();

        if (!$validate) {
            Session::flash('msg', 'Tiêu đề đã tồn tại, vui lòng nhập tiêu đề mới');
            Session::flash('errors', $request->errors());
            Session::flash('old', $request->getFields());

            $response  = new Response();
            $response->redirect('banner/edit?id='.$id);
        }
        $data = [
            'image' => $postValues['imageOld'],
            'title' => $postValues['title'],
            'link' => $postValues['link'],
            'status' => $postValues['status'],
        ];
        $image = $postValues['image'];
        $targetDir = "public/uploads/";
        $targetFile = $targetDir . basename($image["name"]);

        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            echo "Tệp " . basename($image["name"]) . " đã được tải lên thành công.";
            $data['image'] = $postValues['image']['name'];
        } else {
            // Ảnh cũ đã tồn tại, sử dụng ảnh cũ
            $data['image'] = $postValues['imageOld'];
            echo "Có lỗi xảy ra khi tải lên tệp.";
        }

        $result = $this->banners->updateBanner($data, $id);

        if ($result) {
            Session::flash('msg', 'Sửa thành công !');
            $response = new Response();
            $response->redirect('banner/add');
        }
    }
}
