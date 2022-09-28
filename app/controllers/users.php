<?php
include(ROOT_PATH . '/app/database/functions.php');
include(ROOT_PATH . '/app/helpers/validate_user.php');
$table = 'users';
$profile_pic = '';
$image_size = '';
$username = '';
$email = '';
$password = '';
$password_conf = '';
$answer = '';
$type = 'No User';
$errors = array();

if (isset($_POST['search'])) {
    $type = $_POST['search'];
    $users = search($_POST['search']);
} else {
    $type='All users';
    $users = select_all($table);
}

if (isset($_POST['register'])) {
    if ($_POST['gender'] === 'male') {
        $profile_pic = 'assets/images/male.jpeg';
    } elseif ($_POST['gender'] === 'female') {
        $profile_pic = 'assets/images/Female.png';
    } else {
        $profile_pic = 'assets/images/others.jpeg';
    }
    $errors = validate_user();
    if (count($errors) === 0) {
        $_POST['profile_pic'] = $profile_pic;
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        unset($_POST['register'], $_POST['password-confirm']);
        $user = insert($table, $_POST);
        header('location: ' . BASE_URL . 'login');
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
    }
}

if (isset($_POST['login'])) {
    $errors = validate_user_login();
    if (count($errors) === 0) {
        $users = select_one('users', ['email' => $_POST['email']]);
        if ($users && password_verify($_POST['password'], $users['password'])) {
            unset($_POST['email'], $_POST['password'], $_POST['login']);
            $id = $users['id'];
            $_POST['status'] = 'online';
            $online = update($table, $_POST, $id);
            echo "<script>alert('You are logged in')</script>";
            $_SESSION['id'] = $users['id'];
            $_SESSION['username'] = $users['username'];
            $_SESSION['email'] = $users['email'];
            $_SESSION['profile_pic'] = $users['profile_pic'];
            header('location:' . BASE_URL);
        } else {
            array_push($errors, 'wrong credentials');
        }
    } else {
        $email = $_POST['email'];
    }
}

if (isset($_POST['recover'])) {
    $errors = validate_recovery();
    if (count($errors) === 0) {
        $email = $_POST['email'];
        $answer = $_POST['answer'];
        $recover = select_one($table, ['email' => $email, 'password_answer' => $answer]);
        if ($recover) {
            $pass_id = $recover['id'];
            $_SESSION['recovery_answer'] = $recover['password_answer'];
            header('location: ' . BASE_URL . 'change_password?pass_id=' . $pass_id);
        } else {
            array_push($errors, 'wrong details');
        }
    } else {
        $email = $_POST['email'];
        $answer = $_POST['answer'];
    }
}

if (isset($_POST['change_password'])) {
    $pass_id = $_GET['pass_id'];
    $errors = validate_password();
    if (count($errors) === 0) {
        unset($_POST['change_password'], $_POST['password-conf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_pass = update($table, $_POST, $pass_id);
        header('location: ' . BASE_URL . 'login.php');
    }
}

if (isset($_GET['chat_id'])) {
    $id = $_GET['chat_id'];
    $chat = select_one($table, ['id' => $id]);
} else {
    $chat = '';
}





// DASHBOARD CONTROLLERS | CHANGE PROFILE PICTURE
if (isset($_SESSION['id'])) {
    $login = select_one($table, ['id' => $_SESSION['id']]);
}

if (isset($_POST['save'])) {
    header('location: ' . BASE_URL);
}

if (isset($_POST['change_pic'])) {
    $errors = validate_image();
    if (count($errors) === 0) {
        $name = $_FILES['profile_pic']['name'];
        $target = ROOT_PATH .  '/assets/images/' . $name;
        $move = move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
        $id = $login['id'];
        if ($move) {
            $profile_pic = 'assets/images/';
            $profile_pic = $profile_pic . $_FILES['profile_pic']['name'];
            $data = ['profile_pic' => $profile_pic];
            $new_pic = update($table, $data, $id);
            $_SESSION['message'] = 'Profilr Picture Updated Successfully';
        }
    }
}


// DASHBOARD CONTROLLERS | CHANGE PASSWORD

if (isset($_POST['update_password'])) {
    $errors = validate_change_password();
    if (count($errors) === 0) {
        $password = password_verify($_POST['old_password'], $login['password']);
        $password_conf = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($password) {
            $id = $login['id'];
            $data = ['password' => $password_conf];
            $user = update($table, $data, $id);
            $_SESSION['message'] = 'Password Changed successfully';
        }
    }
}
