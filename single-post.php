
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>


<?php include "header.php"; ?>
<?php include "dbaza.php"; ?>


<?php
if(isset($_GET['Post_id'])){
    $post_id = $_GET['Post_id'];
    $select_post_from_db = "SELECT * FROM posts WHERE Id = $post_id";
    $one_post_from_db = fetchData($connection, $select_post_from_db);
    //  dump($one_post_from_db);


    $select_comments_from_db = "SELECT Author, text FROM comments WHERE Post_id = $post_id";
    $comments_for_one_post = fetchData($connection, $select_comments_from_db, true);
    //  dump($comments_for_one_post);
}

?>

  <div class="blog-post">
                
                <h2 class="blog-post-title"><?php echo $one_post_from_db['Title']?></h2>
                <p class="blog-post-meta"><?php echo $one_post_from_db['Created_at']?> by <?php echo $one_post_from_db['Author']?></p>
                <p><?php echo $one_post_from_db['Body']?></p>
            </div>

<div class="comments">
                <h5>Comments:</h5>
                <ul>
                <?php for($i = 0; $i < count($comments_for_one_post); $i++ ){ ?>
                    <li>
                        <p>by: <?php echo $comments_for_one_post[$i]['Author']?></p>
                        <p><?php echo $comments_for_one_post[$i]['text']?></p>
                        <hr>
                    </li>
                    <?php } ?>
                </ul>
            </div>
    

<?php include "sidebar.php"; ?>

<?php include "footer.php"; ?>


<body>
</body>
</html>
