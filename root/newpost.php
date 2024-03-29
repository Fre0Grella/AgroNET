<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NewPost</title>
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
      <form action="php/save_post.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="description">Descrizione:</label>
          <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="form-group">
          <label for="image">Carica una Foto:</label>
          <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        </div>
        <div class="row justify-content-center mb-2">
          <img id="preview" src="" alt="Preview" class="img-fluid">
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-dark btn-block" onclick="changePostType()">
            <div class="row justify-content-center">
              <div class="col-2">
                <img src="img/icon/greens.svg" class="img-fluid" id="typeImg" name="typeImg">
                <textarea class="form-control" id="category" name="category" rows="1" hidden required>0</textarea>
              </div>
            </div>
          </button>
        </div>
        <button type="submit" class="btn btn-success btn-block">Crea Post</button>
      </form>
    </main>
    <div class="spacer"></div>
  </div>
  <?php require("template/mainBar.php"); ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/newpost.js"></script>
  <script src="js/imgPreview.js"></script>
</body>
</html>
