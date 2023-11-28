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
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                $response = new Response();
                $response->redirect('banner');
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
        $postValues = $request->getFields();
        $id = $postValues['id'];

        $result = $this->banners->updateBanner($postValues, $id);

        if ($result) {
            // Nếu thành công chuyển hướng đến danh sách danh mục
            $response = new Response();
            $response->redirect('banner/add');
        }
    }
    public function delete()
    {  
        $request = new Request();
        $id = $request->getFields(); //lấy id
        $product = $this->model('ProductModel');
        $product->deleteBanner($id['id']);
        $response  = new Response();
        $response->redirect('banner/add');
    }
}
