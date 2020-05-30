<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
$Share = new share();
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
        $search = $Share->getSharebyId($_POST['id']);
        if ($search) {
            $act = 'Updat';
        } else {
            redirect('../share','error','Cannot find share.');
        }
        $success = $Share->updateShareById($data, $_POST['id']);
    } else {
        //add
        $act = 'Add';
        $success = $Share->addShare($data);
    }
    if ($success) {
        redirect('../share', 'success', $act . 'ed share succesfully');
    } else {
        redirect('../share', 'error', 'Problem while ' . $act . 'ing share.');
    }
}
// for deletion
else if (isset($_GET) && !empty($_GET)) {
    $share_id = (int)$_GET['id'];
    debugger($_GET);
    if($_GET['act'] == substr(MD5("Delete-Share-".$share_id.$_SESSION['token']),5,15)){
        $data = array(
            'status'=> 'Passive'
        );
        $success = $Share->updateShareById($data,$share_id);
        if($success){
            redirect('../share','success','Share has been deleted successfully.');
        }
        else{
            redirect('../share','error','Problem while deleting the share');
        }
    }
    else{
        redirect('../share','error','Deletion is not allowed to this user.');
    }
} else {
    redirect('../share', 'error', 'Access denied.');
}
