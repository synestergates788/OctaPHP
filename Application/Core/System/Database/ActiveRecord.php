<?php
namespace System\Database;

class ActiveRecord{
    protected $redbean;

    var $last_id;
    var $last_query;

    var $get;
    var $select;
    var $where;
    var $or_where;
    var $order_by;
    var $join;
    var $group_by;
    var $table;
    var $limit;
    var $offset;
    var $where_in;
    var $or_where_in;
    var $where_not_in;
    var $or_where_not_in;
    var $like;
    var $or_like;
    var $not_like;
    var $or_not_like;
    var $row;
    var $num_rows;
    var $result;

    public function __construct($redbean){
        $this->redbean = $redbean;
    }

    public function insertId(){
        return $this->last_id;
    }

    public function lastQuery(){
        return $this->last_query;
    }

    public function insert($array,$table){
        $data = $this->redbean->dispense($table);

        if($array){
            foreach($array as $key=>$row){
                $data->$key = $row;
            }
        }

        $this->last_id = $this->redbean->store($data);
        $this->redbean->close();
        return ($this->last_id) ? true : false;
    }

    public function insertBatch($array,$table){
        $data = array();

        if($array){
            foreach($array as $key_ib=>$row_ib){

                $data[$key_ib]=$this->redbean->dispense($table);
                $table_fields = [];
                $table_fields_val = [];

                if($row_ib){
                    foreach($row_ib as $row=>$val){
                        $table_fields[] = $row;
                        $table_fields_val[] = $val;
                    }

                    if($table_fields && $table_fields_val){
                        foreach($table_fields as $key=>$row){
                            $data[$key_ib]->$row = $table_fields_val[$key];
                        }

                    }else{
                        return false;
                    }
                }
            }
        }

        $result = $this->redbean->storeAll($data);
        $this->redbean->close();
        return ($result) ? true : false;
    }

    public function update($table,$array,$id){
        $data = $this->redbean->load($table, $id);

        if($array){
            foreach($array as $key=>$row){
                $data->$key = $row;
            }
        }

        $result = $this->redbean->store($data);
        $this->redbean->close();
        return ($result) ? true : false;
    }

    public function updateBatch($table,$array,$where){
        if($array){
            foreach($array as $key_ub=>$row_ub){
                $where_key = '';
                $table_fields = [];
                $table_fields_val = [];

                if($row_ub){
                    foreach($row_ub as $row=>$val){

                        if($row === $where){
                            $where_key = $val;
                        }

                        if($row !== $where){
                            $table_fields[] = $row;
                            $table_fields_val[] = $val;
                        }
                    }

                    $data = $this->redbean->load($table, $where_key);
                    if($table_fields && $table_fields_val){
                        foreach($table_fields as $key=>$row){
                            $data->$row = $table_fields_val[$key];
                        }

                    }else{
                        return false;
                    }

                    $this->redbean->store($data);
                }
            }
        }
        $this->redbean->close();
        return true;
    }

    public function delete($table,$id){
        if($id){
            if(is_array($id)){
                foreach($id as $key=>$row){
                    $this->redbean->trash($table,$row);
                }

                $this->redbean->close();
                return true;

            }else{
                $result = $this->redbean->trash($table,$id);
                $this->redbean->close();
                return ($result) ? true : false;
            }
        }
    }

    public function deleteAll($table){
        $result = $this->redbean->wipe($table);
        $this->redbean->close();
        return ($result) ? true : false;
    }

    public function select($data){
        $reset = [];
        if($data){
            foreach($data as $key=>$row){
                array_push($reset,$row);
            }
        }

        $this->select = $reset;
        return $this->select;
    }

    public function where($data=null,$match=null){
        $tmp_where = '';
        $arr_check = false;
        if($data){
            if(is_array($data)){
                end($data);
                $last_element = key($data);

                if($data){
                    $arr_check = true;
                    foreach($data as $key=>$row){
                        if($key == $last_element){
                            $tmp_where .= $key."='".$row."'";
                        }else{
                            $tmp_where .= $key."='".$row."' AND ";
                        }
                    }
                }
            }else{
                $arr_check = false;
                $tmp_where = "WHERE ".$data."='".$match."'";
            }
        }

        $this->where = ($arr_check) ? "WHERE ".$tmp_where : $tmp_where;
    }

    public function orWhere($data=null,$match=null){
        $tmp_or_where = '';
        $arr_check = false;
        if($data){
            if(is_array($data)){
                end($data);
                $last_element = key($data);
                $arr_check = true;

                if($data){
                    foreach($data as $key=>$row){
                        if($key == $last_element){
                            $tmp_or_where .= $key."='".$row."'";
                        }else{
                            $tmp_or_where .= $key."='".$row."' AND ";
                        }
                    }
                }
            }else{
                $arr_check = false;
                $tmp_or_where = "OR ".$data."='".$match."'";
            }
        }

        $this->or_where = ($arr_check) ? "OR ".$tmp_or_where : $tmp_or_where;
    }

    public function whereIn($field,$data){
        $where_in_fields = '';
        $last_key = end(array_keys($data));
        if($data){
            foreach($data as $key=>$row){
                if($key == $last_key){
                    $where_in_fields .= $row;
                }else{
                    $where_in_fields .= $row.",";
                }
            }
        }

        $this->where_in = 'WHERE '.$field.' IN ('.$where_in_fields.')';
    }

    public function orWhereIn($field,$data){
        $where_in_fields = '';
        $last_key = end(array_keys($data));
        if($data){
            foreach($data as $key=>$row){
                if($key == $last_key){
                    $where_in_fields .= $row;
                }else{
                    $where_in_fields .= $row.",";
                }
            }
        }

        $this->or_where_in = 'OR '.$field.' IN ('.$where_in_fields.')';
    }

    public function whereNotIn($field,$data){
        $where_in_fields = '';
        $last_key = end(array_keys($data));
        if($data){
            foreach($data as $key=>$row){
                if($key == $last_key){
                    $where_in_fields .= $row;
                }else{
                    $where_in_fields .= $row.",";
                }
            }
        }

        $this->where_not_in = 'WHERE '.$field.' NOT IN ('.$where_in_fields.')';
    }

    public function orWhereNotIn($field,$data){
        $where_in_fields = '';
        $last_key = end(array_keys($data));
        if($data){
            foreach($data as $key=>$row){
                if($key == $last_key){
                    $where_in_fields .= $row;
                }else{
                    $where_in_fields .= $row.",";
                }
            }
        }

        $this->or_where_not_in = 'OR '.$field.' NOT IN ('.$where_in_fields.')';
    }

    public function like($data=null,$match=null){
        $tmp_like = '';
        $arr_check = false;
        if($data){
            if(is_array($data)){
                end($data);
                $last_element = key($data);

                if($data){
                    $arr_check = true;
                    foreach($data as $key=>$row){
                        if($key == $last_element){
                            $tmp_like .= $key." LIKE '%".$row."%'";
                        }else{
                            $tmp_like .= $key." LIKE '%".$row."%' AND ";
                        }
                    }
                }
            }else{
                $arr_check = false;
                $tmp_like = "WHERE ".$data." LIKE '%".$match."%'";
            }

        }

        $this->like = ($arr_check) ? "WHERE ".$tmp_like : $tmp_like;
    }

    public function orLike($data=null,$match=null){
        $tmp_or_like = '';
        if($data){
            if(is_array($data)){
                end($data);
                $last_element = key($data);

                if($data){
                    foreach($data as $key=>$row){
                        if($key == $last_element){
                            $tmp_or_like .= "OR ".$key." LIKE '%".$row."%'";
                        }else{
                            $tmp_or_like .= "OR ".$key." LIKE '%".$row."%' AND ";
                        }
                    }
                }
            }else{
                $tmp_or_like = "OR ".$data." LIKE '%".$match."%'";
            }
        }

        $this->or_like = $tmp_or_like;
    }

    public function notLike($data=null,$match=null){
        $tmp_like = '';
        $arr_check = false;
        if($data){
            if(is_array($data)){
                end($data);
                $last_element = key($data);

                if($data){
                    $arr_check = true;
                    foreach($data as $key=>$row){
                        if($key == $last_element){
                            $tmp_like .= $key." NOT LIKE '%".$row."%'";
                        }else{
                            $tmp_like .= $key." NOT LIKE '%".$row."%' AND ";
                        }
                    }
                }
            }else{
                $arr_check = false;
                $tmp_like = "WHERE ".$data." NOT LIKE '%".$match."%'";
            }

        }

        $this->like = ($arr_check) ? "WHERE ".$tmp_like : $tmp_like;
    }

    public function orNotLike($data=null,$match=null){
        $tmp_or_like = '';
        if($data){
            if(is_array($data)){
                end($data);
                $last_element = key($data);

                if($data){
                    foreach($data as $key=>$row){
                        if($key == $last_element){
                            $tmp_or_like .= "OR ".$key." NOT LIKE '%".$row."%'";
                        }else{
                            $tmp_or_like .= "OR ".$key." NOT LIKE '%".$row."%' AND ";
                        }
                    }
                }
            }else{
                $tmp_or_like = "OR ".$data." NOT LIKE '%".$match."%'";
            }
        }

        $this->or_like = $tmp_or_like;
    }

    public function orderBy($field,$sort){
        $this->order_by = $field.' '.$sort;
    }

    public function join($table,$joint,$join_type="INNER"){
        $this->join = $join_type.' JOIN '.$table.' ON '.$joint;
    }

    public function groupBy($field){
        $this->group_by = 'GROUP BY '.$field;
    }

    public function get($table=null,$limit=null,$offset=null){
        $this->table = $table;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function clearGlobalVar(){
        $this->select = '';
        $this->where = '';
        $this->or_where = '';
        $this->order_by = '';
        $this->join = '';
        $this->group_by = '';
        $this->limit = '';
        $this->table = '';
        $this->offset = '';
        $this->where_in = '';
        $this->or_where_in = '';
        $this->where_not_in = '';
        $this->or_where_not_in = '';
        $this->like = '';
        $this->or_like = '';
        $this->not_like = '';
        $this->or_not_like = '';
        $this->row = '';
        $this->num_rows = '';
        $this->result = '';
    }

    public function row(){
        /*init var*/
        $result = [];
        $select = ($this->select) ? implode(',',$this->select) : '*';
        $order_by = ($this->order_by) ? 'ORDER BY '.$this->order_by : '';
        $join = ($this->join) ? $this->join : '';
        $group_by = ($this->group_by) ? $this->group_by : '';
        $limit = ($this->limit) ? 'LIMIT '.$this->limit : '';
        $offset = ($this->offset) ? 'OFFSET '.$this->offset : '';
        $table = ($this->table) ? $this->table : '';

        $where = ($this->where) ? $this->where : '';
        $or_where = ($this->or_where) ? $this->or_where : '';
        $where_in = ($this->where_in) ? $this->where_in : '';
        $or_where_in = ($this->or_where_in) ? $this->or_where_in : '';
        $where_not_in = ($this->where_not_in) ? $this->where_not_in : '';
        $or_where_not_in = ($this->or_where_not_in) ? $this->or_where_not_in : '';

        $like = ($this->like) ? $this->like : '';
        $or_like = ($this->or_like) ? $this->or_like : '';
        $not_like = ($this->not_like) ? $this->not_like : '';
        $or_not_like = ($this->or_not_like) ? $this->or_not_like : '';
        /*end init var*/

        $this->row = "SELECT {$select} FROM {$table} {$join} {$where} {$or_where} {$where_in} {$or_where_in} {$where_not_in} {$or_where_not_in} {$like} {$or_like} {$not_like} {$or_not_like} {$group_by} {$order_by} {$limit} {$offset}";
        $this->last_query = $this->row;
        $data = $this->redbean->getRow($this->row);
        if($data){
            foreach($data as $key=>$row){
                $result[$key] = $row;
            }
        }

        /*clear global variables*/
        $this->clearGlobalVar();
        /*end clearing global variables*/

        return $result;
    }

    public function numRows(){
        /*init var*/
        $result = 0;#array();
        $select = ($this->select) ? implode(',',$this->select) : '*';
        $order_by = ($this->order_by) ? 'ORDER BY '.$this->order_by : '';
        $join = ($this->join) ? $this->join : '';
        $group_by = ($this->group_by) ? $this->group_by : '';
        $limit = ($this->limit) ? 'LIMIT '.$this->limit : '';
        $offset = ($this->offset) ? 'OFFSET '.$this->offset : '';
        $table = ($this->table) ? $this->table : '';

        $where = ($this->where) ? $this->where : '';
        $or_where = ($this->or_where) ? $this->or_where : '';
        $where_in = ($this->where_in) ? $this->where_in : '';
        $or_where_in = ($this->or_where_in) ? $this->or_where_in : '';
        $where_not_in = ($this->where_not_in) ? $this->where_not_in : '';
        $or_where_not_in = ($this->or_where_not_in) ? $this->or_where_not_in : '';

        $like = ($this->like) ? $this->like : '';
        $or_like = ($this->or_like) ? $this->or_like : '';
        $not_like = ($this->not_like) ? $this->not_like : '';
        $or_not_like = ($this->or_not_like) ? $this->or_not_like : '';
        /*end init var*/

        $this->num_rows = "SELECT {$select} FROM {$table} {$join} {$where} {$or_where} {$where_in} {$or_where_in} {$where_not_in} {$or_where_not_in} {$like} {$or_like} {$not_like} {$or_not_like} {$group_by} {$order_by} {$limit} {$offset}";
        $this->last_query = $this->num_rows;
        $data = $this->redbean->getAll($this->num_rows);
        if($data){
            foreach($data as $key=>$row){
                $result++;
            }
        }

        /*clear global variables*/
        $this->clearGlobalVar();
        /*end clearing global variables*/

        return $result;
    }

    public function result(){
        /*init var*/
        $result = array();
        $select = ($this->select) ? implode(',',$this->select) : '*';
        $order_by = ($this->order_by) ? 'ORDER BY '.$this->order_by : '';
        $join = ($this->join) ? $this->join : '';
        $group_by = ($this->group_by) ? $this->group_by : '';
        $limit = ($this->limit) ? 'LIMIT '.$this->limit : '';
        $offset = ($this->offset) ? 'OFFSET '.$this->offset : '';
        $table = ($this->table) ? $this->table : '';

        $where = ($this->where) ? $this->where : '';
        $or_where = ($this->or_where) ? $this->or_where : '';
        $where_in = ($this->where_in) ? $this->where_in : '';
        $or_where_in = ($this->or_where_in) ? $this->or_where_in : '';
        $where_not_in = ($this->where_not_in) ? $this->where_not_in : '';
        $or_where_not_in = ($this->or_where_not_in) ? $this->or_where_not_in : '';

        $like = ($this->like) ? $this->like : '';
        $or_like = ($this->or_like) ? $this->or_like : '';
        $not_like = ($this->not_like) ? $this->not_like : '';
        $or_not_like = ($this->or_not_like) ? $this->or_not_like : '';
        /*end init var*/

        #$this->get($table,$limit,$offset);

        $this->result = "SELECT {$select} FROM {$table} {$join} {$where} {$or_where} {$where_in} {$or_where_in} {$where_not_in} {$or_where_not_in} {$like} {$or_like} {$not_like} {$or_not_like} {$group_by} {$order_by} {$limit} {$offset}";
        $this->last_query = $this->result;
        $data = $this->redbean->getAll($this->result);
        if($data){
            foreach($data as $key=>$row){
                $result[$key] = (object)$row;
            }
        }

        /*clear global variables*/
        $this->clearGlobalVar();
        /*end clearing global variables*/

        return $result;
    }
}