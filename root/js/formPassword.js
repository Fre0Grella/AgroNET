const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ?'text' : 'password';
        password.setAttribute('type', type);
        document.getElementById("togglePassword").classList.toggle('bi-eye');
});

function loginCheck() {
  var form = document.getElementById('loginForm');
  var formData = new FormData(form);
        
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '/AgroNET/root/php/login.php', true);
  xhr.send(formData);

}