<?php
class ProductModel
{
    public function getProductList() {
        $data = [
            'item 1',
            'item 2',
            'item 3',
        ];
        return $data;
    }
    public function getDetail($id){
        $data = [
            'item 1',
            'item 2',
            'item 3',
        ];
        return $data[$id];
    }
}
