<?php 
class Datawork extends CI_Model{
	//insert data
	public function insert_data($table,$fields){
		$this->db->insert($table,$fields);
	}

	//update data
	public function update_data($table,$fields,$con){
    	$this->db->update($table,$fields,$con);
    }

    //get data
	public function get_data($table,$con=NULL){
		if($con==NULL){
    	    $data = $this->db->get($table);
    	            return $data->result();
    	}
    	else{
    	    $data = $this->db
    	      			 ->where($con)
    	      			 ->get($table);
    	    return $data->result();
    	}
    }

    public function login($username, $password){
		$check = $this->db
					  ->where('admin_email',$username)
					  ->where('admin_password',$password)
					  ->get('admin');

		if($check->num_rows()>0){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

}
?>