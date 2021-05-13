<?php
class Auth extends CI_Controller {


public function login(){
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if($this->form_validation->run()==TRUE){
            //true
            $username = $this->input->post('email');
            $password = $this->input->post('password');

            if($this->datawork->login($username, $password)==TRUE){
                $id=$this->datawork->get_data("admin",['admin_email'=>$username]);
                $session = [
                    'id' => $id[0]->id
                    //'email' => $username
                ];
                $this->session->set_userdata($session);
                redirect(base_url().'home/index');
            }
            else{
                $this->session->set_flashdata('error','Email or Password incorrect!');
                redirect(base_url().'auth/login');
            }
        }
        else{
            //false
            $this->load->view('login.php');
        }
    }

}