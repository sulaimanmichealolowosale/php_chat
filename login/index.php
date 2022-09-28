<?php
include '../path.php';
include(ROOT_PATH . '/app/controllers/users.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat-Login</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Lora&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/main.css">

<body>
    <div class="container">
        <div class="form">
            <form action="" method="post">
                <div class="form-header">
                    <h2 class="text-center text-uppercase">login</h2>
                    <p class="text-center text-capitalize ">Sign in to my chat</p>
                </div>
                <?php include ROOT_PATH . '/app/helpers/errors.php' ?>
                <div class="form-group">
                    <label for="email" class="text-capitalize">email:</label>
                    <input type="text" name="email" id="" class="form-control" value="<?php echo $email ?>">
                </div>
                <input type="hidden" name="status">
                <div class="form-group">
                    <label for="password" class="text-capitalize">password:</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <a href="<?php echo BASE_URL . "forgot_password" ?>" class="text-warning text-text-capitalize">forgot password</a>
                </div>
                <div class="form-footer">
                    <div class="submit">
                        <input type="submit" value="Login" name="login" class="btn btn-primary btn-block">
                    </div>
                    <p class="small text-capitalize text-center">not registered? register <a href="<?php echo BASE_URL . 'register/' ?>">here</a></p>

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