<?php 
	class tag extends database{
		function __construct(){
			$this->table = 'tag';
			database::__construct();
		}

		public function addTag($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getTagbyId($tag_id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $tag_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllTag($is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'status' => 'Active',
						)
					),
					'order'=> 'ASC'
			);
			return $this->getData($args,$is_die);
		}
		
		public function updateTagById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteTagById($id,$is_die=false){
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

 ?>


