<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System extends Application{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin');
		$this->load->library('uploader');
	}
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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function insert_user()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|callback_field_exists');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');		
		$this->form_validation->set_rules('email', 'Email Address', 'required|min_length[6]|valid_email|callback_field_exists');
		if($this->form_validation->run() == FALSE)
		{
			redirect('owner/add_user');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->ag_auth->salt($this->input->post('password'));
			$email = $this->input->post('email');
			$usergroup = $this->input->post('usergroup');

			if($this->admin->register($username, $password, $email, $usergroup) === TRUE)
			{
				$data['pages']	= 'User Manager';
				$data['konten']	= 'Users';
				$data['isi']	= $this->admin->get_user();
				$this->load->view('website/admin/pages/adminpanel', $data);
			}
			else
			{
				$data['pages']	= 'User Manager';
				$data['konten']	= 'Users';
				$data['isi']	= $this->admin->get_user();
				$this->load->view('website/admin/pages/adminpanel', $data);
			}

		}
	}
	
	public function update_profile()
	{
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');	
		$this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|min_length[6]|matches[password]');
		$datestring = "%Y" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$username = $this->input->post('hide');
		$path  = 'wp-content/uploads/'.$tanggal.'/';
		if(!is_dir($path))
		{
			mkdir($path,0777,TRUE);
		}
		$uploader = new Uploader();
		$uploader->setDir($path);
		$uploader->setExtensions(array('jpg','jpeg','png','gif')); //allowed extensions list//
		$uploader->setMaxSize(1); //set max file size to be allowed in MB//
		$uploader->sameName('FALSE');
		if($this->form_validation->run() == FALSE)
		{
			$data['pages']	= 'Profile';
			$data['edit']	= TRUE;
			$data['user']	= $this->admin->get_profile($username);
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
		else
		{
			$uploader->uploadFile('foto');
			//txtFile is the filebrowse element name //
			$avatar = $uploader->getUploadName();//get uploaded file name, renames on upload//
			$password = $this->ag_auth->salt($this->input->post('password'));
			$username = $this->input->post('hide');
			$email	= $this->input->post('email');
			$usergroup = $this->input->post('usergroup');
			if($this->admin->update_user($username, $password, $avatar, $email, $usergroup) === TRUE)
			{
				$data['pages']	= 'Profile';
				$data['edit']	= TRUE;
				$data['user']	= $this->admin->get_profile($username);
				$this->load->view('website/admin/pages/adminpanel', $data);
			}
			else
			{
				$data['pages']	= 'Profile';
				$data['edit']	= FALSE;
				$data['user']	= $this->admin->get_profile($username);
				$this->load->view('website/admin/pages/adminpanel', $data);
			}
		}
	}
	
	public function upload_news()
	{
		$this->form_validation->set_rules('news', 'news', 'required');
		$this->form_validation->set_rules('konten', 'konten', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['pages']	= 'Add News';
			$data['news']	= 'wrong';
			$data['value']	= NULL;
			$data['kategori'] = $this->admin->get_kategori();
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
		else
		{
			$this->admin->add_news();
			$data['pages']	= 'Add News';
			$data['news']	= 'right';
			$data['value']	= NULL;
			$data['kategori'] = $this->admin->get_kategori();
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
	}
	
	public function upload_file()
	{
		$this->form_validation->set_rules('file', 'file', 'required');
		$datestring = "%Y" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$path  = 'wp-content/uploads/'.$tanggal;
		$path_thumb  = 'wp-content/uploads/'.$tanggal.'/thumb';
		$filename = 'foto';
		if((!is_dir($path)) && (!is_dir($path_thumb)))
		{
			mkdir($path,0777,TRUE);
			mkdir($path_thumb,0777,TRUE);
		}
		$uploader = new Uploader();
		$uploader->setDir($path);
		$uploader->setExtensions(array('jpg','jpeg','png','gif')); //allowed extensions list//
		$uploader->setMaxSize(1); //set max file size to be allowed in MB//
		$uploader->sameName(FALSE);
		if($this->form_validation->run() == FALSE)
		{
			$data['pages']	= 'File Manager';
			$data['konten']	= 'Files';
			$data['isi']	= $this->admin->get_file();
			$this->load->view('website/admin/pages/adminpanel',$data);
		}
		else
		{
			$uploader->uploadFile($filename);
			//txtFile is the filebrowse element name //
			$image = $uploader->getUploadName();//get uploaded file name, renames on upload//
			$this->admin->upload_data($image);
			$file_data = $this->admin->get_file_by_title($this->input->post('file'));
			foreach ($file_data as $row_file_data)
			{
				if ($row_file_data['gallery'] == 'yes')
				{
					$this->admin->thumbnail_gallery($image);
				}
			}
			redirect('owner/file_manager');
		}
	}
	
	public function upload_video()
	{
		$this->form_validation->set_rules('file', 'file', 'required');
		$datestring = "%Y" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$path  = 'wp-content/uploads/'.$tanggal;
		$path_thumb  = 'wp-content/uploads/'.$tanggal.'/thumb';
		$filename = 'foto';
		if((!is_dir($path)) && (!is_dir($path_thumb)))
		{
			mkdir($path,0777,TRUE);
			mkdir($path_thumb,0777,TRUE);
		}
		$uploader = new Uploader();
		$uploader->setDir($path);
		$uploader->setExtensions(array('jpg','jpeg','png','gif')); //allowed extensions list//
		$uploader->setMaxSize(1); //set max file size to be allowed in MB//
		$uploader->sameName(FALSE);
		if($this->form_validation->run() == FALSE)
		{
			$data['pages']	= 'File Manager';
			$data['konten']	= 'Files';
			$data['isi']	= $this->admin->get_file();
			$this->load->view('website/admin/pages/adminpanel',$data);
		}
		else
		{
			$uploader->uploadFile($filename);
			//txtFile is the filebrowse element name //
			$image = $uploader->getUploadName();//get uploaded file name, renames on upload//
			$this->admin->upload_video($image);
			$file_data = $this->admin->get_file_by_title($this->input->post('file'));
			foreach ($file_data as $row_file_data)
			{
				if ($row_file_data['gallery'] == 'video')
				{
					$this->admin->thumbnail_gallery($image);
				}
			}
			redirect('owner/video_manager');
		}
	}
	
	public function edit_news($id)
	{
		$data['pages']	= 'Add News';
		$data['news']	= 'NULL';
		$data['value']	= $this->admin->get_news_id($id);
		$data['kategori'] = $this->admin->get_kategori();
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
	
	public function update_news()
	{
		$this->form_validation->set_rules('news', 'news', 'required');
		$this->form_validation->set_rules('konten', 'konten', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['pages']	= 'News';
			$data['news']	= 'fail';
			$data['isi']	= $this->admin->get_news();
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
		else
		{
			$id = $this->input->post('id');
			$this->admin->edit_news($id);
			$data['pages']	= 'News';
			$data['news']	= 'oke';	
			$data['isi']	= $this->admin->get_news();
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
	}
	
	public function upload_page()
	{
		$this->form_validation->set_rules('pages', 'pages', 'required');
		$this->form_validation->set_rules('konten', 'konten', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['pages']	= 'Add Page';
			$data['news']	= 'wrong';
			$data['value']	= NULL;
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
		else
		{
			$this->admin->add_page();
			$data['pages']	= 'Add Page';
			$data['news']	= 'right';
			$data['value']	= NULL;
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
	}
	
	public function edit_page($id)
	{
		$data['pages']	= 'Add Page';
		$data['news']	= 'NULL';
		$data['value']	= $this->admin->get_page_id($id);
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
	
	public function update_page()
	{
		$this->form_validation->set_rules('pages', 'pages', 'required');
		$this->form_validation->set_rules('konten', 'konten', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['pages']	= 'Pages';
			$data['news']	= 'fail';
			$data['isi']	= $this->admin->get_page();
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
		else
		{
			$id = $this->input->post('id');
			$this->admin->edit_page($id);
			$data['pages']	= 'Pages';
			$data['news']	= 'oke';	
			$data['isi']	= $this->admin->get_page();
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
	}
	
	public function add_kategori()
	{
		$this->form_validation->set_rules('category', 'category', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['pages']	= 'Categories';
			$data['konten']	= 'Categories';
			$data['news']	= 'wrong';
			$data['isi']	= $this->admin->get_kategori();
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
		else
		{
			$this->admin->add_kategori();
			$data['pages']	= 'Categories';
			$data['konten']	= 'Categories';
			$data['news']	= 'right';
			$data['isi']	= $this->admin->get_kategori();
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
	}
	
	public function edit_profile()
	{
		$data['pages']	= 'Profile';
		$data['edit']	= TRUE;
		$username		= username();
		$data['user']	= $this->admin->get_profile($username);
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
	
	public function edit_user($username)
	{
		$data['pages']	= 'Profile';
		$data['edit']	= TRUE;
		$data['user']	= $this->admin->get_profile($username);
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
	
	public function delete_user($username)
	{
		$this->admin->delete_user($username);
		redirect('owner/add_user');
	}
	
	public function delete_category($id)
	{
		$this->admin->delete_category($id);
		redirect('owner/categories');
	}
	
	public function delete_news($id)
	{
		$this->admin->delete_news($id);
		redirect('owner/edit_news');
	}
	
	public function delete_file($id)
	{
		$filename = $this->admin->get_file_id($id);
		foreach ($filename as $row_file) :
		{
			unlink($row_file['permalink']);
		} 
		endforeach;
		$this->admin->delete_file($id);
		if ($this->uri->segment(4) == 'foto')
		{
			redirect('owner/file_manager');
		}
		else
		{
			redirect('owner/video_manager');
		}
	}
	
}