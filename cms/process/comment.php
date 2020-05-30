<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
$Comment = new comment();
debugger($_GET);
// for deletion
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $comment_id = (int)$_GET['id'];
    if($_GET['act'] == substr(MD5("accept-Comment-".$comment_id.$_SESSION['token']),5,15)){
        $data = array(
            'state'=> 'accept'
        );
        $success = $Comment->updateCommentById($data,$comment_id);
        if($success){
            redirect('../comment','success','Comment has been accepted successfully.');
        }
        else{
            redirect('../comment','error','Problem while accepting the comment');
        }
    }
    else if($_GET['act'] == substr(MD5("reject-Comment-".$comment_id.$_SESSION['token']),5,15)){
        $data = array(
            'state'=> 'reject'
        );
        $success = $Comment->updateCommentById($data,$comment_id);
        if($success){
            redirect('../comment','success','Comment has been rejected successfully.');
        }
        else{
            redirect('../comment','error','Problem while rejecting the comment');
        }
    }
    else{
        redirect('../comment','error',' Accepting and Rejecting comment is not allowed to this user.');
    }
} else {
    redirect('../comment', 'error', 'Access denied.');
}
