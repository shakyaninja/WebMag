<?php 
	class share extends database{
		function __construct(){
			$this->table = 'share';
			database::__construct();
		}

		public function addShare($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getSharebyId($share_id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $share_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		// running nested sql
		public function getAllShare($is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'status'=>'Active',
						)
					)
			);
			return $this->getData($args,$is_die);
		}
		
		public function updateShareById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteShareById($id,$is_die=false){
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


