function registerUser() {
    alert("dentrooooo")
    var form = document.getElementById('registerForm');
    var formData = new FormData(form);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/AgroNET/root/php/register.php', true);
    xhr.onload = function() {
    if (xhr.readyState == 4 && xhr.status == 200) 
    {
      console.log(xhr.responseText);
      window.location.href = 'home.html';
    } 
    else if (xhr.readyState == 4) 
    {
      console.error('Errore durante la richiesta POST');
    }
    };
  xhr.send(formData);
  
}