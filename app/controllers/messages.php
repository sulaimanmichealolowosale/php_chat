<?php
include(ROOT_PATH . '/app/controllers/users.php');
$table = 'messages';
$body = '';
$messages = select_all($table);
if (isset($_GET['chat_id'])) {
    $reciever_username = $chat['username'];
} else {
    $reciever_username = '';
}
$sender_username = $_SESSION['username'];

if (isset($_POST['send-msg'])) {
    if (empty($_POST['body'])) {
        echo "<script>alert('You cannot send an empty message')</script>";
    } else {
        $body = $_POST['body'];
        $data = [
            'sender_username' => $sender_username,
            'reciever_username' => $reciever_username,
            'body' => $body,
            'status' => 'Unread'
        ];
        $message = insert($table, $data);
        $messages = select_all($table);
    }
}

function read($id)
{
    global $table;
    $message = select_one($table, ['status' => 'Unread']);
    if ($message) {
        $data = [
            'status' => 'Read'
        ];
        $read = update($table, $data, $id);
    }
}
