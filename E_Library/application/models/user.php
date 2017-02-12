<?php 



class User Extends CI_Model{

	public function lib_login($username, $password){
		$this->db->where(['username'=> $username, 'password'=> $password]);
		$query = $this->db->get('librarian');
		if($query){
			return $query->result();
		}else {
			return FALSE;
		}
	}

	public function lib_loginCheck($current_user){
		$this->db->where(['username'=> $current_user]);
		$query = $this->db->get('librarian');
		if($query){
			return $query->result();
		}else {
			return FALSE;
		}
	}

	public function student_login($username, $password){
		$this->db->where(['std_id'=> $username, 'password'=> $password]);
		$query = $this->db->get('student');
		if($query){
			return $query->result();
		}else {
			return FALSE;
		}
	}

	public function student_loginCheck($current_user){
		$this->db->where(['std_id'=> $current_user]);
		$query = $this->db->get('student');
		if($query){
			return $query->result();
		}else {
			return FALSE;
		}
	}

	public function lib_urlChecking($current_user){
		$query = $this->db->query("SELECT lib_id FROM librarian WHERE username='$current_user'");
		
		if($query->num_rows() > 0){
			return TRUE;
		}else {			
			return FALSE;			
		}
	}

	public function student_urlChecking($current_user){
		$query = $this->db->query("SELECT std_id FROM student WHERE std_id = '$current_user'");
		if($query->num_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}


	public function add_student($id, $fname, $lname, $course, $year, $password){
		$data = array('std_id'=> $id, 'std_fname'=> $fname, 'std_lname'=> $lname, 'std_course'=> $course, 'std_year'=> $year, 'password'=> $password);

		$query = $this->db->insert('student', $data);
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function getStudents(){
		$this->db->order_by("std_id");
		$query = $this->db->get('student');

		return $query->result();
	}

	public function add_book($title, $desc, $author){
		$data = array('book_title'=> $title, 'book_description'=> $desc, 'book_author'=> $author);

		$query = $this->db->insert('book', $data);
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function getBooks(){
		$query = $this->db->query("SELECT * FROM book WHERE book_id NOT IN (SELECT book_id FROM borrow WHERE status != 'cancelled' AND status != 'returned')");

		return $query->result();
	}

	public function student_borrow($id, $current_user){
		$data = array('book_id'=> $id, 'std_id'=> $current_user, 'status'=> 'pending', 'brw_date' => date("m-d-Y H:i a"));
		$query = $this->db->insert('borrow', $data);
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function student_return($id, $current_user){
		$updateData = array('status'=> 'returned', 'rtn_date' => date("m-d-Y H:i a"));
		$this->db->where(['book_id'=> $id, 'std_id'=> $current_user, 'status' => 'confirmed']);
		$query = $this->db->update('borrow', $updateData); 
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function student_cancel($id, $current_user){
		$this->db->where(['book_id'=> $id, 'std_id'=> $current_user, 'status' => 'pending']);
		$query = $this->db->delete('borrow');
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function getStudPending($current_user){
		$query = $this->db->query("SELECT * FROM book WHERE book_id IN (SELECT book_id FROM borrow WHERE status = 'pending' AND std_id = '$current_user')");

		return $query->result();
	}	
	
	public function getStudBorrowed($current_user){
		$query = $this->db->query("SELECT book.book_id, book_title, book_description, book_author, borrow.brw_date, borrow.rtn_date FROM book INNER JOIN borrow ON book.book_id = borrow.book_id WHERE borrow.status = 'confirmed' AND borrow.std_id = '$current_user' ORDER BY borrow.brw_date");

		return $query->result();
	}

	public function getLibPending(){
		$query = $this->db->query("SELECT borrow.brw_id, book.book_id, book.book_title, book.book_author, borrow.code, student.std_fname, student.std_lname FROM borrow INNER JOIN book ON borrow.book_id = book.book_id INNER JOIN student ON borrow.std_id = student.std_id WHERE borrow.status = 'pending'");

		return $query->result();
	}

	public function lib_confirm($brw_id){
		$updateData = array('status'=> 'confirmed');
		$this->db->where('brw_id', $brw_id);
		$query = $this->db->update('borrow', $updateData); 
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function lib_cancel($brw_id){
		$this->db->where(['brw_id'=> $brw_id]);
		$query = $this->db->delete('borrow');
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
		
		$updateData = array('status'=> 'cancelled');
		$this->db->where('brw_id', $brw_id);
		$query = $this->db->update('borrow', $updateData); 
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function lib_deleteStudent($id){
		$this->db->where(['std_id'=> $id]);
		$query = $this->db->delete('student');
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}
	public function lib_deleteBooks($id){
		$this->db->where(['book_id'=> $id]);
		$query = $this->db->delete('book');
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	public function getStudActivity($current_user){
		$query = $this->db->query("SELECT book.book_id, book_title, book_description, book_author, borrow.brw_date, borrow.rtn_date FROM borrow INNER JOIN book ON borrow.book_id = book.book_id INNER JOIN student ON borrow.std_id = student.std_id WHERE borrow.status = 'returned' AND student.std_id = '$current_user' ORDER BY borrow.brw_date");

		return $query->result();
	}
	
	public function getLibActivity(){
		$query = $this->db->query("SELECT book.book_id, book_title, book_description, book_author, student.std_fname, student.std_lname, borrow.brw_date, borrow.rtn_date FROM borrow INNER JOIN book ON borrow.book_id = book.book_id INNER JOIN student ON borrow.std_id = student.std_id ORDER BY borrow.brw_date");

		return $query->result();
	}

	public function lib_change_password($user, $pass2){
		$this->db->where(['username'=> $user]);
		$data = array('password'=> $pass2);
		$query = $this->db->update('librarian', $data);
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function lib_edit_display($id){
		$this->db->where(['std_id'=> $id]);
		$query = $this->db->get('student');
		return $query->result();
		
	}

	public function lib_edit_parse($id, $fname, $lname, $course, $year){
		$data = array('std_id'=> $id, 'std_fname'=> $fname, 'std_lname'=> $lname, 'std_course'=> $course, 'std_year'=> $year);
		$query = $this->db->update('student', $data);
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function editBook_display($id){
		$this->db->where(['book_id'=> $id]);
		$query = $this->db->get('book');
		return $query->result();
		
	}

	public function editBook_parse($id, $title, $desc, $author){
		$this->db->where(['book_id'=> $id]);
		$data = array('book_title'=> $title, 'book_description'=> $desc, 'book_author'=> $author);
		$query = $this->db->update('book',$data);
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function student_change_password($std_id, $pass){
		$this->db->where(['std_id'=> $id]);
		$data = array('password'=> $pass);
		$query = $this->db->update('student', $data);
		if($query){
			return TRUE;
		}else {
			return FALSE;
		}
	}
}

?>