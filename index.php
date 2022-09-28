<?php
include 'path.php';
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
    <link rel="stylesheet" href="assets/css/main.css">

</head>
<!--Coded With Love By Mutiullah Samim-->

<body>
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-4 col-xl-3 left-chat">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="user m-3">
                            <a href="<?php echo BASE_URL . 'dashboard' ?>?user_id=<?php echo $_SESSION['id'] ?>">
                                <img src="<?php echo $login['profile_pic'] ?>" class="img-rounded" width="50px">
                                <span class="username text-center text-white pl-2 font-weight-bold"><?php echo $_SESSION['username'] ?></span>
                            </a>
                            <a href="<?php echo BASE_URL . 'logout.php' ?>">
                                <span class="text-danger text-center pl-5">Logout</span>
                            </a>

                        </div>
                        <form action="" method="post">
                            <div class="input-group">
                                <input type="text" placeholder="Search..." name="search" class="form-control search">
                                <div class="input-group-prepend">
                                    <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body contacts_body">
                        <ul class="contacts">
                            <h6 class="text-center text-capitalize"><?php echo $type ?></h6>
                            <?php foreach ($users as $key => $user) : ?>
                                <a href="<?php echo BASE_URL ?>?chat_id=<?php echo $user['id'] ?>">
                                    <li class="active">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="<?php echo $user['profile_pic'] ?>" class="rounded-circle user_img">
                                                <?php if ($user['status'] === 'online') : ?>
                                                    <span class="online_icon"></span>
                                                <?php else : ?>
                                                    <span class="offline"></span>
                                                <?php endif;  ?>
                                            </div>
                                            <div class="user_info">
                                                <span> <?php echo $user['username'] ?></span>
                                                <?php if ($user['status'] === 'online') : ?>
                                                    <p><?php echo $user['username'] ?> is online</p>
                                                <?php else : ?>
                                                    <p><?php echo $user['username'] ?> is offline</p>
                                                <?php endif;  ?>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-8 col-xl-6 right-chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <?php if (isset($_GET['chat_id']) && !empty($_GET['chat_id'])) : ?>
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="<?php echo $chat['profile_pic'] ?>" class="rounded-circle user_img">
                                    <?php if ($chat['status'] === 'online') : ?>
                                        <span class="online_icon"></span>
                                    <?php else : ?>
                                        <span class="offline"></span>
                                    <?php endif; ?>
                                </div>
                                <div class="user_info">
                                    <span>Chat with <?php echo $chat['username'] ?></span>
                                </div>
                            </div>
                        <?php else :  ?>
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="" class="">
                                    <span class=""></span>
                                    <span class=""></span>
                                </div>
                                <div class="user_info">
                                    <span></span>
                                    <p></p>
                                </div>
                                <!-- <div class="video_cam">
                                <span><i class="fas fa-video"></i></span>
                                <span><i class="fas fa-phone"></i></span>
                            </div> -->
                            </div>
                        <?php endif; ?>
                        <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="action_menu">
                            <ul>
                                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-dark">
                                    <li class="text-white"><i class="fas fa-user-circle"></i> View profile</li>
                                </button>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body msg_card_body">
                        <?php if (isset($_GET['chat_id']) && !empty($_GET['chat_id'])) : ?>
                            <?php foreach ($messages as $key => $message) : ?>
                                <?php if ($message['sender_username'] == $_SESSION['username'] && $message['reciever_username'] == $chat['username']) : ?>
                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="msg_cotainer_send">
                                            <?php echo $message['body'] ?>
                                            <span class="msg_time_send"><?php echo date('l, F j, Y. h:i a', strtotime($message['created_at'])) ?>, <?php echo $message['status'] ?></span></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($message['sender_username'] == $chat['username'] && $message['reciever_username'] == $_SESSION['username']) : ?>
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="msg_cotainer">
                                            <?php echo $message['body'] ?>
                                            <span class="msg_time"><?php echo date('l, F j, Y. h:i a', strtotime($message['created_at'])) ?></span>
                                            <?php read($message['id']); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer">
                        <form action="" method="post">
                            <div class="input-group">
                                <input type="text" name="body" class="form-control type_msg" placeholder="Type your message...">
                                <div class="input-group-append">
                                    <button type="submit" name="send-msg" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Chat Profile</h4>
                        <span><?php echo $chat['status'] ?></span>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="">
                            <img src="<?php echo $chat['profile_pic'] ?>" alt="Profile picture" class="img-rounded" width="100px">
                        </div>
                        <div class="profile ">
                            <h4 class="text-center"><?php echo $chat['username'] ?></h4>
                            <h4 class="text-center"><?php echo $chat['email'] ?></h4>
                            <h6 class="text-center"><?php echo $chat['country'] ?></h6>
                            <h6 class="text-center"><?php echo $chat['gender'] ?></h6>
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
    <script src="assets/js/main.js"></script>
</body>

</html>