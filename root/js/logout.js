function logout() {
    fetch('../logout.php')
        .then(response => response.text())
        .then(data => {
            window.location.assign("../root/index.html");
        });
}

