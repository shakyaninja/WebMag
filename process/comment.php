<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
$Comment = new comment();
debugger($_POST);
if (isset($_POST) && !empty($_POST)) {
    $act = "Add";
    $data = array(
        'name' => sanitize($_POST['name']),
        'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
        'website' => filter_var($_POST['website'], FILTER_VALIDATE_URL),
        'message' => sanitize(htmlentities($_POST['message'])),
        'state' => 'waiting',
        'status' => 'Active',
        'blogid' => (int) $_POST['blogid']
    );
    // debugger($data);
    if (!empty($_POST['commentid'])) {
        //reply
        $comment_id = (int) $_POST['commentid'];
        $data['commentType'] = 'reply';
        $data['commentid'] = $comment_id;
    } else {
        //comment
        $comment_id = false;
        $data['commentType'] = 'comment';
    }
    // further verifying comment for reply
    if ($comment_id) {
        $comment_info = $Comment->getCommentbyId($comment_id);
        if ($comment_info) {
            $success = $Comment->addComment($data);
        } else {
            redirect('../blog-post?id='.$data['blogid'], 'error', 'Comment not found');
        }
        if ($success) {
            redirect('../blog-post?id='.$data['blogid'], 'success', $act . 'ed reply succesfully');
        } else {
            redirect('../blog-post?id='.$data['blogid'], 'error', 'Problem while ' . $act . 'ing reply.');
        }
    } else {
        debugger($data);
        $success = $Comment->addComment($data);
        debugger($success);
        if ($success) {
            redirect('../blog-post?id='.$data['blogid'], 'success', $act . 'ed comment succesfully');
        } else {
            redirect('../blog-post?id='.$data['blogid'], 'error', 'problem while' . $act . 'ing comment');
        }
    }
} else {
    redirect('../blog-post?id='.$data['blogid'], 'error', 'No comment Found');
}
