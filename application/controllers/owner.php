<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Owner extends Application{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
		$this->ag_auth->restrict('editor');
		$this->load->library('pagination');
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
	public function index()
	{
		if(logged_in())
		{
			$data['pages']	= 'Dashboard';
			$this->load->view('website/admin/pages/adminpanel', $data);
		}
		else
		{
			$this->login();
		}
		
	}
	
	public function submit_news()
	{
		$data['pages']	= 'Add News';
		$data['news']	= 'Null';
		$data['value']	= NULL;
		$data['kategori'] = $this->admin->get_kategori();
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
	
	public function edit_news()
	{
		$data['pages']	= 'News';
		$data['news']	= 'Null';
		$data['isi']	= $this->admin->get_news();
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
	
	public function categories()
	{
		$data['pages']	= 'Categories';
		$data['konten']	= 'Categories';
		$data['isi']	= $this->admin->get_kategori();
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
	
	public function submit_page()
	{
		$data['pages']	= 'Add Page';
		$data['news']	= 'NULL';
		$data['value']	= NULL;
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
	
	public function edit_page()
	{
		$data['pages']	= 'Pages';
		$data['konten']	= 'Pages';
		$data['news']	= 'Null';
		$data['isi']	= $this->admin->get_page();
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
	
	public function file_manager()
	{
		#page data prepare
		$data['pages']	= 'File Manager';
		$data['konten']	= 'Files';
		
		#pagination config
		$config['base_url'] = base_url().'index.php/owner/file_manager'; //set the base url for pagination
		$config['total_rows'] = $this->admin->countFile(); //total rows
		$config['per_page'] = 5; //the number of per page for pagination
		$config['uri_segment'] = 3; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		#call view
		$data['isi'] = $this->admin->get_file($config['per_page'],$page);
		$this->load->view('website/admin/pages/adminpanel',$data);
	}
	
	public function video_manager()
	{
		#page data prepare
		$data['pages']	= 'Video Manager';
		$data['konten']	= 'Video';
		
		#pagination config
		$config['base_url'] = base_url().'index.php/owner/video_manager'; //set the base url for pagination
		$config['total_rows'] = $this->admin->countVideo(); //total rows
		$config['per_page'] = 5; //the number of per page for pagination
		$config['uri_segment'] = 3; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		#call view
		$data['isi'] = $this->admin->get_video($config['per_page'],$page);
		$this->load->view('website/admin/pages/adminpanel',$data);
	}
	
	public function add_user()
	{
		$data['pages']	= 'User Manager';
		$data['konten']	= 'Users';
		$data['isi']	= $this->admin->get_user();
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
	
	public function profile()
	{
		$data['pages']	= 'Profile';
		$data['edit']	= FALSE;
		$username		= username();
		$data['user']	= $this->admin->get_profile($username);
		$this->load->view('website/admin/pages/adminpanel', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */