for (i = 0; i < posts.length; i++) {
    const id = posts[i].id;
    posts[i].addEventListener('click', function(event) {
        window.location.href = "postView.php?id="+id;
    }) 
}