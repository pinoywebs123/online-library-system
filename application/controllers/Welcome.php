<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index(){
		$this->load->view('main');
	}
	public function lib_login(){
		$this->load->view('lib/login');
	}
	public function student_login(){
		$this->load->view('student/login');
	}

	public function lib_login_parse(){
		$this->form_validation->set_rules('lib_user', 'Username', 'required|xss_clean');
		$this->form_validation->set_rules('lib_pass', 'Password', 'required|xss_clean|md5');

		if($this->form_validation->run() == FALSE){
				$data = array('error'=> 'Required Username and Password');
				$this->session->set_flashdata($data);
				$prev = $_SERVER['HTTP_REFERER'];
				redirect($prev);
		}else {
			$username = $this->input->post('lib_user');
			$password = $this->input->post('lib_pass');

			$this->load->model('user');
			$que = $this->user->lib_login($username, $password);
			if($que){
				$info = array('username'=> $username, 'logged'=> TRUE);
				$this->session->set_userdata($info);
				redirect('lib/main');
			}else {
				$arr =array ('pass' => 'Invalid Username and Password');
				$this->session->set_flashdata($arr);
				redirect('lib/login');
			}
		}
	}
	public function student_login_parse(){
		$this->form_validation->set_rules('student_user', 'Username', 'required|xss_clean');
		$this->form_validation->set_rules('student_pass', 'Password', 'required|xss_clean|md5');

		if($this->form_validation->run() == FALSE){
				$data = array('error'=> 'Required Username and Password');
				$this->session->set_flashdata($data);
				$prev = $_SERVER['HTTP_REFERER'];
				redirect($prev);
		}else {
			$username = $this->input->post('student_user');
			$password = $this->input->post('student_pass');

			$this->load->model('user');
			$que = $this->user->student_login($username, $password);
			if($que){
				$info = array('username'=> $username, 'logged'=> TRUE);
				$this->session->set_userdata($info);
				redirect('student/main');
			}else {
				$arr =array ('pass' => 'Invalid Username and Password');
				$this->session->set_flashdata($arr);
				redirect('student/login');
			}
		}
	}

	
	public function lib_loginCheck(){
		$current_user = $this->session->userdata('username');
		
		$this->load->model('user');
		$check = $this->user->lib_loginCheck($current_user);
		if($check){
			$this->load->model('user');
			$data['content'] = $this->user->getStudents();
			$this->load->view('lib/main', $data);
		}else {
			show_404();
		}
	}

	public function student_loginCheck(){
		$current_user = $this->session->userdata('username');

		$this->load->model('user');
		$check = $this->user->student_loginCheck($current_user);
		if($check){			
			$this->load->model('user');
			$data['content'] = $this->user->getBooks();
			$this->load->view('student/main', $data);
		}else {
			show_404();
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$link = $this->uri->segment(1);
		
		redirect($link.'/'.'login');		
	}

	public function student_borrow(){
		if($this->session->userdata('username')){
			$current_user = $this->session->userdata('username');
			$id = $this->uri->segment(3);

			if($this->student_urlChecking()){
				$this->load->model('user');				
				$check = $this->user->student_borrow($id, $current_user);
				
				if($check) {
					redirect('student/main');
				}
				else {
					show_404();
				}
			} else {
				show_404();
			}
		}
	}

	public function student_cancel(){
		if($this->session->userdata('username')){
			$current_user = $this->session->userdata('username');
			$id = $this->uri->segment(3);

			if($this->student_urlChecking()){
				$this->load->model('user');				
				$check = $this->user->student_cancel($id, $current_user);
				
				if($check) {
					redirect('student/pending');
				}
				else {
					show_404();
				}
			} else {
				show_404();
			}
		}
	}

	public function student_return(){
		if($this->session->userdata('username')){
			$current_user = $this->session->userdata('username');
			$id = $this->uri->segment(3);

			if($this->student_urlChecking()){
				$this->load->model('user');				
				$check = $this->user->student_return($id, $current_user);
				
				if($check) {
					redirect('student/borrowed');
				}
				else {
					show_404();
				}
			} else {
				show_404();
			}
		}
	}

	public function student_pending(){
		if($this->session->userdata('username')){
			if($this->student_urlChecking()){
				$current_user = $this->session->userdata('username');
				
				$this->load->model('user');
				$data['content'] = $this->user->getStudPending($current_user);
				$this->load->view('student/pending', $data);
			}else {
				show_404();
			}
			
		}else {
			show_404();
		}
	}

	public function student_borrowed(){
		if($this->session->userdata('username')){
			if($this->student_urlChecking()){
				$current_user = $this->session->userdata('username');
				
				$this->load->model('user');
				$data['content'] = $this->user->getStudBorrowed($current_user);
				$this->load->view('student/borrowed', $data);
			}else {
				show_404();
			}
		}else {
			show_404();
		}
	}
	
	public function student_activity(){
		if($this->session->userdata('username')){
			if($this->student_urlChecking()){
				$current_user = $this->session->userdata('username');
				
				$this->load->model('user');
				$data['content'] = $this->user->getStudActivity($current_user);
				$this->load->view('student/activity', $data);
			}else {
				show_404();
			}
		}else {
			show_404();
		}
	}

	public function lib_books(){
		if($this->session->userdata('username')){
			if($this->lib_urlChecking()){
				$this->load->model('user');
				$data['content'] = $this->user->getBooks();

				$this->load->view('lib/books', $data);
			}else {
				show_404();
			}
		}else {
			show_404();
		}
	}


	public function lib_confirm(){
		if($this->session->userdata('username')){
			$brw_id = $this->uri->segment(3);

			if($this->lib_urlChecking()){
				$this->load->model('user');				
				$check = $this->user->lib_confirm($brw_id);
				
				if($check) {
					redirect('lib/pending');
				}
				else {
					show_404();
				}
			} else {
				show_404();
			}
		}
	}


	public function lib_cancel(){
		if($this->session->userdata('username')){
			$brw_id = $this->uri->segment(3);

			if($this->lib_urlChecking()){
				$this->load->model('user');				
				$check = $this->user->lib_cancel($brw_id);
				
				if($check) {
					redirect('lib/pending');
				}
				else {
					show_404();
				}
			} else {
				show_404();
			}
		}
	}

	public function lib_pending(){
		if($this->session->userdata('username')){
			if($this->lib_urlChecking()){
				$this->load->model('user');
				$data['content'] = $this->user->getLibPending();
				$this->load->view('lib/pending', $data);
			}else {
				show_404();
			}
		}else {
			show_404();
		}

	}
	
	public function lib_activity(){
		if($this->session->userdata('username')){
			if($this->lib_urlChecking()){
				$this->load->model('user');
				$data['content'] = $this->user->getLibActivity();
				$this->load->view('lib/activity', $data);
			}else {
				show_404();
			}
		}else {
			show_404();
		}

	}

	public function student_urlChecking(){
		$current_user = $this->session->userdata('username');
		$this->load->model('user');
		$check = $this->user->student_urlChecking($current_user);
		if($check){
			return TRUE;
		}else {
			return FALSE;
		}

	}

	public function lib_urlChecking(){
		$current_user = $this->session->userdata('username');
		$this->load->model('user');
		$check = $this->user->lib_urlChecking($current_user);
		if($check){
			return TRUE;
		}else {
			return FALSE;
		}

	}


	public function add_student(){
		$id = $this->input->post('idNum');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$course = $this->input->post('course');
		$year = $this->input->post('year');
		
		$password = md5('library');

		$this->load->model('user');
		$check = $this->user->add_student($id, $fname, $lname, $course, $year, $password);
		if($check){
			$success = array('success'=> 'A Student has been added Successfully.');
			$this->session->set_flashdata($success);
			redirect('lib/main');
		}
	}

	public function add_book(){
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$author = $this->input->post('author');

		$this->load->model('user');
		$check = $this->user->add_book($title, $desc, $author);
		if($check){
			$success = array('success'=> 'A Book has been added successfully.');
			$this->session->set_flashdata($success);
			redirect('lib/books');
		}
	}

	public function view_book(){
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$author = $this->input->post('author');

		$this->load->model('user');
		$check = $this->user->add_book($title, $desc, $author);
		if($check){
			$success = array('success'=> 'A Book has been added Successfully.');
			$this->session->set_flashdata($success);
			redirect('lib/books');
		}
	}

	public function lib_deleteStudent(){
		$id = $this->uri->segment(3);
		$this->load->model('user');
		$check = $this->user->lib_deleteStudent($id);
		if($check){
			$arr = array('delete'=> 'A Student has been deleted successfully.!');
			$this->session->set_flashdata($arr);
			redirect('lib/main');
		}else {
			echo'failed to delete problem';
		}

	}

	public function lib_deleteBooks(){
		$id = $this->uri->segment(3);
		$this->load->model('user');
		$check = $this->user->lib_deleteBooks($id);
		if($check){
			$arr = array('delete'=> 'Book Deleted Successfully.!');
			$this->session->set_flashdata($arr);
			redirect('lib/books');
		}else {
			echo'failed to delete problem';
		}

	}

	public function lib_setting(){
		if($this->session->userdata('username')){
			$this->load->view('lib/setting');
		}else {
			show_404();
		}
	}

	public function lib_change_password(){
		$this->form_validation->set_rules('pass', 'New Password', 'required|xss_clean|md5');
		$this->form_validation->set_rules('pass2', 'Repeat Password', 'required|xss_clean|md5|matches[pass]');
		if($this->form_validation->run() == FALSE){
				$this->load->view('lib/setting');
		}else {
			$user = $this->session->userdata('username');
			$pass2 = $this->input->post('pass2');
			
			$this->load->model('user');
			$check = $this->user->lib_change_password($user, $pass2);
			if($check){
				$arr = array('ok'=> 'Password Changed Successfully!');
				$this->session->set_flashdata($arr);
				redirect('lib/setting');
			}else {
				echo'failed';
			}
		}
	}

	public function lib_edit(){
		if($this->session->userdata('username')){
			$id = $this->uri->segment(3);
			$this->load->model('user');
			$data['content'] = $this->user->lib_edit_display($id);
			$this->load->view('lib/edit', $data);
		}else {	
			show_404();
		}
	}

	public function lib_edit_parse(){
		$this->form_validation->set_rules('idNum' ,' Student Number', 'required|xss_clean');
		$this->form_validation->set_rules('fname' ,' First Name', 'required|xss_clean');
		$this->form_validation->set_rules('lname' ,' Last Name', 'required|xss_clean');

		if($this->form_validation->run() == FALSE){
			$this->lib_edit();
		}else {
			$id = $this->input->post('idNum');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$course = $this->input->post('course');
			$year = $this->input->post('year');

			$this->load->model('user');
			$check = $this->user->lib_edit_parse($id, $fname, $lname, $course, $year);
			if($check){
				$arr = array('ok'=> 'Updated Successfully!');
				$this->session->set_flashdata($arr);
				$prev = $_SERVER['HTTP_REFERER'];
				redirect($prev);
			}else {
				$arr = array('no'=> 'Failed to Update!');
				$this->session->set_flashdata($arr);
				redirect('lib/edit');
			}
		}
	}

	public function editBook(){
		if($this->session->userdata('username')){
			$id = $this->uri->segment(3);
			$this->load->model('user');
			$data['content'] = $this->user->editBook_display($id);
			$this->load->view('lib/editBooks', $data);
		}else {
			show_404();
		}
	}


	public function editBook_parse(){
		$this->form_validation->set_rules('title' ,'Book Title', 'required|xss_clean');
		$this->form_validation->set_rules('desc' ,' Book Description', 'required|xss_clean');
		$this->form_validation->set_rules('author' ,'Book Author', 'required|xss_clean');

		if($this->form_validation->run() == FALSE){
			$this->editBook();
		}else {
			$id = $this->uri->segment(3);
			$title = $this->input->post('title');
			$desc = $this->input->post('desc');
			$author = $this->input->post('author');

			$this->load->model('user');
			$check = $this->user->editBook_parse($id, $title, $desc, $author);
			if($check){
				$arr = array('ok'=> 'Updated Successfully!');
				$this->session->set_flashdata($arr);
				$prev = $_SERVER['HTTP_REFERER'];
				redirect($prev);

			}else {
				show_404();
			}

		}
	}

	public function student_setting(){
		if($this->session->userdata('username')){
			$this->load->view('student/setting');
		}else {
			show_404();
		}

	}


	public function student_change_password(){
		$std_id = $this->session->userdata('username');
		$this->form_validation->set_rules('pass', 'New Password', 'required|xss_clean');
		$this->form_validation->set_rules('pass2', 'Repeat Password', 'required|xss_clean|matches[pass]');
		if($this->form_validation->run() == FALSE){
			$this->student_setting();
		}else {
			$pass = $this->input->post('pass2');
			$this->load->model('user');
			$check = $this->user->student_change_password($std_id, $pass);
			if($check){
				$arr =array ('ok' => 'Password Changed Successfully!');
				$this->session->set_flashdata($arr);
				$prev = $_SERVER['HTTP_REFERER'];
				redirect($prev);
			}else {
				show_404();
			}
		}

	}









}
