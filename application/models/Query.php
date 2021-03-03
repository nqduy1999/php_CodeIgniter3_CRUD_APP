<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Query extends CI_Model
{
	public function getBooks() {
		$query = $this -> db -> get ('tbl_book');
		if($query -> num_rows()>0) {
			return $query -> result();
		}
	}
	public function addBook($data) {
		return $this-> db -> insert('tbl_book', $data);
	}
	public function getSingleBook($id) {
		$query = $this -> db -> get_where('tbl_book', array('id' => $id));
		if($query -> num_rows()>0) {
			return $query -> row();
		}
	}
	public function updateBook($data, $id) {
		return $this-> db -> where('id', $id)
		-> update('tbl_book', $data)
		;
	}
	public function deleteBook($id) {
		return $this-> db -> delete('tbl_book', ['id'=> $id]);
	}
}
?>