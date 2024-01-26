let profiles = document.getElementsByClassName("profileInfo");

for (i = 0; i < profiles.length; i++) {
    const id = profiles[i].id;
    profiles[i].addEventListener('click', function(event) {
        window.location.href = "profile.php?id="+id;
    }) 
}