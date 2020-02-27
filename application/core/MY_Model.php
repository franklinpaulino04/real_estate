<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

    /**
     * Database table to use
     * @var string
     */
    public $table_name;

    /**
     * Database view to use
     * @var string
     */
    public $view_name;

    /**
     * Primary key field
     * @var string
     */
    public $primary_key = '';

    /**
     * Customer companyId value
     * @var int
     */
    public $companyId;

    /**
     * Customer warehouseId value
     * @var int
     */
    public $warehouseId;

    /**
     * Customer locationId value
     * @var int
     */
    public $locationId;

    /**
     * Customer currencyId value
     * @var int
     */
    public $local_currencyId;

    /**
     * The filter that is used on the primary key. Since most primary keys are
     * autoincrement integers, this defaults to intval. On non-integers, you would
     * typically use something like xss_clean of htmlentities.
     * @var string
     */
    public $primaryFilter = 'intval';


    /**
     * Order by Field. Default order for this model.
     * @var string
     */
    public $order_by = '';

    public function __construct()
    {
        parent::__construct();

        $this->companyId         = (isset($this->session->userdata('user_data')['companyId'])) ? $this->session->userdata('user_data')['companyId'] : '';
        $this->userId            = (isset($this->session->userdata('user_data')['userId'])) ? $this->session->userdata('user_data')['userId'] : '';
    }

    /**
     * Counts all the records in the table
     *
     * @return int
     * @author Nelson Cabrera
     */
    public function count($where = FALSE)
    {
        if($where != FALSE)
        {
            is_array($where) || $where = array($where);
        }
        else
        {
            $where['hidden'] = 0;
        }

        $count = $this->db->where($where)->from($this->table_name)->count_all_results();
        return $count;
    }

    /**
     * Count all the records in a table by comparing a column to a value
     *
     * @param array
     * @return number
     * @author Nelson Cabrera
     */
    public function count_by($where, $where_in = FALSE)
    {
        is_array($where) || $where = array($where);
        $this->db->where($where);

        if($where_in != FALSE)
        {
            is_array($where_in) || $where_in = array($where_in);
            $this->db->where_in($where_in['column'], $where_in['values']);
        }

        $count = $this->db->from($this->table_name)->count_all_results();

        return $count;
    }

    /**
     * Count all the records in a table by comparing a column to a value
     *
     * @param array
     * @return number
     * @author Nelson Cabrera
     */
    public function count_single()
    {
        $count = $this->db->from($this->table_name)->count_all_results();
        return $count;
    }

    /**
     * Gets all the records in a table
     * If you provide an @id then that row will be return,
     * if no @id is provided the it will return all records
     *
     * @param mixed id or array
     * @return array
     * @author Nelson Cabrera
     */
    public function get($ids = FALSE)
    {
        // Check if is a single record or many records
        $single = $ids == FALSE || is_array($ids) ? FALSE : TRUE;

        // Limit results to one or more ids
        if ($ids !== FALSE)
        {
            // always convert to array
            is_array($ids) || $ids = array($ids);

            // Remove any Id that does not match the filter
            $filter = $this->primaryFilter;
            $ids = array_map($filter, $ids);

            $this->db->where_in($this->primary_key, $ids);
        }

        // Set order if not set
        strlen($this->order_by) > 0 || $this->db->order_by($this->order_by);

        // Return results
        $single == FALSE || $this->db->limit(1);
        $method = $single ? 'row' : 'result';
        return $this->db->where('companyId', $this->companyId)->get($this->table_name)->$method();
    }

    /**
     * Gets all the records in a table by comparing a column to a value
     *
     * @param string field(s)
     * @param boolean
     * @return array
     * @author Nelson Cabrera
     */
    public function get_by($data, $single = FALSE, $order_by = FALSE)
    {
        // Limit results to one or more ids
        if ($data !== FALSE)
        {
            // always convert to array
            is_array($data) || $data = array($data);
            array_map('htmlentities', $data);
            $this->db->where($data);
        }

        if($order_by !== FALSE)
        {
            $this->db->order_by($order_by);
        }

        // Return results
        $single == FALSE || $this->db->limit(1);
        $method = $single ? 'row' : 'result';
        return $this->db->get($this->table_name)->$method();
    }

    /**
     * Gets records columns from a table by comparing a column to a value
     *
     * @param mixed columns(s)
     * @param string field(s)
     * @param boolean
     * @return array
     * @author Nelson Cabrera
     */
    public function get_columns_by($columns = FALSE, $where, $single = FALSE, $order_by = FALSE, $with_default_rows = FALSE, $limit = FALSE, $num_limit = 1, $no_ids = FALSE, $ids = FALSE)
    {
        if ($columns !== FALSE)
        {
            $this->db->select($columns);
        }

        if ($where !== FALSE)
        {
            // always convert to array
            is_array($where) || $where = array($where);
            array_map('htmlentities', $where);
            $this->db->where($where);
        }

        // Limit results to one or more ids
        if ($ids !== FALSE)
        {
            // always convert to array
            is_array($ids) || $ids = array($ids);

            // Remove any Id that does not match the filter
            $filter = $this->primaryFilter;
            $ids = array_map($filter, $ids);

            $this->db->where_in($this->primary_key, $ids);
        }


        if($with_default_rows !== FALSE)
        {
            $this->db->where_in('companyId', array($this->companyId, '0'));
        }

        if ($no_ids !== FALSE)
        {
            // always convert to array
            is_array($no_ids) || $ids = array($no_ids);

            // Remove any Id that does not match the filter
            $filter = $this->primaryFilter;
            $no_ids = array_map($filter, $no_ids);

            $this->db->where_not_in($this->primary_key, $no_ids);
        }

        if ($order_by !== FALSE)
        {
            $this->db->order_by($order_by);
        }

        // Remove Backticks
        $this->db->protect_identifiers=false;
        // Return results
        $single == FALSE || $this->db->limit($num_limit);
        $limit == FALSE || $this->db->limit($num_limit);
        $method = $single ? 'row' : 'result';
        return $this->db->get($this->table_name)->$method();
    }

    /**
     * Gets records columns from a table by comparing a column to a value
     *
     * @param mixed columns(s)
     * @param string field(s)
     * @param boolean
     * @return array
     * @author Nelson Cabrera
     */
    public function get_last_record($column = FALSE, $where = FALSE)
    {
        if ($column !== FALSE)
        {
            $this->db->select($column);
        }

        if ($where !== FALSE)
        {
            // always convert to array
            is_array($where) || $where = array($where);
            array_map('htmlentities', $where);
            $this->db->where($where);
        }

        $this->db->order_by($this->order_by);

        // Remove Backticks
        $this->db->protect_identifiers=false;
        $this->db->limit(1);
        return $this->db->get($this->table_name)->row()->$column;
    }

    /**
     * Get a single column for a record from the table
     * You must provide @column as well as @id,
     * in order to get a result.
     *
     * @param mixed string
     * @param mixed array
     * @return mixed string
     * @author Nelson Cabrera
     */
    function get_single($column = FALSE, $where = FALSE)
    {
        if ($column !== FALSE && $where !== FALSE)
        {
            is_array($where) || $where = array($where);
            $result = $this->db->where($where)->select($column)->get($this->table_name);
            return (empty($result->row()))? "" : $result->row()->$column;
        }
    }

    /**
     * Gets all the records in a view by comparing a column to a value
     * You can optionally provide @columns as well as @where filters
     *
     * @param mixed string
     * @param mixed array
     * @param mixed string
     * @return mixed string
     * @author Nelson Cabrera
     */
    function view($where = FALSE, $columns = FALSE, $single = FALSE, $view = FALSE, $companyId = FALSE, $order_by = FALSE, $where_in = FALSE, $group_by = FALSE)
    {
        if ($columns !== FALSE)
        {
            $this->db->select($columns);
        }

        if ($where !== FALSE)
        {
            is_array($where) || $where = array($where);
            $this->db->where($where);
        }

        if ($where_in !== FALSE)
        {
            $this->db->where_in($where_in['field'], $where_in['data']);
        }

        $view_name = ($view !== FALSE)? $view : $this->view_name;

        if($group_by !== FALSE)
        {
            $this->db->group_by($group_by);
        }

        $single == FALSE || $this->db->limit(1);
        $method = $single ? 'row' : 'result';

        if($order_by !== FALSE && $companyId !== FALSE)
        {
            return $this->db->order_by("$order_by DESC")->get($view_name)->$method();
        }

        if($order_by !== FALSE)
        {
            return $this->db->order_by("$order_by DESC")->where('companyId', $this->companyId)->get($view_name)->$method();
        }

        if  ($companyId !== FALSE)
        {
            return $this->db->get($view_name)->$method();
        }
        else
        {
//            return $this->db->where('companyId', $this->companyId)->get($view_name)->$method();
            return $this->db->where('hidden', 0)->get($view_name)->$method();
        }
    }

    /**
     * Gets an associative Array from a table result set
     * If you provide an @id then that row will be return,
     * if no @id is provided the it will return all records
     *
     * @param mixed id or array
     * @param mixed array
     * @param mixed array
     * @return array
     * @author Nelson Cabrera
     */
    public function get_assoc_list($columns = FALSE, $where = FALSE, $ids = FALSE, $sort = FALSE, $no_ids = FALSE, $no_default = FALSE, $translate = FALSE)
    {
        // Limit results to one or more ids
        if ($ids !== FALSE)
        {
            // always convert to array
            is_array($ids) || $ids = array($ids);

            // Remove any Id that does not match the filter
            $filter = $this->primaryFilter;
            $ids = array_map($filter, $ids);

            $this->db->where_in($this->primary_key, $ids);
        }

        // Limit results to one or more ids
        if ($no_ids !== FALSE)
        {
            // always convert to array
            is_array($no_ids) || $ids = array($no_ids);

            // Remove any Id that does not match the filter
            $filter = $this->primaryFilter;
            $no_ids = array_map($filter, $no_ids);

            $this->db->where_not_in($this->primary_key, $no_ids);
        }

        // WHERE Clause for the Query
        if($where !== FALSE)
        {
            // always convert to array
            is_array($where) || $where = array($where);

            $this->db->where($where);
        }

        // Get columns for the query
        if($columns !== FALSE)
        {
            // always convert to array
            is_array($columns) || $columns = array($columns);

            // generate column select statement
            if(!empty($columns))
            {
                $fields = implode(",", $columns);
                $this->db->select($fields);
            }
        }

        if($sort !== FALSE)
        {
            $this->db->order_by($sort);
        }
        else
        {
            $this->db->order_by('name ASC');
        }

        // Remove Backticks
        $this->db->protect_identifiers=false;

        // Return results
        $result = $this->db->get($this->table_name)->result();

        // Convert result into an associative array
        if(!empty($result))
        {
            $result = (count($columns) > 2)? $this->multi_level_array($result, $columns, $no_default, $translate) : $this->to_assoc_array($result, $no_default, $translate);
        }

        return $result;
    }

    /**
     * Gets the las number for any number based module
     * @param mixed
     * @param array
     * @return int
     * @author Nelson Cabrera
     */
    public function get_last_number($column = FALSE, $where = array(), $with_default_rows = FALSE, $number = FALSE, $where_in = FALSE)
    {
        $column = ($column == FALSE ? "number" : $column);
        $number = ($number == FALSE ? "1000" : "0");

        // Check if the field exist in the database
        if(is_array($where))
        {
            if(!empty($where))
            {
                $this->db->where($where);
            }
            elseif($with_default_rows !== FALSE)
            {
                $this->db->where_in('companyId', array($this->companyId, '0'));
            }
            else
            {
                $this->db->where('companyId', $this->companyId);
            }

            if($where_in != FALSE)
            {
                $this->db->where_in($where_in);
            }

            $this->db->select("IFNULL(MAX($column), $number) + 1 AS number", FALSE);
            $this->db->from($this->table_name);
            $row = $this->db->get()->row();

            return ($row->number ? $row->number : 0000);
        }
    }

    /**
     * Save data to the database by inserting or updating a record
     *
     * @param array data
     * @param mixed int and boolean (optional, default = FALSE)
     * @return int Id
     * @author Nelson Cabrera
     */
    public function save($data, $id = FALSE)
    {
        if ($id == FALSE)
        {
            // Insert Data
            $this->db->insert($this->table_name, $data);
        }
        else
        {
            // Update Data
            $filter = $this->primaryFilter;
            $this->db->where($this->primary_key, $filter($id))->update($this->table_name, $data);
        }

        // Return the ID
        return $id == FALSE ? $this->db->insert_id() : $id;
    }

    /**
     * Update data to the database by inserting or updating a record
     *
     * @param array data
     * @param mixed int and boolean (optional, optional)
     * @return int boolean
     * @author Nelson Cabrera
     */
    public function update($data, $where)
    {
        // Update Data
        $result = $this->db->where($where)->update($this->table_name, $data);

        // Return the ID
        return $result;
    }

    /**
     * Deletes one or more records
     *
     * @param mixed int or array of Ids
     * @return void
     * @author Nelson Cabrera
     */
    public function delete($ids)
    {
        $filter = $this->primaryFilter;
        $ids = ! is_array($ids) ? array($ids) : $ids;

        if(empty($ids))
        {
            return FALSE;
        }

        foreach ($ids as $id)
        {
            $id = $filter($id);
            if($id)
            {
                $this->db->where($this->primary_key, $id)->limit(1)->delete($this->table_name);
            }
        }

        return TRUE;
    }

    /**
     * Deletes a records by column to value comparison
     *
     * @param string
     * @param mixed int string
     * @return void
     * @author Nelson Cabrera
     */
    public function delete_by($key, $value)
    {
        if(empty($key))
        {
            return FALSE;
        }

        return $this->db->where(htmlentities($key), htmlentities($value))->delete($this->table_name);
    }

    /**
     * Deletes a records by column to value comparison
     *
     * @param string
     * @param mixed int string
     * @return void
     * @author Nelson Cabrera
     */
    public function delete_by_array($where)
    {
        $where = !is_array($where) ? array($where) : $where;

        if(empty($where))
        {
            return FALSE;
        }

        return $this->db->where($where)->delete($this->table_name);
    }

    /**
     * Hides one or more records by Id
     *
     * @param mixed int or array of Ids
     * @param array Data
     * @return void
     * @author Nelson Cabrera
     */
    public function hide($ids, $data)
    {
        $filter = $this->primaryFilter;
        $ids = ! is_array($ids) ? array($ids) : $ids;

        if(empty($ids) || empty($data))
        {
            return FALSE;
        }

        foreach ($ids as $id)
        {
            $id = $filter($id);
            if($id)
            {
                $this->db->where($this->primary_key, $id)->limit(1)->update($this->table_name, $data);
            }
        }

        return TRUE;
    }

    /**
     * Checks if a record exist in the table
     *
     * @param string field
     * @param mixed int or string
     * @return int
     * @author Nelson Cabrera
     */
    public function in_table($key, $value)
    {
        $count = $this->db->where($key, $value)->from($this->table_name)->count_all_results();
        return $count;
    }

    /**
     * Checks if a record exist in the table
     *
     * @param string field
     * @param mixed int or string
     * @return int
     * @author Nelson Cabrera
     */
    public function in_table_by($where)
    {
        $where = ! is_array($where) ? array($where) : $where;

        $count = $this->db->where($where)->from($this->table_name)->count_all_results();
        return $count;
    }

    /**
     * Checks if the record belongs to the user's company
     *
     * @param string field
     * @param mixed int or string
     * @return int
     * @author Nelson Cabrera
     */
    public function if_owner($key, $value, $companyId = FALSE)
    {
        $companyId = ($companyId == FALSE)? $this->companyId : $companyId;

        $count = $this->db->where(array('companyId' => $companyId, $key => $value))
                          ->from($this->table_name)->count_all_results();
        return $return = ($count > 0)? TRUE : FALSE;
    }

    /**
     * Checks if the record has a status that allows edits
     *
     * @param string field
     * @param mixed int or string
     * @param mixed int or string
     * @return int
     * @author Nelson Cabrera
     */
    public function is_editable($key, $value, $column, $haystack, $skip = FALSE)
    {
        $status = $this->db->where(array('companyId' => $this->companyId, $key => $value))->select($column)->get($this->table_name)->row()->$column;
        return $return = (in_array($status, $haystack) || $skip == TRUE)? TRUE : FALSE;
    }

    /**
     * Convert an mysql result into an associative array.
     *
     * @param string field
     * @param mixed int or string
     * @return int
     * @author Nelson Cabrera
     */
    public function to_assoc_array($result, $no_default = FALSE, $translate = FALSE)
    {
        $option = array();

        if($no_default == FALSE)
        {
            $option[0] = '';
        }

        foreach($result as $row)
        {
            $option[$row->id] = ($translate == FALSE) ? $row->name : $this->lang->line($row->name);
        }

        return $option;
    }

    /**
     * Convert an mysql result into an array.
     *
     * @param string field
     * @param mixed int or string
     * @return int
     * @author Nelson Cabrera
     */
    public function to_array($result, $no_default = TRUE)
    {
        $array = array();

        if($no_default == FALSE)
        {
            $array[0] = '';
        }

        foreach ($result as $row)
        {
            $array[] = $row->id;
        }

        return $array;
    }

    /**
     * Convert an mysql result into an multilevel array.
     *
     * @param string field
     * @param mixed int or string
     * @return int
     * @author Nelson Cabrera
     */
    public function multi_level_array($result, $no_default = TRUE, $translate = FALSE)
    {
        $array = array();

        if($no_default == FALSE)
        {
            $array[0] = '';
        }

        foreach($result as $row)
        {
            $array[$row->id]['name']    = ($translate == FALSE) ? $row->name : $this->lang->line($row->name);
            $array[$row->id]['icon']    = (isset($row->icon))?$row->icon : '';
        }
        return $array;
    }

    /**
     * To get result(s) of queries that returns multiple result sets.
     *
     * @param string $query_string
     * @return bool|array List of result arrays
     * @author Pankaj Garg <garg.pankaj15@gmail.com>
     */
    public function multiple_result_sets($query_string)
    {
        if (empty($query_string)) {
            return false;
        }

        $index      = 0;
        $result_set = array();

        /* execute multi query */
        if (mysqli_multi_query($this->db->conn_id, $query_string)) {
            do {
                if (false != $result = mysqli_store_result($this->db->conn_id)) {
                    $rowID = 0;
                    while ($row = $result->fetch_assoc()) {
                        $result_set[$index][$rowID] = $row;
                        $rowID++;
                    }
                }
                $index++;
            } while (mysqli_more_results($this->db->conn_id) && mysqli_next_result($this->db->conn_id));
        }

        return $result_set;
    }

    /**
     * Gets an associative Array from a table result set
     * If you provide an @id then that row will be return,
     * if no @id is provided the it will return all records
     *
     * @param mixed id or array
     * @param mixed array
     * @param mixed array
     * @return array
     * @author Nelson Cabrera
     */
    public function get_assoc_list_by($columns = FALSE, $where = FALSE, $ids = FALSE, $sort = FALSE, $id = FALSE, $default = FALSE, $translate = FALSE)
    {
        // Limit results to one or more ids
        if ($ids !== FALSE)
        {
            // always convert to array
            is_array($ids) || $ids = array($ids);

            // Remove any Id that does not match the filter
            $filter = $this->primaryFilter;
            $ids = array_map($filter, $ids);

            $this->db->where_in($id, $ids);
        }

        // WHERE Clause for the Query
        if($where !== FALSE)
        {
            // always convert to array
            is_array($where) || $where = array($where);

            $this->db->where($where);
        }

        // Get columns for the query
        if($columns !== FALSE)
        {
            // always convert to array
            is_array($columns) || $columns = array($columns);

            // generate column select statement
            if(!empty($columns))
            {
                $fields = implode(",", $columns);
                $this->db->select($fields);
            }
        }

        if($sort !== FALSE)
        {
            $this->db->order_by($sort);
        }
        else
        {
            $this->db->order_by('name ASC');
        }

        // Remove Backticks
        $this->db->protect_identifiers=false;

        // Return results
        $result = $this->db->get($this->table_name)->result();

        // Convert result into an associative array
        if(!empty($result))
        {
            $result =  $this->to_assoc_array($result, $default, $translate);
        }

        return $result;
    }

    public function list_fields()
    {
        return $this->db->list_fields($this->table_name);
    }

    public function list_columns($view_name)
    {
        return $this->db->list_fields($view_name);
    }

    public function get_last_sequence($column, $moduleId, $where = FALSE)
    {
        $column = ($column == FALSE ? "number" : $column);

        $moduleId    = (isset($moduleId) && $moduleId != '')? $moduleId : 0;
        $warehouseId = (isset($this->warehouseId) && $this->warehouseId != '')? $this->warehouseId : 0;
        $locationId  = (isset($this->locationId) && $this->locationId != '' && !in_array($moduleId, array(11,12,13)))? $this->locationId : 0;

        $this->db->select("IFNULL(MAX($column), 0) + 1 AS number, get_last_sequence($this->companyId, $moduleId, $warehouseId, $locationId) AS initial", FALSE);

        $this->db->from($this->table_name.' AS a');

        $this->db->order_by($this->primary_key, 'ASC');

        if($where == FALSE)
        {
            $this->db->where(array('a.companyId' => $this->companyId, 'a.locationId' => $locationId, 'a.hidden' => 0));
        }
        else
        {
            $this->db->where($where);
        }

        $row = $this->db->get()->row();

        $number = ($row->number > 1)? $row->number : $row->initial;

        return $number;
    }

    /**
     * Update multiple rows
     *
     * in first position of sub array add:  'primary key column name' => primary key id.
     * another positions of sub array add columns to update: 'hidden or status, etc...' => 1 or any value.
     *
     * @param $data
     * @return mixed
     */
    public function update_multiple($data)
    {
        return $this->db->update_batch($this->table_name, $data, $this->primary_key);
    }

    /**
     * Insert multiple rows
     *
     * @param $data
     * @return mixed
     */
    public function insert_multiple($data)
    {
        if(!empty($data) != 0)
        {
            return $this->db->insert_batch($this->table_name, $data);
        }
    }

    /**
     * Delete multiple row by id
     *
     * @param $column
     * @param $ids
     * @return mixed
     */
    public function delete_multiple($column, $ids)
    {
        $this->db->where_in($column, $ids);
        return $this->db->delete($this->table_name);
    }

    /**
     * set db_companyId
     *
     * @param $column
     * @param $ids
     * @return mixed
     */
    public function set_companyId()
    {
        return $this->db->query("SELECT @p1:=$this->companyId;");
    }
}
