<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


    public function __construct()
    {
            parent::__construct();
            $this->load->model('UsersModel');
    }

    public function index()
    {

        $this->load->library('pagination');
        $config['base_url'] = base_url('Users/index/');
        $this->load->model('UsersModel');

        $config['total_rows'] = $this->UsersModel->get_num();
        $config['per_page'] = 10;

        $page=$this->uri->segment(3);


        $this->pagination->initialize($config);

        $users=$this->UsersModel->get_all($page);

        $view['users'] = $users;

       $content=$this->load->view('body/index' , $view,true);

        $arr['content']=$content;

        $this->load->view('page',$arr);
    }

    public function test_template()
    {
        $this->load->view('header');
        $this->load->view('sidebar');

        $arr['content']='المحتوى';

        $this->load->view('content',$arr);
        $this->load->view('footer');
    }


     function show_user()
	{

	    $this->load->view('header');
	    $this->load->view('sidebar.php');
	    $user_id=$this->uri->segment(3);

		$this->load->model('UsersModel');
		$user_q=$this->UsersModel->get_by_id($user_id);
        $user['user']=$user_q;



		if ($user_q->num_rows())
		{

           $this->load->view('body/show_user',$user);

        }
        else
        {
            header(base_url('index.php'));
        }

        $this->load->view('footer.php');


    }
    public function update()
    {


        $user_id=$this->uri->segment(3);
        $view['msq']='';



        if ($this->input->post('submit')=='save'){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('name','name','required');
            $this->form_validation->set_rules('log_in_name','log_in_name','required');
            $this->form_validation->set_rules('phone','phone','required|numeric');
            $this->form_validation->set_rules('password','password','required');

            if($this->form_validation->run()){

                $user['name']=$this->input->post('name');
                $user['log_in_name']=$this->input->post('log_in_name');
                $user['phone']=$this->input->post('phone');
                $user['password']=$this->input->post('password');
                $user['active']=$this->input->post('active');

                $this->UsersModel->update($user_id,$user);
                $view['msq']='data update successfully';
            }
            else {
                $view['msq'] = 'data not update ' . validation_errors();
            }


        }
        $user_q=$this->UsersModel->get_by_id($user_id);

        $view['user_q']=$user_q;



        $content=$this->load->view('body/edit_user',$view,true);


        $arr['content']=$content;

        $this->load->view('page',$arr);

    }


}
