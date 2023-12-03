<?php

class DeleteController extends Controller
{
    public $banner, $postComments, $productCategories,$posts, $err;

    public function __construct()
    {
        $this->banner = $this->model('BannerModel');
        $this->postComments = $this->model('PostCommentsModel');
        $this->productCategories = $this->model('ProductCategoriesModel');
        $this->posts = $this->model('PostsModel');

    }

    public function banner()
    {

        $request = new Request;
        if ($request->isPost()) {
            $id = $request->getFields()['id'];
            $this->banner->deleteBanner($id);
            $response = new Response;
            $response->redirect('banner');
        }
    }
    public function postComments()
    {

        $request = new Request;
        if ($request->isPost()) {
            $id = $request->getFields()['id'];
            $this->postComments->delateCommentDetails($id);
            $response = new Response;
            $response->redirect('postComments');
        }
    }
    public function productCategories()
    {
        $request = new Request;
        $id = $request->getFields()['id'];
        // Kiểm tra xem loại sản phẩm có chứa sản phẩm hay không
        $productCount = $this->productCategories->getProductCountByCategoryId($id);

        if ($productCount > 0) {
            // Loại sản phẩm có chứa sản phẩm, không thể xóa
            $response = new Response();
            $response->redirect('productCategories');
        } else {
            $result = $this->productCategories->deleteProductCategories($id);
            if ($result) {
                $response = new Response();
                $response->redirect('productCategories');
            }
        }
    }
  
}
