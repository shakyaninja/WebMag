<?php 
	class blog extends database{
		function __construct(){
			$this->table = 'blogs';
			database::__construct();
		}

		public function addBlog($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getBlogbyId($blog_id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $blog_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		// running nested sql
		public function getAllBlog($is_die=false){
			$args = array(
				'fields' => ['id',
					            'title',
					            'content',
					            'featured',
					            'categoryid',
					            '(SELECT categoryname from category where id = categoryid) as Category',
					            'view',
					            'image'],
					            
				'where' => array(
						'or' => array(
							'status'=>'Active',
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllFeaturedBlogByCategoryWithLimit($cat_id,$offset,$no_of_data,$is_die=false){
			$args = array(
				'fields' => ['id',
					            'title',
					            'content',
					            'featured',
					            'categoryid',
					            '(SELECT categoryname from category where id = categoryid) as Category',
					            'view',
					            'image','created_date'],
					            
								'where' => array(
									'and' => array(
										'status'=>'Active',
										'featured' =>"Featured",
										'categoryid'=>$cat_id
									)
								),
							'limit' => array(
										'offset' => $offset,
										'no_of_data' => $no_of_data	
									 )
			);
			return $this->getData($args,$is_die);
		}

		public function getAllFeaturedBlogWithLimit($offset,$no_of_data,$is_die=false){
			$args = array(
				'fields' => ['id',
					            'title',
					            'content',
					            'featured',
					            'categoryid',
					            '(SELECT categoryname from category where id = categoryid) as Category',
					            'view',
					            'image','created_date'],
					            
								'where' => array(
									'and' => array(
										'status'=>'Active',
										'featured' =>"Featured",
									)
								),
							'limit' => array(
										'offset' => $offset,
										'no_of_data' => $no_of_data	
									 )
			);
			return $this->getData($args,$is_die);
		}
		
		public function getAllRecentBlogByCategoryWithLimit($cat_id,$offset,$no_of_data,$is_die=false){
			$args = array(
				'fields' => ['id',
					            'title',
					            'content',
					            'featured',
					            'categoryid',
					            '(SELECT categoryname from category where id = categoryid) as Category',
					            'view',
					            'image',
					        	'created_date'],
					            
				'where' => array(
						'and' => array(
							'status'=>'Active',
							'categoryid'=>$cat_id
						)
					),
				'limit' => array(
							'offset' => $offset,
							'no_of_data' => $no_of_data	
				 		)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllRecentBlogWithLimit($offset,$no_of_data,$is_die=false){
			$args = array(
				'fields' => ['id',
					            'title',
					            'content',
					            'featured',
					            'categoryid',
					            '(SELECT categoryname from category where id = categoryid) as Category',
					            'view',
					            'image',
					        	'created_date'],
					            
				'where' => array(
						'or' => array(
							'status'=>'Active',
						)
					),
				'limit' => array(
							'offset' => $offset,
							'no_of_data' => $no_of_data	
				 		)
			);
			return $this->getData($args,$is_die);
		}

		public function getNumberBlogByCategory($cat_id,$is_die=false){
			$args = array(
				'fields' => ['COUNT(id) as total'],
				'where' => array(
						'and' => array(
							'status'=>'Active',
							'categoryid'=>$cat_id
						)
					)
			);
			return $this->getData($args,$is_die);
		}
		
		public function getAllPopularBlogByCategoryWithLimit($cat_id,$offset,$no_of_data,$is_die=false){
			$args = array(
				'fields' => ['id',
					            'title',
					            'content',
					            'featured',
					            'categoryid',
					            '(SELECT categoryname from category where id = categoryid) as Category',
					            'view',
					            'image',
					        	'created_date'],
					            
				'where' => array(
						'and' => array(
							'status'=>'Active',
							'categoryid'=>$cat_id
						)
					),
				'order' =>array(
						'columnname'=>'view',
						'orderType'=>'DESC'
					),
				'limit' => array(
							'offset' => $offset,
							'no_of_data' => $no_of_data	
				 		)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllPopularBlogWithLimit($offset,$no_of_data,$is_die=false){
			$args = array(
				'fields' => ['id',
					            'title',
					            'content',
					            'featured',
					            'categoryid',
					            '(SELECT categoryname from category where id = categoryid) as Category',
					            'view',
					            'image',
					        	'created_date'],
					            
				'where' => array(
						'and' => array(
							'status'=>'Active',
						)
					),
				'order' =>array(
						'columnname'=>'view',
						'orderType'=>'DESC'
					),
				'limit' => array(
							'offset' => $offset,
							'no_of_data' => $no_of_data	
				 		)
			);
			return $this->getData($args,$is_die);
		}

		public function updateBlogById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteBlogById($id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->deleteData($args,$is_die);
		}
	}
