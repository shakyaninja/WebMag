<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
$Contact = new contact();
// debugger($_POST);
// if (isset($_POST) && !empty($_POST)) {
//     $data = array(
//         'email' => htmlentities($_POST['description']),
//         'subject'=> $_POST
//         'status' => 'Responded',
//         'added_by' => $_SESSION['user_id']
//     );
//     debugger($data);
//     if (!empty($_POST['id'])) {
//         //update
//         $search = $Contact->getContactbyId($_POST['id']);
//         if ($search) {
//             $act = 'Updat';
//         } else {
//             redirect('../contact','error','Cannot find contact.');
//         }
//         $success = $Contact->updateContactById($data, $_POST['id']);
//     } else {
//         //add
//         $act = 'Add';
//         $success = $Contact->addContact($data);
//     }
//     if ($success) {
//         redirect('../contact', 'success', $act . 'ed contact succesfully');
//     } else {
//         redirect('../contact', 'error', 'Problem while ' . $act . 'ing contact.');
//     }
// }
// for deletion
if (isset($_GET) && !empty($_GET)) {
    $contact_id = (int)$_GET['id'];
    debugger($_GET);
    if($_GET['act'] == substr(MD5("Delete-Contact-".$contact_id.$_SESSION['token']),5,15)){
        $data = array(
            'status'=> 'Responded'
        );
        $success = $Contact->updateContactById($data,$contact_id);
        if($success){
            redirect('../contacts','success','Contact has been Responded successfully.');
        }
        else{
            redirect('../contacts','error','Problem while Responding the contact');
        }
    }
    else{
        redirect('../contacts','error','Response is not allowed to this user.');
    }
} else {
    redirect('../contacts', 'error', 'Access denied.');
}
