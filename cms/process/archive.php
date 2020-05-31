<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
$Archive = new archive();
debugger($_POST);
if (isset($_POST) && !empty($_POST)) {
    $data = array(
        'date' => sanitize($_POST['archive_name']),
        'status' => 'Active',
        'added_by' => $_SESSION['user_id']
    );
    debugger($data);
    if (!empty($_POST['id'])) {
        //update
        $search = $Archive->getArchivebyId($_POST['id']);
        if ($search) {
            $act = 'Updat';
        } else {
            redirect('../archive','error','Cannot find archive.');
        }
        $success = $Archive->updateArchiveById($data, $_POST['id']);
    } else {
        //add
        $act = 'Add';
        $success = $Archive->addArchive($data);
    }
    if ($success) {
        redirect('../archive', 'success', $act . 'ed archive succesfully');
    } else {
        redirect('../archive', 'error', 'Problem while ' . $act . 'ing archive.');
    }
}
// for deletion
else if (isset($_GET) && !empty($_GET)) {
    $archive_id = (int)$_GET['id'];
    debugger($_GET);
    if($_GET['act'] == substr(MD5("Delete-Archive-".$archive_id.$_SESSION['token']),5,15)){
        $data = array(
            'status'=> 'Passive'
        );
        $success = $Archive->updateArchiveById($data,$archive_id);
        if($success){
            redirect('../archive','success','Archive has been deleted successfully.');
        }
        else{
            redirect('../archive','error','Problem while deleting the archive');
        }
    }
    else{
        redirect('../archive','error','Deletion is not allowed to this user.');
    }
} else {
    redirect('../archive', 'error', 'Access denied.');
}
