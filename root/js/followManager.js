function change() {
const temp = document.getElementsByTagName("button");
const btn = temp[0];
    const follow = "FOLLOW";
    const unfollow = "UNFOLLOW";
    if (btn.textContent == follow) {
      btn.textContent = unfollow;
    //   btn.style.backgroundColor = "101010 !important";
    } else {
        btn.textContent = follow;
        // btn.style.backgroundColor = "226037 !important";
    }
}