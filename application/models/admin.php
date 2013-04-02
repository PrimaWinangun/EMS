<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Model {

	// loading the database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function add_news()
	{
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$permalink = preg_replace("/[^a-zA-Z 0-9]+/", "", $this->input->post('news'));
		$permalink = str_replace(" ", "-", $permalink);
		$data = array(
			'tanggal' 	=> $tanggal,
			'type' 		=> 'News',
			'title'		=> $this->input->post('news'),
			'konten'	=> $this->input->post('konten'),
			'permalink'	=> $permalink,
			'kategori'	=> $this->input->post('category'),
			'tagged'	=> $this->input->post('tags'),
			'language'	=> $this->input->post('language'),
			'publish'	=> $this->input->post('publish')
		);
		$this->db->insert('content', $data);
	}
	
	function edit_news($news_id)
	{
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$permalink = preg_replace("/[^a-zA-Z 0-9]+/", "", $this->input->post('news'));
		$permalink = str_replace(" ", "-", $permalink);
		$newdata = array(
			'tanggal' 	=> $tanggal,
			'type' 		=> 'News',
			'title'		=> $this->input->post('news'),
			'konten'	=> $this->input->post('konten'),
			'permalink'	=> $permalink,
			'kategori'	=> $this->input->post('category'),
			'tagged'	=> $this->input->post('tags'),
			'language'	=> $this->input->post('language'),
			'publish'	=> $this->input->post('publish')
		);
		$this->db->where('id', $news_id);
		$str=$this->db->update('content',$newdata);
	}
	
	function update_user($username, $password, $avatar, $email, $usergroup)
	{
		if ($avatar != '')
		{
			$newdata = array(
				'password' 	=> $password,
				'avatar'	=> $avatar,
				'email'		=> $email,
				'group_id'	=> $usergroup
			);
		}
		else
		{
			$newdata = array(
				'password' => $password,
				'email'		=> $email,
				'group_id'	=> $usergroup);
		}
		$this->db->where('username', $username);
		$str=$this->db->update('users',$newdata);
	}
	
	function add_page()
	{
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$permalink = preg_replace("/[^a-zA-Z 0-9]+/", "", $this->input->post('pages'));
		$permalink = str_replace(" ", "-", $permalink);
		$data = array(
			'tanggal' 	=> $tanggal,
			'type' 		=> 'Page',
			'title'		=> $this->input->post('pages'),
			'konten'	=> $this->input->post('konten'),
			'permalink'	=> $permalink,
			'tagged'	=> $this->input->post('tags'),
			'language'	=> $this->input->post('language'),
			'publish'	=> $this->input->post('publish')
		);
		$this->db->insert('content', $data);
	}
	
	function edit_page($page_id)
	{
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$permalink = preg_replace("/[^a-zA-Z 0-9]+/", "", $this->input->post('pages'));
		$permalink = str_replace(" ", "-", $permalink);
		$newdata = array(
			'tanggal' 	=> $tanggal,
			'type' 		=> 'Page',
			'title'		=> $this->input->post('pages'),
			'konten'	=> $this->input->post('konten'),
			'permalink'	=> $permalink,
			'tagged'	=> $this->input->post('tags'),
			'language'	=> $this->input->post('language'),
			'publish'	=> $this->input->post('publish')
		);
		$this->db->where('id', $page_id);
		$str=$this->db->update('content',$newdata);
	}
	
	function get_news()
	{
		$this->db->where('type','News');
		$this->db->order_by('id','ASC');
		$query = $this->db->get('content');
		return $query->result_array();
	}
	
	function get_news_id($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('content');
		return $query->result_array();
	}
	
	function get_news_top($bahasa)
	{
		$this->db->limit(3);
		$this->db->order_by('id', 'DESC');
		$this->db->where('type','News');
		$this->db->where('publish','published');
		$this->db->where('language',$bahasa);
		$query = $this->db->get('content');
		return $query->result_array();
	}
	
	function get_news_by_permalink($permalink)
	{
		$this->db->where('permalink',$permalink);
		$this->db->where('publish','published');
		$query = $this->db->get('content');
		return $query->result_array();
	}
	
	function get_kategori()
	{
		$this->db->select('*');
		$this->db->order_by('id','ASC');
		$query = $this->db->get('kategori');
		return $query->result_array();
	}
	
	function add_kategori()
	{
		$data = array(
			'category' 	=> $this->input->post('category'),
		);
		$this->db->insert('kategori', $data);
	}
	
	function get_page()
	{
		$this->db->where('type','Page');
		$this->db->order_by('id','ASC');
		$query = $this->db->get('content');
		return $query->result_array();
	}
	
	function get_page_id($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('content');
		return $query->result_array();
	}
	
	function get_page_by_permalink($permalink)
	{
		$this->db->where('permalink',$permalink);
		$this->db->where('publish','published');
		$query = $this->db->get('content');
		return $query->result_array();
	}
	
	function get_user()
	{
		$this->db->select('*');
		$this->db->order_by('id','ASC');
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
	function delete_category($kategori)
	{
		$this->db->delete('kategori', array('id' => $kategori)); 
	}
	
	function delete_news($news)
	{
		$this->db->delete('content', array('id' => $news)); 
	}
	
	function delete_file($file)
	{
		$this->db->delete('file', array('id' => $file)); 
	}
	
	function delete_user($username)
	{
		$this->db->delete('users', array('username' => $username)); 
	}
	
	function register($username, $password, $email, $usergroup)
	{
		$data = array(
			'username' 	=> $username,
			'password' 	=> $password,
			'email'		=> $email,
			'group_id'	=> $usergroup
		);
		$this->db->insert('users', $data);
	}
	
	function get_file($num, $offset)
	{
		$this->db->select('*');
		$this->db->order_by('id','DESC');		
		$this->db->not_like('gallery','video');
		$query = $this->db->get('file',$num, $offset);
		return $query->result_array();
	}
	
	function get_video($num, $offset)
	{
		$this->db->select('*');
		$this->db->order_by('id','DESC');
		$this->db->where('gallery','video');
		$query = $this->db->get('file',$num, $offset);
		return $query->result_array();
	}
	
	function countFile()
	{
		$this->db->not_like('gallery','video');
		return $this->db->count_all_results('file');
	}
	
	function countVideo()
	{
		$this->db->where('gallery','video');
		#$this->db->from('file');
		return $this->db->count_all_results('file');
	}
	
	function get_file_id($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('file');
		return $query->result_array();
	}
	
	function get_file_by_title($title)
	{
		$this->db->where('title',$title);
		$query = $this->db->get('file');
		return $query->result_array();
	}
	
	function get_profile($username)
	{
		$this->db->where('username',$username);
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
	function upload_data($image_data)
	{
		$datestring = "%Y" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$permalink = base_url().'wp-content/uploads/'.$tanggal.'/'.$image_data;
		$data = array(
			'title' 	=> $this->input->post('file'),
			'permalink'	=> $permalink,
			'alt'		=> $this->input->post('file'),
			'filename'	=> $image_data,
			'gallery'	=> $this->input->post('gallery')
		);
		
		$this->db->insert('file', $data);
	}
	
	function upload_video($image_data)
	{
		$datestring = "%Y" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$title = preg_replace("/[^a-zA-Z 0-9]+/", "", $this->input->post('file'));
		$permalink = base_url().'index.php/gallery/'.$this->input->post('language').'/video/'.$title;
		$permalink = str_replace(" ", "-", $permalink);
		if ($image_data == NULL)
		{
			$image_data = ' ';
		}
		$data = array(
			'title' 	=> $this->input->post('file'),
			'permalink'	=> $permalink,
			'alt'		=> $image_data,
			'filename'	=> $this->input->post('video'),
			'gallery'	=> 'video'
		);
		
		$this->db->insert('file', $data);
	}
	
	function thumbnail_gallery($image_data)
	{
		$datestring = "%Y" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$config = array(
		  'source_image' => 'wp-content/uploads/'.$tanggal.'/'.$image_data, //get original image
		  'new_image' => 'wp-content/uploads/'.$tanggal.'/thumb', //save as new image //need to create thumbs first
		  'maintain_ratio' => true,
		  'width' => 150,
		  'height' => 100
		);
 
		$this->load->library('image_lib', $config); //load library
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}
}
