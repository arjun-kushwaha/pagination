	public function fetchCategories2($limit,$offset) {
		$this->otherdb->where('state',1);
		$this->otherdb->limit($limit,$offset);
		$this->otherdb->order_by('category_id','asc');
		$category = $this->otherdb->get('Categories')->result_array();
		$data_category=[];

		foreach($category as $category_row)
		{
			$data_category[$category_row['category_id']]=new Categories($category_row);
			//print_r($category_row); die;
		}
	
		return $data_category;
	}
