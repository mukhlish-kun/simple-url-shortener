<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Shortlink_model extends CI_Model{
    public function register($data){
        return $this->db->insert('link',$data);
    }

    public function loadUrl($data){
        $hasil = $this->db->where('name=',$data)->limit(1)->get('link');
        return $hasil->row();
    }

    public function updateLink($data){
        return $this->db->set('count', 'count+1',FALSE)->where('name=', $data)->update('link');
    }

}