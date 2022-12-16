<<?php
    include "header.php";
    include "dbaza.php";


    $select_posts_from_db = "SELECT * FROM posts";
    $posts_from_db = fetchData($connection, $select_posts_from_db, true);
dump($posts_from_db);

    ?> <div class="col-sm-8 blog-main">
    <div class="blog-post">
        <?php for ($i = 0; $i < count($posts_from_db); $i++) { ?>
       
            <h2 class="blog-post-title">
                <a class="linkNaslovi" href="single-post.php?Post_id=<?php echo $posts_from_db[$i]['Id'] ?>" class="blog-post-title">
                    <?php echo $posts_from_db[$i]['Title'] ?>
                </a>
            </h2>
            <p class="blog-post-meta"><?php echo $posts_from_db[$i]['Created_at'] ?> by <a href="#"><?php echo $posts_from_db[$i]['Author'] ?></a></p>
            <p><?php echo $posts_from_db[$i]['Body'] ?></p>
        <?php } ?>

    </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->

    <?php include "footer.php"; ?>