<?php

class PostsController extends Controller
{
    public $data = [], $posts, $postCategories;
    public function __construct()
    {
        $this->posts = $this->model('PostsModel');
        $this->postCategories = $this->model('PostCategoriesModel');
    }
    public function index()
    {
        $this->data['sub_content']['posts'] = $this->posts->getList();
        $this->data['sub_content']['postCategories'] = $this->postCategories->getList();
        $this->data['sub_content']['title'] = 'Thêm bài viết';
        $this->data['content'] = 'admin/posts/add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function add()
    {
        $request = new Request;
        if ($request->isPost()) {
            $request->rules([
                'title' => 'unique:posts:title'
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
                $response->redirect(_WEB_ROOT .'posts');
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
                'post_category_id' => $postValues['post_category_id'],
                'title' => $postValues['title'],
                'image' => $postValues['image']['name'],
                'content' => $postValues['content'],
            ];

            $result = $this->posts->add($data);

            if ($result) {
                Session::flash('msg', 'Thêm sản phẩm thành công !');
                $response = new Response();
                $response->redirect(_WEB_ROOT .'posts');
            }
        }
    }
    public function edit()
    {
        $request = new Request;
        $id = $request->getFields()['id'];
        $this->data['sub_content']['postCategories'] = $this->postCategories->getList();
        $this->data['sub_content']['posts'] = $this->posts->getDetail($id);
        $this->data['content'] = 'admin/posts/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function edit_post()
    {
        $request = new Request;
        $postValues = $request->getFields(); //layid
        $id = $postValues['id'];
        $request->rules([
            'title' => 'unique:posts:title'
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
            $response->redirect(_WEB_ROOT .'posts/edit?id=' . $id);
        }
        $data = [
            'image' => $postValues['imageOld'],
            'post_category_id' => $postValues['post_category_id'], // Sửa đổi tên trường này
            'title' => $postValues['title'],
            'content' =>$postValues['content']
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

        $result = $this->posts->updatePosts($data, $id);

        if ($result) {
            Session::flash('msg', 'Sửa thành công !');
            $response = new Response();
            $response->redirect(_WEB_ROOT .'posts');
        }
    }
    public function updatePosts()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $data = [
            'status' => $postValues['status'],
        ];
        $result = $this->posts->updatePosts($data, $id);
        if ($result) {
            $response = new Response();
            $response->redirect(_WEB_ROOT .'posts');
        }
    }
    public function list_hidden()
    {
        $this->data['sub_content']['list_hidden'] = $this->posts->getListHidden();
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/posts/list_hidden';
        $this->render('layouts/admin_layout', $this->data);
    }
}
