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
        <?php require("sliderBar.php");?>
        <div class="main-spacer">
        <main>
            <div class="searchBar">
                <input type="search"
                id="form1"
                class="form-control form-control-lg focus-ring focus-ring-dark"
                placeholder="  What you're searching for. . ."/>
            </div>
            <?php 
             include("postFeed.php");?>
            <?php echo showPosts($templateParams["allPosts"]); ?>

        </main>
        <div class="spacer"></div>
    </div>
        <?php require("mainBar.php");?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
      </script>
      <script src="js/slider.js"></script>
      <script src="js/redirectPost.js"></script>
    </body>
</html>
