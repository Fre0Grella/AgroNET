function logout() { //this file still not work as expected
    // $.ajax({
    //     type: "POST",
    //     url: "logout.php",
    //     dataType: 'json', // tipo di dati atteso nella risposta
    //     success: function (response) {
    //         if (response.success) {
    //             window.location.href = 'login.html';
    //         } else {
    //             console.log(response.message);
    //         }
    //     },
    //     error: function (error) {
    //         console.log("Errore durante la chiamata AJAX");
    //     }
    // });
    fetch('../logout.php')
        .then(response => response.text())
        .then(data => {
            window.location.pathname = '/root/index.html';
        });

}

