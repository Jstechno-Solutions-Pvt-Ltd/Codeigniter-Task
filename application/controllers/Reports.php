<?php 

class Reports extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Report';
		$this->load->model('model_reports');
		
	}

	public function threatend()
	{
		if(!in_array('viewThreatend', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        // $this->data['js'] = 'application/views/reports/threatend.php';
		$this->render_template('reports/threatend', $this->data);
	}

	

}