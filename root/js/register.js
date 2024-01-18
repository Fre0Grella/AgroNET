function registerUser() {
    var form = document.getElementById('registerForm');
    var formData = new FormData(form);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/root/php/register.php', true);
    xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) 
    {
      window.location.href = 'home.html';
    } 
    else if (xhr.readyState == 4) 
    {
      console.error('Errore durante la richiesta POST');
    }
    };
  xhr.send(formData);
  
}