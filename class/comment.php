<?php 
	class comment extends database{
		function __construct(){
			$this->table = 'comments';
			database::__construct();
		}

		public function addComment($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getCommentbyId($comment_id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'id' => $comment_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllComment($is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'status' => 'Active',
						)
					),
					'order'=> 'ASC'
			);
			return $this->getData($args,$is_die);
		}

		public function getAllCommentbyBlogId($blogid,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'status' => 'Active',
							'commentType' => 'comment',
							'blogid' => $blogid,
						)
					),
					'order'=> 'ASC'
			);
			return $this->getData($args,$is_die);
		}

		public function getAllAcceptReplybyCommentID($commentid,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'status' => 'Active',
							'commentType' => 'reply',
							'commentid' => $commentid,
							'state' => 'accept',
						)
					),
					'order'=> 'ASC'
			);
			return $this->getData($args,$is_die);
		}

		public function getNumberCommentByBlog($blog_id,$is_die=false){
			$args = array(
				'fields' => ['COUNT(id) as total'],
				'where' => array(
						'and' => array(
							'status'=>'Active',
							'blogid'=>$blog_id,
							'state' => 'accept',
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllWaitingComment($is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'status' => 'Active',
							'state' => 'waiting',
						)
					),
					'order'=> 'ASC'
			);
			return $this->getData($args,$is_die);
		}

		public function getAllAcceptCommentbyBlogId($blog_id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'status' => 'Active',
							'state' => 'accept',
							'commentType' => 'comment',
							'blogid' => $blog_id,
						)
					),
					'order'=> 'ASC'
			);
			return $this->getData($args,$is_die);
		}
		
		public function updateCommentById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteCommentById($id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'id' => $id,
						)
					)
			);
			return $this->deleteData($args,$is_die);
		}
	}

 ?>


