<?php

class Database {

    protected $db;
    public $Error;
    public $Id;

    function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "media");
    }

    public function validate($data)
    {
        return htmlentities(strip_tags(trim(mysqli_real_escape_string($this->db, $data))));
    }

    public function viewIN($table, $fields = NULL, $where = NULL, $order = NULL)
    {

        $sql = "SELECT ";
        if ($fields)
            $sql .= $fields . " FROM ";
        else
            $sql .= " * FROM ";
        $sql .= $table;
        if ($where)
        {
            foreach ($where as $key => $value)
            {
                $sql .= " WHERE $key IN ($value) ";
            }
        }
//        echo $sql;
        return $this->db->query($sql);
    }

    public function view($table, $fields = NULL, $order = NULL, $where = NULL)
    {

        $sql = "SELECT ";
        if ($fields)
            $sql .= $fields . " FROM ";
        else
            $sql .= " * FROM ";

        $sql .= $table;

        if ($where)
        {
            $temp = "";
            foreach ($where as $key => $value)
            {
                if ($temp != "")
                    $temp .= " and ";
                $temp .= "$key='$value'";
            }
            $sql .= " where $temp ";
        }

        if ($order)
            $sql .= " ORDER BY $order[0] $order[1] ";


        return $this->db->query($sql);

        if ($this->db->query($sql))
        {
            $this->Id = $this->db->insert_id;
            return TRUE;
        }
        else
        {
            $this->Error = $this->db->error;
            return FALSE;
        }
    }

    public function insert($table, $arr)
    {
        $sql = "";
        foreach ($arr as $key => $value)
        {
            if ($sql != "")
            {
                $sql .= ", ";
            }
            $sql .= "{$key}='{$value}'";
        }

        $sql = "insert into {$table} set " . $sql;
//        return $sql;
        if ($this->db->query($sql))
        {
            $this->Id = $this->db->insert_id;
            return TRUE;
        }
        else
        {
            $this->Error = $this->db->error;
            return FALSE;
        }
    }

    public function multiInsert($table, $fields, $data)
    {
        $faka = '';
        foreach ($data as $values)
        {
            if ($faka != "")
            {
                $faka .= " , ";
            }
            $faka .= " ({$values})";
        }
        $sql = "INSERT INTO $table ({$fields}) VALUES " . $faka;

        if ($this->db->query($sql))
        {
            $this->Id = $this->db->insert_id;
            return TRUE;
        }
        else
        {
            $this->Error = $this->db->error;
            return FALSE;
        }
    }

    public function update($table, $fields, $where)
    {
        $sql = "";
        foreach ($fields as $key => $value)
        {
            if ($sql != "")
            {
                $sql .= ", ";
            }
            $sql .= "{$key}='{$value}'";
        }

        $sql = "update {$table} set " . $sql;

        $temp = "";
        if ($where)
        {
            foreach ($where as $key => $value)
            {
                if ($temp != "")
                {
                    $temp .= " and ";
                }
                $temp .= "{$key}='{$value}'";
            }
            $sql .= " where $temp";
        }
        $sql;


        if ($this->db->query($sql))
        {
            //$this->Id = $this->db->insert_id;
            return TRUE;
        }
        else
        {
            //echo $this->db->error;
            $this->Error = $this->db->error;
            return FALSE;
        }
    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM $table ";

        // where is must
        $temp = "";
        foreach ($where as $key => $value)
        {
            if ($temp != "")
            {
                $temp .= " and ";
            }
            $temp .= "{$key}='{$value}'";
        }
        $sql .= " where $temp";

        // send to db
        if ($this->db->query($sql))
        {
            //$this->Id = $this->db->insert_id;
            return TRUE;
        }
        else
        {
            //echo $this->db->error;
            $this->Error = $this->db->error;
            return FALSE;
        }
    }

    public function procedure($name, $param)
    {
        $called = $this->db->query("CALL `$name`($param)");
        if ($called)
        {
            return $called;
        }
        else
        {
            $this->Error = $this->db->error;
            return FALSE;
        }
    }

}
