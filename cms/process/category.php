<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
$Category = new category();
debugger($_POST);
if (isset($_POST) && !empty($_POST)) {
    $data = array(
        'categoryname' => sanitize($_POST['category_name']),
        'description' => htmlentities($_POST['description']),
        'status' => 'Active',
        'added_by' => $_SESSION['user_id']
    );
    debugger($data);
    if (!empty($_POST['id'])) {
        //update
        $search = $Category->getCategorybyId($_POST['id']);
        if ($search) {
            $act = 'Updat';
        } else {
            redirect('../category','error','Cannot find category.');
        }
        $success = $Category->updateCategoryById($data, $_POST['id']);
    } else {
        //add
        $act = 'Add';
        $success = $Category->addCategory($data);
    }
    if ($success) {
        redirect('../category', 'success', $act . 'ed category succesfully');
    } else {
        redirect('../category', 'error', 'Problem while ' . $act . 'ing category.');
    }
}
// for deletion
else if (isset($_GET) && !empty($_GET)) {
    $category_id = (int)$_GET['id'];
    debugger($_GET);
    if($_GET['act'] == substr(MD5("Delete-Category-".$category_id.$_SESSION['token']),5,15)){
        $data = array(
            'status'=> 'Passive'
        );
        $success = $Category->updateCategoryById($data,$category_id);
        if($success){
            redirect('../category','success','Category has been deleted successfully.');
        }
        else{
            redirect('../category','error','Problem while deleting the category');
        }
    }
    else{
        redirect('../category','error','Deletion is not allowed to this user.');
    }
} else {
    redirect('../category', 'error', 'Access denied.');
}
