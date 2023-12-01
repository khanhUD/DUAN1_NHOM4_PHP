
    <?php

    class OrderTablesModel extends Model
    {

        private $_table = 'orders_table';
        private $_field = '*';

        function tableFill()
        {
            return 'orders_table';
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
            $data = $this->db->select('
            orders_table.id as table_id ,
            orders_table.user_id as users_id  ,
            orders_table.status as status ,
            orders_table.phone as phone,
            orders_table.full_name as full_name,
            orders_table.number_people as number_people,
            orders_table.arrival_date as arrival_date,
            orders_table.arrival_time as arrival_time,
            users.email as users_email
            ')
                ->table($this->_table)
                ->join('users', 'orders_table.user_id = users.id')
                ->where('orders_table.status', '!=', 'delate')
                ->orderBy(' orders_table.id', 'Desc')
                ->get();
            return $data;
        }

        public function updateStatusOrderTables($data, $id)
        {
            $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
            return $data;
        }
        public function getListHidden()
        {
            $data = $this->db->select('
            orders_table.id as table_id ,
            orders_table.user_id as users_id  ,
            orders_table.status as status ,
            orders_table.phone as phone,
            orders_table.full_name as full_name,
            orders_table.number_people as number_people,
            orders_table.arrival_date as arrival_date,
            orders_table.arrival_time as arrival_time,
            users.email as users_email
            ')
                ->table($this->_table)
                ->join('users', 'orders_table.user_id = users.id')
                ->where('orders_table.status', '=', 'delate')
                ->orderBy(' orders_table.id', 'Desc')
                ->get();
            return $data;
        }
    }
