<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shortlink extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->library('javascript');
  		$this->load->library('form_validation');
  		$this->load->library('email');
  		$this->load->library('session');
		$this->load->helper('date');
		$this->load->model('shortlink_model');
    }

    public function createLink(){
        $this->load->view('shortlink');
    }

    public function urlRed($name){
        $data = $this->shortlink_model->loadUrl($name);
        if($data==NULL){
            show_error("<b>Please double check your link details and try again!. You may have reached this page because:</b>
            <ol>
                <li>Short links are case-sensitive. A missing capital letter will result in a failed redirect.</li>
                <li>The link does not exist or server was temporarily bussy and failed to find your redirect.</li>
                <li>Any error causing you to reach this page will likely be repeated by your browser due to caching. Try clearing your browser's cache and cookies</li>
            </ol>",404,"Oops, we weren't able to locate that URL!");
        } else {
            $this->shortlink_model->updateLink($name);
            redirect($data->url);
        }    
    }

    public function insertlink(){
        $this->load->helper('http_helper');
        $url =$this->input->post('url');
        $name = $this->input->post('name');
        $data=[
            'name'=> $name,
            'url' => addHttp($url),
            'created_at' => date('Y-m-d H:i:s')
        ];

        if($this->shortlink_model->register($data)){
            $this->session->set_flashdata('url', base_url($data['name']));
            redirect(base_url());
        } else {
            redirect(base_url());
        }
    }

    public function check(){
        $this->form_validation->set_rules('link', 'Link', 'is_unique[link.name]');
        if ($this->form_validation->run() == FALSE){
            echo 'false';
        } else {
                echo 'true';
            }
    }
    
}