<?php
include '../path.php';
include(ROOT_PATH . '/app/controllers/users.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat-Register</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Lora&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/main.css">

<body>

    <div class="container">
        <div class="form">
            <form action="" method="post">
                <div class="form-header">
                    <h2 class="text-center text-uppercase">register</h2>
                    <p class="text-center text-capitalize ">Sign up to my chat</p>
                </div>
                <?php include ROOT_PATH . '/app/helpers/errors.php' ?>
                <input type="hidden" name="profile_pic">
                <div class="form-group">
                    <label for="username" class="text-capitalize">username:</label>
                    <input type="text" name="username" id="" class="form-control" value="<?php echo $username ?>">
                </div>
                <div class="form-group">
                    <label for="email" class="text-capitalize">email:</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="someone@someone.com" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <label for="country" class="text-capitalize">country:</label>
                    <select name="country" id="" class="form-control">
                        <option value="" disabled>Select your country</option>
                        <option value="nigeria">Nigeria</option>
                        <option value="germany">Germany</option>
                        <option value="canada">Canada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender" class="text-capitalize">gender:</label>
                    <select name="gender" id="" class="form-control">
                        <option value="" disabled>choose your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password" class="text-capitalize">password:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="text-capitalize">confirm-password:</label>
                    <input type="password" name="password-confirm" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_answer" class="text-capitalize">password recovery:</label>
                    <input type="text" name="password_answer" class="form-control" placeholder="Pet's Name">
                </div>
                <div class="form-footer">
                    <div class="submit">
                        <input type="submit" value="Register" name="register" class="btn btn-primary btn-block">
                    </div>
                    <p class="small text-capitalize text-center">already registered? login <a href="<?php echo BASE_URL . 'login/' ?>">here</a></p>

                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ba098fff36.js" crossorigin="anonymous"></script>
</body>

</html>