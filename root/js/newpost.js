function createPost() {
    var form = document.getElementById('postForm');
    var formData = new FormData(form);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/AgroNET/root/php/save_post.php', true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        alert('Post creato con successo!');
      } else {
        alert('Errore durante la creazione del post. Codice HTTP:' + xhr.status );
      }
    };
    xhr.send(formData);
  }

function changePostType() {
  var tractor = "img/icon/tractor.svg"
  var greens = "img/icon/greens.svg"
  var img = document.getElementById('typeImg');
  var category = document.getElementById('category')
  if (category.getAttribute('value') == 'false') {
    img.setAttribute('src', greens);
    category.setAttribute('value', 'true');
  } else {
    img.setAttribute('src', tractor);
    category.setAttribute('value', 'false');
  }
}
  
