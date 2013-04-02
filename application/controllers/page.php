<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Application{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
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
		$language = $this->uri->segment(2);
		print_r($language);
		if ($language == 'en')
		{
			redirect('home/en');
		}
		if ($language == 'id')
		{
			redirect('home/id');
		}
		else
		{
			redirect('home/en');
		}
	}
	
	public function en()
	{
		$content = $this->uri->segment(3);
		$data['konten'] = $this->admin->get_page_by_permalink($content);
		if (($content != NULL) && ($content != 'contact'))
		{
			$this->load->view('website/user/en/pages/pages', $data);
		}
		if ($content == NULL)
		{
			$this->load->view('website/user/en/pages/homepage'); 
		}
	}
	
	public function id()
	{
		$content = $this->uri->segment(3);
		$data['konten'] = $this->admin->get_page_by_permalink($content);
		if (($content != NULL) && ($content != 'contact'))
		{
			$this->load->view('website/user/id/pages/pages', $data);
		}
		if ($content == NULL)
		{
			$this->load->view('website/user/id/pages/homepage'); 
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */