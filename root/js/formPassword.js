const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ?'text' : 'password';
        password.setAttribute('type', type);
        document.getElementById("togglePassword").classList.toggle('bi-eye');
});

function loginCheck() {
        var form = document.getElementById('button-login');
        var formData = new FormData(form);
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/login.php', true);
        xhr.onload = function() {
          if (xhr.status === 200) {
            alert('Post creato con successo!');
          } else {
            alert('Errore durante la creazione del post. Codice HTTP:' + xhr.status );
          }
        };
        xhr.send(formData);
      }