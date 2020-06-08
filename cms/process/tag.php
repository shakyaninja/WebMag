<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
$Tag = new tag();
debugger($_POST);
if (isset($_POST) && !empty($_POST)) {
    $data = array(
        'name' => sanitize($_POST['name']),
        'status' => 'Active',
        'added_by' => $_SESSION['user_id']
    );
    debugger($data);
    if (!empty($_POST['id'])) {
        //update
        $search = $Tag->getTagbyId($_POST['id']);
        if ($search) {
            $act = 'Updat';
        } else {
            redirect('../tag','error','Cannot find tag.');
        }
        $success = $Tag->updateTagById($data, $_POST['id']);
    } else {
        //add
        $act = 'Add';
        $success = $Tag->addTag($data);
    }
    if ($success) {
        redirect('../tag', 'success', $act . 'ed tag succesfully');
    } else {
        redirect('../tag', 'error', 'Problem while ' . $act . 'ing tag.');
    }
}
// for deletion
else if (isset($_GET) && !empty($_GET)) {
    $tag_id = (int)$_GET['id'];
    debugger($_GET);
    if($_GET['act'] == substr(MD5("Delete-Tag-".$tag_id.$_SESSION['token']),5,15)){
        $data = array(
            'status'=> 'Passive'
        );
        $success = $Tag->updateTagById($data,$tag_id);
        if($success){
            redirect('../tag','success','Tag has been deleted successfully.');
        }
        else{
            redirect('../tag','error','Problem while deleting the tag');
        }
    }
    else{
        redirect('../tag','error','Deletion is not allowed to this user.');
    }
} else {
    redirect('../tag', 'error', 'Access denied.');
}
