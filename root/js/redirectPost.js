var posts = document.getElementsByTagName("article");

for (i = 0; i < posts.length; i++) {
    posts[i].addEventListener('click', function(event) {
        windows.location.href = "postView.php?id="+posts[i].id;
    }) 
}