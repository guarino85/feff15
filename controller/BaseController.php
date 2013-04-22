<?php

class BaseController {
	public $load;
	public $model;
	
	function __construct() {
	  $this->load = new Load();
	}
	
	function loadView($query){
		//print_r($_SERVER['QUERY_STRING']);	
		$query['page'] = !isset($query['page']) ? 'home' : $query['page'];
		
		if($query['page']!='admin' or ($query['page']=='admin' and $query['category']=='')){
			if(file_exists(VIEW_DIR . $query['page'] . '.php') && $query['page']!='404')
				call_user_func(array($this, validateControllerMethod($query['page'])), $query);
			else $this->pageNotFound();
		}
		else{
			if(file_exists(ADMIN_DIR . $query['category'] . '.php') && $query['page']!='404')
				call_user_func(array($this, 'admin'), $query);
			else $this->pageNotFound();
		}
	}
	
	function admin($params){
		if($params['category'] or ($params['action'] && $params['action'] == 'logout'))
			$this->load->viewAdmin($params);
		else
		 	$this->load->view('admin', $params);
	}
	
	function login($params){
	 $this->load->view('login');
	}
	
	function pageNotFound(){
	 $this->load->view('404');
	}
	
	function home($params){
	 $this->load->view('home');
	}
	
	function portfolio($params){
	 $this->load->view('portfolio');
	}
	
	function event($params){
	 $this->load->view('event', $params);
	}
	
	function event_list($params){
	 $this->load->view('event-list', $params);
	}
}
