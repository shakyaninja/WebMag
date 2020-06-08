<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
debugger($_POST);
if(isset($_POST)&&!empty($_POST)){
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $data = array(
            'email'=> $_POST['email'],
            'subject'=> $_POST['subject'],
            'message'=> $_POST['message']
        );
        debugger($data);
        $Contact = new contact();
        $success = $Contact->addContact($data);
        debugger($success);
        if($success){
            redirect('../thanks','success',"Thank you for messaging us!. You will soon be responded by our Team.");
        }
    }
    else{
        redirect('../index');
    }
}else{
    redirect('../index');
}
