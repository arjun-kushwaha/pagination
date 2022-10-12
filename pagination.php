#this function shows list of Category
public function index(){

	#start pagination code here 

	$this->load->library('pagination');
	$config['base_url'] = base_url('admin/Category/index');
	$config['per_page'] = 7;
	$this->load->model('admin/Category_model');
	$config['total_rows'] = $this->Category_model->get_category_rows();
	//print_r($this->Category_model->get_category_rows());die;

	$config['full_tag_open'] ="<ul class='pagination'>";
	$config['full_tag_close'] = '</ul>';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] ="<li class='active'><a>";
	$config['cur_tag_close'] ='</a></li>';

	$this->pagination->initialize($config);
	#end pagination code
	
    #  Breadcrumbs navigation code
	$crumb['title'] = 'View Category';
	$crumb['heading'] = 'admin/Category';
	$crumb['desc'] = 'index';

	$this->load->model('admin/Category_model');
	
	#passing argument to show number of rows per page , 4 segment support.phoneme.in/admin/category/index

	$res = $this->Category_model->fetchCategories2($config['per_page'],$this->uri->segment(4));

	$data = array();
	$data['res'] = $res;
	
	//echo "<pre>"; print_r($res);
	$this->load->view('template/head');
	$this->load->view('template/header');
	$this->load->view('template/navigation');
	$this->load->view('template/breadcrumb',$crumb);  
	$this->load->view('blog/category/list',$data);
	//$this->load->view('template/footer');
	
	}  
	
	#paste this line where you want to show pagination menu
	<div class="text-center"><?php echo $this->pagination->create_links(); ?></div>

