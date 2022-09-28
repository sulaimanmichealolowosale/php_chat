<?php
function validate_user()
{
    $errors = array();
    if (empty($_POST['username'])) {
        array_push($errors, 'username is empty');
    }
    if (empty($_POST['email'])) {
        array_push($errors, 'email is empty');
    }
    if (empty($_POST['password'])) {
        array_push($errors, 'password is empty');
    } elseif ($_POST['password'] != $_POST['password-confirm']) {
        array_push($errors, 'password mismatch');
    }
    if (strlen($_POST['password']) < 8) {
        array_push($errors, 'password should not be less than 8 characters');
    }

    if (empty($_POST['password_answer'])) {
        array_push($errors, 'you need a password recovery answer');
    }

    $existingemail = select_one('users', ['email' => $_POST['email']]);
    if ($existingemail) {
        array_push($errors, 'email already exists');
    }
    return $errors;
}



function validate_user_login()
{
    $errors = array();
    if (empty($_POST['email'])) {
        array_push($errors, 'email is empty');
    }

    if (empty($_POST['password'])) {
        array_push($errors, 'password is empty');
    }
    return $errors;
}


function validate_recovery()
{
    $errors = array();
    if (empty($_POST['email'])) {
        array_push($errors, 'email is needed');
    }
    if (empty($_POST['answer'])) {
        array_push($errors, 'recovery answer is needed');
    }
    return $errors;
}


function validate_password()
{
    $errors = array();
    if (empty($_POST['password'])) {
        array_push($errors, 'please chooose a password');
    }
    if ($_POST['password'] != $_POST['password-conf']) {
        array_push($errors, 'password mismatch');
    }
    return $errors;
}


function validate_change_password()
{
    $errors = array();
    if (empty($_POST['old_password'])) {
        array_push($errors, 'enter your old password');
    }
    if (empty($_POST['password'])) {
        array_push($errors, 'enter a new password password');
    }
    if (strlen($_POST['password']) < 8) {
        array_push($errors, '');
    }
    return $errors;
}

function validate_image()
{
    $errors = array();
    if (empty($_FILES['profile_pic']['name'])) {
        array_push($errors, 'picture not selected');
    }
    return $errors;
}
