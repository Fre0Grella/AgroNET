<?php
function showPost(array $allPosts) {
    foreach ($allPosts as $postFeed):
?>
        <article id="<?php echo $postFeed["post_id"]; ?>" class="<?php echo $postFeed["category"] ?>">
            <div class="row justify-content-around">
                <div class="col-12">
                    <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($postFeed["image_data"]) ?>" class="img-fluid">
                </div>
                <div class="col-8 mt-2">
                    <header class="text-truncate"><?php echo $postFeed["username"]; ?></header>
                </div>
                <div class="col-2 p-0 mt-1">
                    <img src="<?php
                        if (!($postFeed["profile_image"])) {
                            echo 'img/defaultUserProfile.svg';
                        } else {
                            echo 'data:image/jpeg;base64,' . base64_encode($postFeed["profile_image"]) . '"';
                        } ?>" class="img-fluid">
                </div>
            </div>
        </article>
<?php
    endforeach;
}
?>
