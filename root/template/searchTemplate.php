<!DOCTYPE html>
<html lang="it">
    <head>
        <title><?php echo $templateParams["title"]?></title>
        <meta charset="UTF-8"/>   
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="js/searchBar.js"></script>
    </head>
    <body>
        
        <nav class="topBar">
            <img src="img/icon/greens.svg" draggable="false" class="img-fluid">
            <input class="slider" type="range" min="1" max="3" value="2" id="myRange" >
            <img src="img/icon/tractor.svg" draggable="false" class="img-fluid">    
        </nav>
        
        <div class="main-spacer">
        <main>
            <div class="searchBar">
                <input type="search"
                id="form1"
                class="form-control form-control-lg focus-ring focus-ring-dark"
                placeholder="  What you're searching for. . ."/>
            </div>
            <?php foreach($templateParams["allPost"] as $postFeed): ?>
            <article id="<?php echo $postFeed["post_id"];?>">
                <div class="row justify-content-around">
                    <div class="col-12">
                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $postFeed["image_data"] ) .'"';?>" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <header> <?php echo $postFeed["username"];?> </header>
                    </div>
                    <div class="col-2 p-0">
                        <img src="<?php if (!array_key_exists("user_profile",$postFeed)) {
                            echo 'img/defaultUserProfile.svg';
                        } else {
                            echo 'data:image/jpeg;base64,' . base64_encode( $postFeed["user_profile"] ) .'"';
                        } ?>" class="img-fluid">
                    </div>
                </div> 
            </article>
        <?php endforeach; ?>
        </main>
        <div class="spacer"></div>
    </div>
        <nav id="botBar">
            <a href="home.php"><img src="img/icon/home.svg" draggable="false" class="img-fluid p-2 change"></a>
            <a href="search.php"><img src="img/icon/search.svg" draggable="false" class="img-fluid p-2 change"></a>
            <a href="newpost.html"><img src="img/icon/addPhoto.svg" draggable="false" class="img-fluid p-2 change"></a>
            <a href="profileSettings.html"><img src="img/icon/settings.svg" draggable="false" class="img-fluid p-2 change"></a>
            <a href="profile.php"><img src="img/icon/profile.svg" draggable="false" class="img-fluid p-2 change"></a>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
      </script>
      <script src="js/slider.js"></script>
    </body>
</html>
