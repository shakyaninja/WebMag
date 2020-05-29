<?php 
	class ads extends database{
		function __construct(){
			$this->table = 'advertisement';
			database::__construct();
		}

		public function addAds($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getAdsbyId($ads_id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $ads_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		// running nested sql
		public function getAllAds($is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'status'=>'Active',
						)
					)
			);
			return $this->getData($args,$is_die);
		}
		
		public function updateAdsById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteAdsById($id,$is_die=false){
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


