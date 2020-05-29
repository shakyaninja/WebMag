<?php 
	class info extends database{
		function __construct(){
			$this->table = 'info';
			database::__construct();
		}

		public function addInfo($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getInfobyId($info_id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $info_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		// running nested sql
		public function getAllInfo($is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'status'=>'Active',
						)
					)
			);
			return $this->getData($args,$is_die);
		}
		
		public function updateInfoById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteInfoById($id,$is_die=false){
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


