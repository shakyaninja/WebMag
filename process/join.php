<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
debugger($_POST);
if(isset($_POST)&&!empty($_POST)){
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $data = array(
            'email'=> $_POST['email']
        );
        debugger($data);
        $Subscriber = new subscriber();
        $subscriber = $Subscriber->getSubscriberByEmail($_POST['email']);
        if($subscriber){
            redirect('../index','success','You have already subscribed to our newsletter.');
        }else{
            $success = $Subscriber->addSubscriber($data);
            debugger($success);
            if($success){
                redirect('../index','success',"You have subscribed to our newsletter. Thank you!");
            }
        }
    }
    else{
        redirect('../index');
    }
}else{
    redirect('../index');
}


?>