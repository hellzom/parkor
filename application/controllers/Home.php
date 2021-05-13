<?php
class Home extends CI_Controller {

	// public function __construct(){
 //        parent::__construct();
 //        if(!$this->session->userdata('id')){
 //            redirect('auth/login');
 //        }
 //    }

	public function index(){
		$data['veh'] = $this->datawork->get_data('vehicle',['vehicle_status'=>0]);
		$data['slot'] = $this->datawork->get_data('slot',['slot_status'=>0]);
        $this->load->view('inc/header.php');
        $this->load->view('index.php',$data);
        $this->load->view('inc/footer.php');  
    }

    public function manage_parking(){
    	$data['veh'] = $this->datawork->get_data('vehicle');
        $this->load->view('inc/header.php');
        $this->load->view('manage_parking.php',$data);
        $this->load->view('inc/footer.php');  
    }

    public function invoice($vehicle_id=null){
    	$vehicle_id = $this->uri->segment(3);
    	$data['veh'] = $this->datawork->get_data('vehicle',['vehicle_id'=>$vehicle_id]);
    	$data['token'] = $this->datawork->get_data('token',['token_vehicle_id'=>$vehicle_id]);
        $this->load->view('inc/header.php');
        $this->load->view('invoice.php',$data);
        $this->load->view('inc/footer.php');  
    }

    public function add_slot(){
        $this->form_validation->set_error_delimiters("<small class='text-danger'>","</small>");
            $this->form_validation->set_rules("slot_name","Branch Name","required");
           
            if($this->form_validation->run()==TRUE){
                $fields = [
                    'slot_name' => $_POST['slot_name'],
                    'slot_status' => 0
                ];
                $this->datawork->insert_data('slot',$fields);
                redirect(base_url('home/index'));
            }
        else{
        $this->load->view('inc/header.php');
        $this->load->view('add_slot.php');
        $this->load->view('inc/footer.php');
        }
    }

    public function add_cat(){
        $this->form_validation->set_error_delimiters("<small class='text-danger'>","</small>");
            $this->form_validation->set_rules("cat_name","Branch Name","required");
            $this->form_validation->set_rules("cat_charge","Branch Name","required");
           
            if($this->form_validation->run()==TRUE){
                $fields = [
                    'cat_name' => $_POST['cat_name'],
                    'cat_charge' => $_POST['cat_charge'],
                    'cat_status' => 0
                ];
                $this->datawork->insert_data('category',$fields);
                $this->session->set_flashdata('addCat',"<div class='alert alert-success bg-success text-white animated slideInRight alert-dismissible fade show' role='alert'><i class='fa fa-check-circle'>&nbsp;</i> Category Added!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                redirect(base_url('home/index'));
            }
        else{
        $this->load->view('inc/header.php');
        $this->load->view('add_cat.php');
        $this->load->view('inc/footer.php');
        }
    }

    public function add_parking(){
        $this->form_validation->set_error_delimiters("<small class='text-danger'>","</small>");
            $this->form_validation->set_rules("vehicle_number","Vehicle Number","required");
            $this->form_validation->set_rules("vehicle_brand","Vehicle Brand","required");
            $this->form_validation->set_rules("vehicle_model","Vehicle Model","required");
            $this->form_validation->set_rules("vehicle_color","Vehicle Color","required");
            $this->form_validation->set_rules("vehicle_owner","Vehicle Owner Name","required");
            $this->form_validation->set_rules("vehicle_owner_phone","Vehicle Owner Phone","required");
            $this->form_validation->set_rules("cat_name","Category Selection","required");
            
            if($this->form_validation->run()==TRUE){
                $fields = [
                    'cat_name' => $_POST['cat_name'],
                    'slot_id' => $_POST['slot_id'],
                    'vehicle_number' => $_POST['vehicle_number'],
                    'vehicle_brand' => $_POST['vehicle_brand'],
                    'vehicle_model' => $_POST['vehicle_model'],
                    'vehicle_color' => $_POST['vehicle_color'],
                    'vehicle_owner' => $_POST['vehicle_owner'],
                    'vehicle_owner_phone' => $_POST['vehicle_owner_phone'],
                    'vehicle_owner_email' => $_POST['vehicle_owner_email'],
                    'vehicle_status' => 0
                ];
                $slotupdate = [
                	'slot_status' => 1
                ];
                $slotid = $this->input->post('slot_id');
                $this->datawork->insert_data('vehicle',$fields);
                $this->datawork->update_data('slot',$slotupdate,['slot_id'=>$slotid]);
                $this->session->set_flashdata('addParking',"<div class='alert alert-info bg-info text-white animated slideInRight alert-dismissible fade show' role='alert'><i class='fa fa-check-circle'>&nbsp;</i> Vehicle Parked! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                redirect(base_url('home/index'));
            }
	        else{
		        $data['slot'] = $this->datawork->get_data('slot',['slot_status'=>0]);
		        $data['cat'] = $this->datawork->get_data('category');
		        $this->load->view('inc/header.php');
		        $this->load->view('add_parking.php',$data);
		        $this->load->view('inc/footer.php');
	        }
    }

    public function remove_parking($vehicle_id=null,$slot_id=null){
        $vehicle_id = $this->uri->segment(3);
        $slot_id = $this->uri->segment(5);
            $fields = [
                    'vehicle_status' => 1
                ];

                $slotupdate = [
                	'slot_status' => 0
                ];
                
                $this->datawork->update_data('vehicle',$fields,['vehicle_id'=>$vehicle_id]);
                $this->datawork->update_data('slot',$slotupdate,['slot_id'=>$slot_id]);
                $this->session->set_flashdata('removeParking',"<div class='alert alert-danger bg-danger text-white animated slideInRight alert-dismissible fade show' role='alert'><i class='fa fa-check-circle'>&nbsp;</i> Parking Removed! Now generate the bill!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                redirect(base_url('home/manage_parking'));        
       
    }

    public function generate_bill($vehicle_id=null,$slot_id=null){
        $vehicle_id = $this->uri->segment(3);
        $data['veh'] = $this->datawork->get_data('vehicle',['vehicle_id'=>$vehicle_id]);
        foreach ($data['veh'] as $veh) {
        	$two = 0.83;
        	$three = 1.33;
        	$four = 1.66;

        	  $token_generated = "PARK".$vehicle_id.$veh->vehicle_number;

        	  	$to_time = strtotime($veh->vehicle_toex);
				$from_time = strtotime($veh->vehicle_toen);
				$minute_stayed = round(abs($to_time - $from_time) / 60,2);
				if ($veh->cat_name === 'Two Wheeler') {
                        $price = $minute_stayed*$two;
	              } 
	              elseif($veh->cat_name == 'Three Wheeler'){
	                $price = $minute_stayed*$three;
	              }
	              elseif($veh->cat_name == 'Four Wheeler'){
	                $price = $minute_stayed*$four;
	              }

        	  $fields = [
                    'token_vehicle_id' => $vehicle_id,
                    'token_generated' => $token_generated,
                    'token_price' => $price,
                    'minutes_stayed' => $minute_stayed
                ];
                $this->datawork->insert_data('token',$fields);
               
                $this->session->set_flashdata('billGenerate',"<div class='alert alert-success bg-success text-white animated slideInRight alert-dismissible fade show' role='alert'><i class='fa fa-check-circle'>&nbsp;</i> Bill Generated! Now get the Invoice!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                redirect(base_url('home/manage_parking'));  
                  }      
       
    }
}
