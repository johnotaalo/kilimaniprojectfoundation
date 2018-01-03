<?php

class Template extends MX_Controller{
	protected $asset_url;

	protected $pageTitle;
	protected $pageDescription;
	protected $contentView;
	protected $contentViewData;
	protected $metaData;
	protected $modalView;
	protected $modalData;
	protected $modalTitle;

	function __construct(){
		$this->asset_url = $this->config->item('assets_url');
		$this->load->library('Assets', $this->config);
	}

	function membership(){
		$data = [];
		$data['page_css'] = $this->assets->css;
		$data['page_js'] = $this->assets->js;
		$data['javascript_file'] = $this->assets->javascript_file;
		$data['javascript_data'] = $this->assets->javascript_data;

		$data['pagetitle'] = $this->pageTitle;
		$data['pagedescription'] = $this->pageDescription;

		$data['partial'] = $this->contentView;
		$data['partialData'] = $this->contentViewData;

		$this->load->view('Template/membership_template_v', $data);
	}

	function setPageTitle($page_title = ""){
		$this->pageTitle = $page_title;

		return $this;
	}

	function setPageDescription($pageDescription){
		$this->pageDescription = $pageDescription;

		return $this;
	}

	function setPartial($view, $data = []){
		$this->contentView = $view;
		$this->contentViewData = $data;

		return $this;
	}
}