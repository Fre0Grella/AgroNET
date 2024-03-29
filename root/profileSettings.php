<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile - Settings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/newpost.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="topBar">
    <img src="img/AgroNET_logo.png" draggable="false" class="img-fluid p-1" alt="Logo">
</nav>

<div class="main-spacer">
    <main>
        <form id="postForm" method="post" action="php/setProfile.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Current Username">
            </div>

            <div class="form-group">
                <label for="description">Descrizione:</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Carica una Foto:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            </div>

            <div class="row justify-content-center mb-2">
                <img id="preview" src="" alt="Preview" class="img-fluid">
            </div>

            <button type="submit" class="btn btn-success btn-block p-3">Modifica</button>
            <button type="button" class="btn btn-danger btn-block" onclick="logout()">Log out</button>
        </form>
    </main>
    <div class="spacer"></div>
</div>

<?php require("template/mainBar.php"); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/imgPreview.js"></script>
<script src="js/logout.js"></script>

</body>
</html>
