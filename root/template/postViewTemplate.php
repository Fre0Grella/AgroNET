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
        <div class="row">
            <div class="postCol border-bottom ">
                <article>
                    <div class="row justify-content-center">
                        <div class="col-9 p-1 mb-2">
                            <h5 class="text-start"><?php echo $templateParams["postInfo"]["username"]; ?></h5>
                        </div>
                        <div class="col-2 p-0 mb-2">
                            <img src="<?php echo $templateParams["postInfo"]["user_profile"]; ?>" class="img-fluid">
                        </div>
                        <div class="col-12">
                            <img src="<?php echo $templateParams["postInfo"]["image_data"]; ?>" class="img-fluid">
                        </div>
                        
                        <div class="col-9 p-1">
                            <h5 class="text-end "><?php echo $templateParams["likeNumber"]; ?></h5>
                        </div>
                        <div class="col-2 p-0">
                            <img src="img/icon/hearth.svg" class="img-fluid">
                        </div>
                        <div class="col-12 text-left">
                            <p><?php echo $templateParams["postInfo"]["description"]; ?></p>
                        </div>
                        <div class="col-12">
                            <input type="text" id="form1" class="form-control form-control-lg focus-ring focus-ring-dark" placeholder="  Type for comment. . ."/>
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
                                <img src="<?php echo $comment["user_profile"]; ?>" class="img-fluid"/>
                            </div>
                            <div class="col-10">
                                <div class="col-12">
                                    <h2><?php echo $comment["username"];?></h2>
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
    <nav id="botBar">
        <a href="home.html"><img src="img/icon/home.svg" draggable="false" class="img-fluid p-2 change"></a>
        <a href="search.html"><img src="img/icon/search.svg" draggable="false" class="img-fluid p-2 change"></a>
        <a href="newpost.html"><img src="img/icon/addPhoto.svg" draggable="false" class="img-fluid p-2 change"></a>
        <a href="profileSettings.html"><img src="img/icon/settings.svg" draggable="false" class="img-fluid p-2 change"></a>
        <a href="profile.html"><img src="img/icon/profile.svg" draggable="false" class="img-fluid p-2 change"></a>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
      </script>
</body>
</html>