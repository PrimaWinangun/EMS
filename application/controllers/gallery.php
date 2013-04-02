<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gallery extends Application{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model');
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
	
	public function en()
	{
		
		#pagination config
		if ($this->uri->segment(3) == 'photo')
		{
			$config['base_url'] = base_url().'index.php/gallery/en/photo'; //set the base url for pagination
			$config['total_rows'] = $this->gallery_model->count_gallery_file(); //total rows
			$config['per_page'] = 16; //the number of per page for pagination
			$config['uri_segment'] = 4; //see from base_url. 3 for this case
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['title'] = 'Photo Gallery';
			$data['konten'] = $this->gallery_model->get_file_gallery($config['per_page'],$page);
			$this->load->view('website/user/en/pages/gallery', $data);
		}
		else
		if ($this->uri->segment(3) == 'video')
		{
			if ($this->uri->segment(4) == NULL)
			{
				$config['base_url'] = base_url().'index.php/gallery/en/video'; //set the base url for pagination
				$config['total_rows'] = $this->gallery_model->count_gallery_video(); //total rows
				$config['per_page'] = 16; //the number of per page for pagination
				$config['uri_segment'] = 4; //see from base_url. 3 for this case
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
				$data['title'] = 'Video Gallery';
				$data['konten'] = $this->gallery_model->get_video_gallery($config['per_page'],$page);
				$this->load->view('website/user/en/pages/videoindex', $data);
			}
			else
			{
				$data['konten'] = $this->gallery_model->get_video_by_title($this->uri->segment(4));
				$data['title'] = str_replace("-", " ", $this->uri->segment(4));;
				$this->load->view('website/user/en/pages/video', $data);
			}
		}
		else
		{
			$this->load->view('website/user/en/pages/galleryindex');
		}
	}
	
	public function id()
	{
		#pagination config
		if ($this->uri->segment(3) == 'photo')
		{
			$config['base_url'] = base_url().'index.php/gallery/id/photo'; //set the base url for pagination
			$config['total_rows'] = $this->gallery_model->count_gallery_file(); //total rows
			$config['per_page'] = 16; //the number of per page for pagination
			$config['uri_segment'] = 4; //see from base_url. 3 for this case
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['title'] = 'Photo Gallery';
			$data['konten'] = $this->gallery_model->get_file_gallery($config['per_page'],$page);
			$this->load->view('website/user/id/pages/gallery', $data);
		}
		else
		if ($this->uri->segment(3) == 'video')
		{
			if ($this->uri->segment(4) == NULL)
			{
				$config['base_url'] = base_url().'index.php/gallery/id/video'; //set the base url for pagination
				$config['total_rows'] = $this->gallery_model->count_gallery_video(); //total rows
				$config['per_page'] = 16; //the number of per page for pagination
				$config['uri_segment'] = 4; //see from base_url. 3 for this case
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
				$data['title'] = 'Video Gallery';
				$data['konten'] = $this->gallery_model->get_video_gallery($config['per_page'],$page);
				$this->load->view('website/user/id/pages/videoindex', $data);
			}
			else
			{
				$data['konten'] = $this->gallery_model->get_video_by_title($this->uri->segment(4));
				$data['title'] = str_replace("-", " ", $this->uri->segment(4));;
				$this->load->view('website/user/id/pages/video', $data);
			}
		}
		else
		{
			$this->load->view('website/user/id/pages/galleryindex');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */