<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $templateParams["title"]?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/notifications.css">
</head>
    <nav class="topBar">
    <img src="img/AgroNET_logo.png" draggable="false" class="img-fluid p-1" alt="Logo">
    </nav>
    <body>  
        <div class="main-spacer">
        <main>
        <?php foreach($templateParams["notifications"] as $notification): ?>
            <article>
                <div class="row">
                    <div class="col-1">
                        <img src="img/ProfilePic.jpeg" class="img-fluid"/>
                    </div>
                    <div class="col-8 border-bottom">
                        <div class="col-12 ">
                            <p><?php echo $notification["notification_text"] ?></p>
                        </div>
                    </div>
                    <div class="col-2 border-bottom">
                        <button type="button" class="btn-close float-right"></button>
                    </div>
                </div>
            </article>
        <?php endforeach;?>
        </main>
        <div class="spacer"></div>
        <?php require("mainBar.php"); ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>