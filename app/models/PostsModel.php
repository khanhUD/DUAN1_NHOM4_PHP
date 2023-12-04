<?php
class PostsModel extends Model
{
    private $_table = 'posts';
    private $_field = '*';

    function tableFill()
    {
        return 'posts';
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'id';
    }

    public function getList()
    {
        $data = $this->db->select($this->_field)
            ->table($this->_table)
            ->where('posts.status', '!=', 'delete')
            ->orderBy('posts.create_at', 'Desc')
            ->get();
        return $data;
    }
    public function getDetail($id)
    {
        $data = $this->db->select('*')->table($this->_table)->where('id', '=', $id)->first();
        return $data;
    }
    public function add($data)
    {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }
    public function updatePosts($data, $id)
    {
        $data = $this->db->table($this->_table)->where('posts.id', '=', $id)->update($data);
        return $data;
    }
    public function getListHidden()
    {
        $data = $this->db->select($this->_field)
            ->table($this->_table)
            ->where('posts.status', '=', 'delete')
            ->orderBy('posts.create_at', 'Desc')
            ->get();

    }// hiện tất cả bài viết client có trạng thái on 
    
    public function getListClient()
    {
        $data= $this->db->select($this->_field)->table($this->_table)->where('status', '=' , 'on')->get();
        return $data;
    }

    // hiện tất cả bài viết client theo danh mục
    public function getListClientByCategory($id)
    {
        $data = $this->db->query("SELECT * FROM posts WHERE post_category_id = '$id' AND status = 'on' ")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
