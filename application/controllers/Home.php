<?php


class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('home/front');
        $this->load->view('common/footer');
    }

    public function main()
    {
        $this->session->set_userdata('categoryCount', json_encode(array(0, 0, 0, 0, 0)));
        $this->session->set_userdata('index', 0);

        $this->load->view('common/header');
        $this->load->view('home/main');
        $this->load->view('common/footer');
    }

    public function description()
    {
        $this->load->view('common/header');
        $this->load->view('home/description');
        $this->load->view('common/footer');
    }

    public function viewResult()
    {
        if ($this->session->userdata('index') < 30)
        {
            redirect('test');
        }

        $this->load->view('common/header');
        $this->load->view('home/result');
        $this->load->view('common/footer');
    }
}
