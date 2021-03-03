<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this-> load ->model('query');
		$books = $this -> query ->getBooks();
		$this-> load ->view('welcome_message', ['books' => $books]);

	}
	public function create()
	{
		$this-> load ->view('create');	
	}
	public function update($id)
	{
		$this-> load ->model('query');
		$books = $this -> query ->getSingleBook($id);
		$this-> load ->view('update', ['books' => $books]);	
	}
	public function save()
	{
		$this->form_validation->set_rules('title', 'Tên sách', 'required');
		$this->form_validation->set_rules('content', 'Nội dung sách', 'required',array('required' => 'You must provide a %s.'));

		if ($this->form_validation->run())
		{
			$data = $this ->input->post();
			$today = date('Y-m-d');
			$data['date_created']=$today;
			unset($data['submit']);
			$this-> load ->model('query');
			if($this -> query ->addBook($data)){
				$this -> session -> set_flashdata('msg', 'Thêm sách thành công');
			}
			else {
				$this -> session -> set_flashdata('msg', 'Thêm sách thất bại');
			}
			return redirect('welcome');
		}
		else
		{
			$this-> load ->view('create');	
		}
	}
	public function change($id){
		$this->form_validation->set_rules('title', 'Tên sách', 'required');
		$this->form_validation->set_rules('content', 'Nội dung sách', 'required',array('required' => 'You must provide a %s.'));

		if ($this->form_validation->run())
		{
			$data = $this ->input->post();
			$today = date('Y-m-d');
			$data['date_created']=$today;
			unset($data['submit']);
			$this-> load ->model('query');
			if($this -> query ->updateBook($data, $id)){
				$this -> session -> set_flashdata('msg', 'Thêm sách thành công');
			}
			else {
				$this -> session -> set_flashdata('msg', 'Thêm sách thất bại');
			}
			return redirect('welcome');
		}
		else
		{
			$this-> load ->view('create');	
		}
	}
	public function view($id){
		$this-> load ->model('query');
		$books = $this -> query ->getSingleBook($id);
		$this-> load ->view('view', ['books' => $books]);	
	}

	public function delete($id){
		$this-> load ->model('query');
		$books = $this -> query ->deleteBook($id);
		if($this -> query ->deleteBook($id)){
			$this -> session -> set_flashdata('msg', 'Xoá sách thành công');
		}
		else {
			$this -> session -> set_flashdata('msg', 'Xoá sách thất bại');
		}
		return redirect('welcome');
	}
}
