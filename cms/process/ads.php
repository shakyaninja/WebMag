<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
$Ads = new ads();
debugger($_POST);
debugger($_FILES);
debugger($_GET);
if (isset($_POST) && !empty($_POST)) {
    $data = array(
        'vendor_name' => sanitize($_POST['vendor_name']),
		'url' => htmlentities($_POST['url']),
		'adType' => sanitize($_POST['adType']),
        'status' => 'Active',
        'added_by' => $_SESSION['user_id']
	);
	debugger($data);
	if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['image']) && $_FILES['image']['error'] == 0) {
		$success=uploadImage($_FILES['image'],'ads');
		debugger($success);
		if ($success != false) { //updated
			$data['image'] = $success;
			debugger($data);
			if (isset($_POST['old_img']) && !empty($_POST['old_img']) && file_exists(UPLOAD_PATH.'ads/'.$_POST['old_img'])) {
				unlink(UPLOAD_PATH.'ads/'.$_POST['old_img']);
			}
		}else{
			redirect('../ads','error','Error while uploading Image');
		}
	}

    if (!empty($_POST['id'])) {
        //update
        $search = $Ads->getAdsbyId($_POST['id']);
        if ($search) {
            $act = 'Updat';
        } else {
            redirect('../ads','error','Cannot find ads.');
        }
        $success = $Ads->updateAdsById($data, $_POST['id']);
    } else {
        //add
        $act = 'Add';
        $success = $Ads->addAds($data);
	}
	
    if ($success != false) { //updated
        redirect('../ads', 'success', $act . 'ed ads succesfully');
    } else {
        redirect('../ads', 'error', 'Problem while ' . $act . 'ing ads.');
    }
}
// for deletion
else if (isset($_GET) && !empty($_GET)) {
    $ads_id = (int)$_GET['id'];
    debugger($_GET);
    if($_GET['act'] == substr(MD5("Delete-Ads-".$ads_id.$_SESSION['token']),5,15)){
        $data = array(
            'status'=> 'Passive'
        );
        $success = $Ads->updateAdsById($data,$ads_id);
        if($success){
            redirect('../ads','success','Ads has been deleted successfully.');
        }
        else{
            redirect('../ads','error','Problem while deleting the ads');
        }
    }
    else{
        redirect('../ads','error','Deletion is not allowed to this user.');
    }
}else {
    redirect('../ads', 'error', 'Access denied.');
}
