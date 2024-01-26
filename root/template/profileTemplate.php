<!DOCTYPE html>
<html lang="it">
    <head>
        <title><?php echo $templateParams["title"];?> </title>
        <meta charset="UTF-8"/>   
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/profile.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="js/searchBar.js"></script>
    </head>
    <body>
        <?php require("sliderBar.php"); ?>
        <div class="main-spacer">
        <main>
            <div class="searchBar border-bottom">
                <div class="container-fluid ">
                    <div class="row text-center">
                        <div class="col-4">
                            <img src="<?php if (!($templateParams["info"]["profile_image"])) {
                            echo 'img/defaultUserProfile.svg';
                        } else {
                            echo 'data:image/jpeg;base64,' . base64_encode( $templateParams["info"]["profile_image"] ) .'"';
                        } ?>" class="img-fluid p-3" id="profilePic">
                        </div>
                        <div class="col-8">
                            <div class="row text-start justify-content-beetween">
                                <div class="col-12"><h1><?php echo $templateParams["info"]["username"];?></h1></div>
                                <div class="col-6 "><h2>follower: <?php echo $templateParams["follower"]["nFollowers"]; ?></h2></div>
                                <div class="col-6 "><h2>followed: <?php echo $templateParams["followed"]["nFollowed"]; ?></h2></div>
                                <div class="col-12">
                                    <p><?php echo $templateParams["info"]["bio"]; ?> </p>
                                </div>
                            </div>
                            <div class="row justify-content-around text-center">
                                <div class="col-10">
                                    <?php if($_SESSION["user_id"] != $user_id) : ?>
                                    <form method="get" action="php/followManager.php">
                                        <div class="form-group">
                                            <button name="button" value="<?php echo $user_id;?>" class="btn btn-block fs-3 fw-medium form-control" >
                                            <?php if($templateParams["isFollow"]): ?>
                                                UNFOLLOW
                                            <?php else : ?>
                                                FOLLOW
                                            <?php endif; ?>
                                            </button>
                                        </div>
                                    </form>
                                    <?php else : ?>
                                    <a id="notificationbtn" href="notifications.php" role="button" class="btn btn-block fs-3 fw-medium form-control">
                                        NOTIFICHE
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach($templateParams["allPost"] as $postFeed): ?>
            
            <article id="<?php echo $postFeed["post_id"];?>" class="<?php echo $postFeed["category"]?>">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $postFeed["image_data"] ) .'"';?>" class="img-fluid">
                    </div>
                    <div class="col-9 p-1 mt-2">
                        <h5 class="text-end "><?php echo $postFeed["nLike"] ?></h5>
                    </div>
                    <div class="col-2 p-0 mt-1">
                        <img src="img/icon/hearth.svg" class="img-fluid">
                    </div>
                    
                </div>
            </article>
            <?php endforeach; ?>              
        </main>
        <div class="spacer"></div>
    </div>
        <?php require("mainBar.php"); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
      </script>
      <script src="js/slider.js"></script>
      <script src="js/redirectPost.js"></script>
    </body>
</html>
