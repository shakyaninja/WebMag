<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
$Info = new info();
debugger($_POST);
if (isset($_POST) && !empty($_POST)) {
    $data = array(
        'icon_name' => sanitize($_POST['icon_name']),
		'url' => htmlentities($_POST['url']),
		'class' => sanitize($_POST['class']),
        'status' => 'Active',
        'added_by' => $_SESSION['user_id']
    );
    debugger($data);
    if (!empty($_POST['id'])) {
        //update
        $search = $Info->getInfobyId($_POST['id']);
        if ($search) {
            $act = 'Updat';
        } else {
            redirect('../info','error','Cannot find info.');
        }
        $success = $Info->updateInfoById($data, $_POST['id']);
    } else {
        //add
        $act = 'Add';
        $success = $Info->addInfo($data);
    }
    if ($success) {
        redirect('../info', 'success', $act . 'ed info succesfully');
    } else {
        redirect('../info', 'error', 'Problem while ' . $act . 'ing info.');
    }
}
// for deletion
else if (isset($_GET) && !empty($_GET)) {
    $info_id = (int)$_GET['id'];
    debugger($_GET);
    if($_GET['act'] == substr(MD5("Delete-Info-".$info_id.$_SESSION['token']),5,15)){
        $data = array(
            'status'=> 'Passive'
        );
        $success = $Info->updateInfoById($data,$info_id);
        if($success){
            redirect('../info','success','Info has been deleted successfully.');
        }
        else{
            redirect('../info','error','Problem while deleting the info');
        }
    }
    else{
        redirect('../info','error','Deletion is not allowed to this user.');
    }
} else {
    redirect('../info', 'error', 'Access denied.');
}
