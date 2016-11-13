<?php
if(!defined("BASEPATH")){
	exit("Not Access!");
}
class MY_Model extends CI_Model{
	var $table="";
	// Các phương thức
	function create($data)
	{
	    if($this->db->insert($this->table, $data))
	    {
	       return $this->db->insert_id();
	    }else{
	       return FALSE;
	    }
	}
	function update($id, $data)
	{
	    if (!$id)
	    {
	        return FALSE;
	    }
	    $where = array();
	    $where['id'] = $id;//điều kiện khóa chính bằng $id truyền vào
	        return $this->update_rule($where, $data);
	}
	function update_rule($where, $data)
	{
	    if (!$where)
	    {
	        return FALSE;
	    }
	    $this->db->where($where);//thêm điều kiện
	    if($this->db->update($this->table, $data))//cập nhật dữ liệu
	    {
	        return TRUE;
	    }
	    return FALSE;
	}
	function delete($id)
	{
	    if (!$id)
	            {
	        return FALSE;
	    }
	    if(is_numeric($id))
	    {
	        $where = array('id' => $id);
	    }else
	    {      
	        $where =  "id IN (".$id.") ";
	    }
	    return $this->del_rule($where);
	}
	function del_rule($where)
	{
	    if (!$where)
	    {
	        return FALSE;
	    }
	    $this->db->where($where);
	    if($this->db->delete($this->table))
	    {
	        return TRUE;
	    }
	    return FALSE;
	}
	function get_item($id)
	{
	    if (!$id)
	    {
	        return FALSE;
	    }
	    $where = array();
	    $where['id'] = $id;
	    return $this->get_item_rule($where);
	}
     
    
	function get_item_rule($where = array())
	{
	    $this->db->where($where);
	    $query = $this->db->get($this->table);
	    if ($query->num_rows())
	    {
	        return $query->row();
	    }
	    return FALSE;
	}
        function get_item_slug($slug)
	{
            $where=array(
                'slug'=>$slug,
            );
	    $this->db->where($where);
	    $query = $this->db->get($this->table);
	    if ($query->num_rows())
	    {
	        return $query->row();
	    }
	    return FALSE;
	}
        function get_item_code($code)
	{
            $where=array(
                'code'=>$code,
            );
	    $this->db->where($where);
	    $query = $this->db->get($this->table);
	    if ($query->num_rows())
	    {
	        return $query->row();
	    }
	    return FALSE;
	}
	function get_list($input = array())
	{
	    $this->get_list_set_input($input);
	    $query = $this->db->get($this->table);
	    return $query->result();
	}
	protected function get_list_set_input($input)
	{
	     // Select
		 if (isset($input['select']))
		 {
		      $this->db->select($input['select']);
		 }
	 
	    if ((isset($input['where'])) && $input['where'])
	    {
	        $this->db->where($input['where']);
	    } 
	    if (isset($input['like'][0]) && isset($input['like'][1]))
	    {
	        $this->db->like($input['like'][0],$input['like'][1]);
	    }
	    if (isset($input['order'][0]) && isset($input['order'][1]))
	    {
	        $this->db->order_by($input['order'][0], $input['order'][1]);
	    }
	    else
	    {
	        //mặc định sẽ sắp xếp theo id giảm dần
	        $this->db->order_by('id', 'desc');
	    }
	    // Thêm điều kiện limit cho câu truy vấn thông qua biến $input['limit'] (ví dụ $input['limit'] = array('10' ,'0'))
	    if (isset($input['limit'][0]) && isset($input['limit'][1]))
	    {
	        $this->db->limit($input['limit'][0], $input['limit'][1]);
	    }    
	}
	function get_total($input = array())
	{
	    $this->get_list_set_input($input);
	    $query = $this->db->get($this->table);
	    return $query->num_rows();
	}
	function get_total_query($str="")
	{
	  	$query = $this->db->query($str);
	    return $query->num_rows();
	}
        
        function check_exists($where = array())
        {
             $this->db->where($where);
             //thuc hien cau truy van lay du lieu
             $query = $this->db->get($this->table);

             if($query->num_rows() > 0){
                return TRUE;
             }else{
                return FALSE;
             }
        }
	function select_query($str)
	{
		if(empty($str)||$str==""){
			return false;
		}
		$query = $this->db->query($str);
		return $query->result();
	}
        function get_name_item($id)
	{
	    if (!$id)
	    {
	        return FALSE;
	    }
	    $where = array();
	    $where['id'] = $id;
	    $tmp =$this->get_item_rule($where);
            if(!$tmp){
                return false;
            }else{
                return $tmp->name;
            }
	}
        function get_name_item_rule($where = array())
	{
            $this->db->where($where);
	    $query = $this->db->get($this->table);
	    if ($query->num_rows())
	    {
	       $tmp=$query->row();
               return $tmp->name;
	    }
	    return FALSE;
	}
        function get_order_index(){
            $this->db->select_max('order_index');
            $query = $this->db->get($this->table);
            $order_index=$query->row();
            if($order_index->order_index==""){
                return 1;
            }else{
                return $order_index->order_index+1;
            }
        }
        
    function check_exists_rule($code="",$slug=""){
        $this->db->where('code', $code);
        $this->db->or_where('slug', $slug); 
        $query = $this->db->get("cities");
        if ($query->num_rows())
        {
          return true;
        }
        $this->db->where('code', $code);
        $this->db->or_where('slug', $slug); 
        $query1 = $this->db->get("districts");
        if ($query1->num_rows())
        {
           return true;
        }
        $this->db->where('code', $code);
        $this->db->or_where('slug', $slug); 
        $query2 = $this->db->get("wards");
        if ($query2->num_rows())
        {
          return true;
        }
        $this->db->where('code', $code);
        $this->db->or_where('slug', $slug); 
        $query3 = $this->db->get("streets");
        if ($query3->num_rows())
        {
          return true;
        }
        $this->db->where('code', $code);
        $this->db->or_where('slug', $slug); 
        $query4 = $this->db->get("projects");
        if ($query4->num_rows())
        {
          return true;
        }
        return FALSE;
    }
}