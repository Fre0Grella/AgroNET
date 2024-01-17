function logout() {
    $.ajax({
        type: "POST",
        url: "logout.php",
        dataType: 'json', // tipo di dati atteso nella risposta
        success: function (response) {
            if (response.success) {
                window.location.href = 'login.html';
            } else {
                console.log(response.message);
            }
        },
        error: function (error) {
            console.log("Errore durante la chiamata AJAX");
        }
    });
}

