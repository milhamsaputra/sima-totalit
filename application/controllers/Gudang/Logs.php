<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Logs extends CI_Controller {
	
	public function Index(){
		$this->load->model('mymodel');
        $user['user'] = "Gudang";
        $data['data1'] = $this->mymodel->tampil("qw_logs");
		$this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Gudang/Logs',$data);
		$this->load->view('library/Menu-Footer');
    }		
}