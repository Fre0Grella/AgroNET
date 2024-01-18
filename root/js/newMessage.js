function createMessage() {
    var form = document.getElementById('messageForm');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/root/php/save_message.php', true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("Message sent");
        }
    };
    xmlhttp.send(formData);
}