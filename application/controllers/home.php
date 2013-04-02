<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Application{

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
		redirect('home/en');
	}
	
	public function en()
	{
		$language = $this->uri->segment(3);
		$bahasa = $this->uri->segment(2);
		$data['konten'] = $this->admin->get_page_by_permalink($language);
		$data['news'] = $this->admin->get_news_top($bahasa);
		if ($language == 'contact')
		{
			$this->load->view('website/user/en/pages/pages', $data);
		} 
		if (($language != NULL) && ($language != 'contact'))
		{
			redirect('page/en/'.$language);
		}
		if ($language == NULL)
		{
			$this->load->view('website/user/en/pages/homepage', $data); 
		}
	}
	
	public function id()
	{
		$language = $this->uri->segment(3);
		$bahasa = $this->uri->segment(2);
		$data['konten'] = $this->admin->get_page_by_permalink($language);
		$data['news'] = $this->admin->get_news_top($bahasa);
		if ($language == 'contact')
		{
			$this->load->view('website/user/id/pages/pages', $data);
		} 
		if (($language != NULL) && ($language != 'contact'))
		{
			redirect('page/id/'.$language);
		}
		if ($language == NULL)
		{
			$this->load->view('website/user/id/pages/homepage', $data); 
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */