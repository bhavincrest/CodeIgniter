<?php

	class News extends CI_Controller {
		
			public function __construct()
			{
				parent::__construct();
				$this->load->model('news_model');
				$this->load->library('pagination');
			}
	
			public function index()
			{
				
				$params = $this->uri->segment_array();
				
				$offset = 0;
				$limit = 5;
				if(isset($params)) {
					if(isset($params[4])){
						if($params[4] > 0)  {
							$offset = ($params[4]-1)*$limit;
						}
					}else {
						$offset = 0;
					}
					
				}
				
				
				$config['base_url'] = 'http://localhost/codeIgniter/index.php/news/index/page/';
				$config['total_rows'] = $this->news_model->get_total('news');
				$config['per_page'] = $limit ;
				$config['use_page_numbers']  = TRUE;
				$config["uri_segment"] = 4;
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				
				$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
				$config['cur_tag_close'] = '</a></li>';
				
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';
				$config['prev_link'] = '&lt;';
				
				$config['next_tag_close'] = '</li>';
				$config['next_tag_open'] = '<li>';
				$config['next_link'] = '&gt;';
				
				
				$this->pagination->initialize($config); 
				
				
				$data['news'] = $this->news_model->get_news(false,$offset,$limit);
				$data['title'] = 'News Archive';
				$data['page_is'] = 'index';
				$data['pagination_data'] = $this->pagination->create_links(); 
								
				$this->load->view('templates/header',$data);
				$this->load->view('news/index',$data);
				$this->load->view('templates/footer');
 			}
			
			public function search(){
				
					if($this->input->post('search_news')) {
						$data['news'] = $this->news_model->get_news_search();
						$data['title'] = 'Search News Archive';
						$data['page_is'] = 'index';
						
						$this->load->view('templates/header',$data);
						$this->load->view('news/index',$data);
						$this->load->view('templates/footer');
					}
			}
			
			public function view($slug)
			{
				$data['news_item'] = $this->news_model->get_news($slug);
				
				if(empty($data['news_item'])) {
					show_404();
				}
				$data['page_is'] = 'view';
				
				$data['title'] = $data['news_item']['title'];
				
				$this->load->view('templates/header',$data);
				$this->load->view('news/view',$data);
				$this->load->view('templates/footer');
			}
			
			public function create()
			{
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$data['title'] ='Crete a News Item';
				$data['page_is'] = 'create';
				
				$this->form_validation->set_rules('title','Title','required');
				$this->form_validation->set_rules('text','text','required');
				
				if($this->form_validation->run() === FALSE) {
						$this->load->view('templates/header',$data);
						$this->load->view('news/create');
						$this->load->view('templates/footer');
				}
				else {
						$this->news_model->set_news();
						//$this->load->view('news/suceess');
						redirect('news/', 'refresh');
				}
			}
			
								
			public function update_view($slug)
			{
				$this->load->helper('form');
				$this->load->library('form_validation');
				$data['title'] = 'Editing a News Item';
				$data['page_is'] = 'update';
				$data['news_item'] = $this->news_model->get_news($slug);
				
				$this->load->view('templates/header',$data);
				$this->load->view('news/create',$data);
				$this->load->view('templates/footer');
			}
			
			public function update_news($slug)
			{
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('title','Title','required');
				$this->form_validation->set_rules('text','text','required');
				
				
				if($this->form_validation->run() === FALSE) {
				
					$data['news_item']['title'] = $this->input->post('title');
					$data['news_item']['text'] = $this->input->post('text');
					$data['news_item']['slug'] = $this->input->post('slug');
						$this->load->view('templates/header',$data);
						$this->load->view('news/update_view',$data);
						$this->load->view('templates/footer');
				}
				else {
						$this->news_model->update_news($slug);
						//$this->load->view('news/suceess');
						redirect('news/', 'refresh');
				}
			}
			
			public function delete($slug){
				$this->news_model->delete_news($slug);
				redirect('news/', 'refresh');
			}
		
			
	}
	