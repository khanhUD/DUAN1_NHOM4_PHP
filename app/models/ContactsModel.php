<?php
class ContactsModel extends Model
{
    private $_table = 'contacts';
    private $_field = '*';

    function tableFill()
    {
        return 'contacts';
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
        $data = $this->db->query("SELECT $this->_field FROM $this->_table ORDER BY create_at DESC")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getDetail($id)
    {
        $data = $this->db->select('*')->table($this->_table)->where('id', '=', $id)->first();
        return $data;
    } public function updateStatus($data, $id) {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }

    public function deleteContacts($id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }
}
