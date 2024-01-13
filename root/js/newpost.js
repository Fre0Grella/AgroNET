function createPost() {
    var form = document.getElementById('postForm');
    var formData = new FormData(form);
  
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_post.php', true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        alert('Post creato con successo!');
      } else {
        alert('Errore durante la creazione del post.');
      }
    };
    xhr.send(formData);
  }
  