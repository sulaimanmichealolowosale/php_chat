<?php
include '../path.php';
include(ROOT_PATH . '/app/controllers/messages.php');
if (!isset($_SESSION['id'])) {
    header('location: ' . BASE_URL . 'login');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Chat</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Lora&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">

</head>
<!--Coded With Love By Mutiullah Samim-->

<body>
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="form-group dashboard">

                <?php include ROOT_PATH . '/app/helpers/messages.php' ?>
                <?php include ROOT_PATH . '/app/helpers/errors.php' ?>

                <div class="profile-image">
                    <img src="<?php echo '../' . $login['profile_pic'] ?>" alt="Profile Picture" class="img-thumbnail">
                    <div class="btn">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#profilepic">Change Picture</button>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="input-group">
                        <label for="" class="text-capitalize">username:</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username'] ?>">
                    </div>
                    <div class="input-group">
                        <label for="" class="text-capitalize">email:</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['email'] ?>">
                    </div>
                    <div class="input-group">
                        <label for="" class="text-capitalize">change password:</label>
                        <button type="button" class="btn ml-5 text-white" data-toggle="modal" data-target="#changepassword">Change Password</button>
                    </div>
                    <input type="submit" value="Save" name="save" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="profilepic">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Choose Profile Picture</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="file" name="profile_pic" id="" class="input-group">
                            <input type="submit" value="Change" name="change_pic" class="btn btn-primary mt-4">
                        </form>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="changepassword">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <form action="" method="post">
                            <div class="input-group">
                                <label for="" class="text-capitalize">Old password:</label>
                                <input type="text" name="old_password" class="input-group">
                            </div>
                            <div class="input-group">
                                <label for="" class="text-capitalize">New password:</label>
                                <input type="text" name="password" class="input-group">
                            </div>
                            <input type="submit" value="Change" name="update_password" class="btn btn-primary mt-3">
                        </form>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>