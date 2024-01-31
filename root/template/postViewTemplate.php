<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $templateParams["title"]; ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/postView.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
</head>
<body>
    <nav class="topBar">
        <img src="img/AgroNET_logo.png" draggable="false" class="img-fluid p-1" alt="Logo">
    </nav>
    <div class="main-spacer">
        <main>
            <div class="row p-0 m-0">
                <div class="postCol border-bottom">
                    <article>
                        <div class="row justify-content-center">
                            <div id="<?php echo $templateParams["postInfo"]["user_id"]?>" class="col-9 p-1 mb-2 profileInfo">
                                <h2 class="text-start text-truncate text-wrap"><?php echo $templateParams["postInfo"]["username"]; ?></h2>
                            </div>
                            <div class="col-2 p-0 mb-2">
                                <img id="<?php echo $templateParams["postInfo"]["user_id"]?>" src="<?php
                                    if (!($templateParams["postInfo"]["profile_image"])) {
                                        echo 'img/defaultUserProfile.svg';
                                    } else {
                                        echo 'data:image/jpeg;base64,' . base64_encode($templateParams["postInfo"]["profile_image"]) . '"';
                                    } ?>" class="img-fluid profileInfo">
                            </div>
                            <div class="col-12">
                                <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($templateParams["postInfo"]["image_data"]) ?>" class="img-fluid">
                            </div>
                            <div class="col-9 p-1">
                                <h4 class="text-end mt-3"><?php echo $templateParams["postInfo"]["nLike"]; ?></h5>
                            </div>
                            <div class="col-2 p-0">
                                <form method="get" action="php/likeManager.php">
                                    <div class="form-group">
                                        <button name="like" value="<?php echo $_GET["id"];?>" class="form-group">
                                            <?php if($templateParams["isLiked"]): ?>
                                                <img src="img/icon/hearthLiked.svg" class="img-fluid">
                                            <?php else: ?>
                                                <img src="img/icon/hearth.svg" class="img-fluid">
                                            <?php endif; ?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 text-left">
                                <p class="text-truncate text-wrap"><?php echo $templateParams["postInfo"]["description"]; ?></p>
                            </div>
                            <div class="col-12">
                                <form method="post" action="php/save_comment.php?id=<?php echo $_GET["id"]; ?>">
                                    <input type="text" name="comment" class="form-control form-control-lg focus-ring focus-ring-dark" placeholder="  Type for comment. . ."/>
                                </form>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="commentCol">
                    <?php foreach($templateParams["comment"] as $comment): ?>
                        <div class="row">
                            <div class="col-12 border-bottom mb-2">
                                <div class="row">
                                    <div class="col-2">
                                        <img id="<?php echo $comment["user_id"]?>" src="<?php
                                            if (!($comment["profile_image"])) {
                                                echo 'img/defaultUserProfile.svg';
                                            } else {
                                                echo 'data:image/jpeg;base64,' . base64_encode($comment["profile_image"]) . '"';
                                            } ?>" class="img-fluid profileInfo">
                                    </div>
                                    <div class="col-10">
                                        <div class="col-12">
                                            <time class="commentTime"><?php echo $comment["created_at"] ?></time>
                                            <h4><?php echo $comment["username"];?></h4>
                                        </div>
                                        <div class="col-12">
                                            <p><?php echo $comment["comment_text"];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
        <div class="spacer"></div>
    </div>
    <?php require("mainBar.php"); ?>
    <script src="js/redirectProfile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous">
    </script>
</body>
</html>
