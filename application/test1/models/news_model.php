<?php

	class News_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_news($slug=false,$offset=0,$limit=1)
		{
			if($slug==false) {
				$query = $this->db->get('news',$limit,$offset);
				return $query->result_array();
			}
			
			$query = $this->db->get_where('news',array('slug'=>$slug));
			
			return $query->row_array();
		}
		
		public function set_news()
		{
			$this->load->helper('url');
			
			$slug = url_title($this->input->post('title'),'dash',TRUE);
			
			$data = array (
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text'),
			);
			
			return $this->db->insert('news',$data);
		}
		
		public function update_news($f_slug) {
			
			$this->load->helper('url');
			$slug = url_title($this->input->post('title'),'dash',TRUE);
			$data = array (
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text'),
			);
			
			$this->db->where('slug', $f_slug);
			$this->db->update('news', $data);
			
		}
		
		public function delete_news($d_slug) {
			
			$this->db->where('slug',$d_slug);
			$this->db->delete('news');
		}
		
		public function get_news_search(){
			
			/*$data = array(
				'title' => $this->input->post('search_news')
			);*/
			$this->db->like('title',$this->input->post('search_news'));
			$query = $this->db->get('news');
			//echo $this->db->last_query();
			return $query->result_array();
		}
		
		public function get_total($table){
			return $this->db->count_all($table);
		}
	}