<?php
trait QueryBuilder
{
    public $tableName = '';
    public $where = '';
    public $operator = '';
    public $selectField = '*';
    public $limit = '';
    public $orderBy = '';
    public $groupBy = '';
    public $having = '';
    public $innerJoin = '';
    public $insert = '';

    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function where($field, $compare, $value)
    {
        $this->operator = " WHERE";
        if (!empty($this->where)) {
            $this->operator = " AND ";
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }

    public function andWhere($field, $compare, $value)
    {
        $this->operator = " AND";
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }


    public function having($field, $compare, $value)
    {
        $this->operator = " HAVING";
        if (!empty($this->having)) {
            $this->operator = " AND ";
        }
        $this->having .= "$this->operator $field $compare '$value'";
        return $this;
    }

    public function groupBy($fields)
    {
        if (is_array($fields)) {
            $this->groupBy = " GROUP BY " . implode(', ', $fields);
        } else {
            $this->groupBy = " GROUP BY $fields";
        }
        return $this;
    }

    public function orWhere($field, $compare, $value)
    {
        $this->operator = " WHERE ";
        if (!empty($this->where)) {
            $this->operator = " OR ";
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }

    public function whereLike($field, $value)
    {
        $this->operator = " WHERE ";
        if (!empty($this->where)) {
            $this->operator = " AND ";
        }
        $this->where .= "$this->operator $field LIKE '%$value%'";

        return $this;
    }

    public function limit($number, $offset = 0)
    {
        $this->limit = " LIMIT $offset, $number";
        return $this;
    }

    /**
     * ORDER BY id DESC
     * $this->db->orderBy('id','DESC')
     * $this->db->orderBy('id desc, name asc')
     */
    public function orderBy($field, $type = 'ASC')
    {
        $fileArr = array_filter(explode(',', $field));
        if (!empty($fileArr && count($fileArr) >= 2)) {
            // SQL order by multi
            $this->orderBy = " ORDER BY " . implode(', ', $fileArr);
        } else {
            $this->orderBy = " ORDER BY " . $field . " " . $type;
        }
        return $this;
    }

    public function select($field = "*")
    {
        $this->selectField = $field;
        return $this;
    }

    // Inner join
    public function join($tableName, $relationship)
    {
        $this->innerJoin .= " INNER JOIN $tableName ON $relationship ";
        return $this;
    }

    public function insert($data)
    {
        $tableName = $this->tableName;
        $insertStatus = $this->insertData($tableName, $data);
        return $insertStatus;
    }

    public function update($data)
    {
        $whereUpdate = str_replace('WHERE', '', $this->where);
        $whereUpdate = trim($whereUpdate);
        $tableName = $this->tableName;
        $updateStatus = $this->updateData($tableName, $data, $whereUpdate);
        return $updateStatus;
    }

    public function delete()
    {
        $whereDelete = str_replace('WHERE', '', $this->where);
        $whereDelete = trim($whereDelete);
        echo $whereDelete;
        $tableName = $this->tableName;
        $deleteStatus = $this->deleteData($tableName, $whereDelete);
        return $whereDelete;
    }

    public function lastId()
    {
        return $this->lastInsertId();
    }

    public function first()
    {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->orderBy $this->limit";
        $query = $this->query($sqlQuery);
        $this->resetQuery();
        if (!empty($query)) return $query->fetch(PDO::FETCH_ASSOC);
        return false;
    }

    public function get()
    {
        // echo $this->innerJoin;
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->groupBy $this->having $this->orderBy $this->limit";
        $query = $this->query($sqlQuery);
        $this->resetQuery();
        if (!empty($query)) return $query->fetchAll(PDO::FETCH_ASSOC);
        return false;
    }

    public function resetQuery()
    {
        // reset field
        $this->tableName = '';
        $this->where  = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->limit = '';
        $this->orderBy = '';
        $this->groupBy = '';
        $this->having = '';
        $this->innerJoin = '';
        $this->insert = '';
    }
}
