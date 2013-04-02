<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_model extends CI_Model {

	// loading the database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_file_gallery($num, $offset)
	{
		$this->db->select('*');
		$this->db->where('gallery','yes');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('file',$num, $offset);
		return $query->result_array();
	}
	
	function count_gallery_file()
	{
		$this->db->where('gallery', 'yes');
		$this->db->from('file');
		return $this->db->count_all_results();
	}
	
	function get_video_gallery($num, $offset)
	{
		$this->db->select('*');
		$this->db->where('gallery','video');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('file',$num, $offset);
		return $query->result_array();
	}
	
	function count_gallery_video()
	{
		$this->db->where('gallery', 'video');
		$this->db->from('file');
		return $this->db->count_all_results();
	}
	
	function get_video_by_title($title)
	{
		$title = str_replace("-", " ", $title);
		$this->db->where('title',$title);
		$query = $this->db->get('file');
		return $query->result_array();
	}
	
}
