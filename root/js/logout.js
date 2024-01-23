function logout() {
    fetch('../logout.php')
        .then(response => response.text())
        .then(() => {
            window.location.assign("../root/index.html");
        });
}