<?php
require_once "../vendor/autoload.php";
$auth = new App\authenticate();
$auth->redirectIfNotAuth();

$animeObj = new \App\Anime();
$comment_id =$_GET['commentid'];
$a_id =$_GET['id'];
$comment_Info= $animeObj->getCommentByID($comment_id);
$animeObj->updateComment($comment_id, $a_id);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap-aot.css">
    <link rel="icon" href="../assets/favicon.png" >
    <title>Sign In</title>
</head>
<body class="bg-light d-flex flex-column min-vh-100">
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/navBar.php') ?>

<main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">

                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="mb-0 fw-bold">Update Comment</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="a_id" value="<?php echo $comment_id; ?>">
                                <label for="comments" class="form-label fw-semibold">Your Comment</label>
                                <textarea name="commentText" class="form-control rounded-3" id="comments" rows="3"><?php echo $comment_Info['content']?></textarea>
                            </div>
                            <button type="submit" name="UpdateCommentBtn" class="btn btn-primary rounded-pill px-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/footer.php') ?>

</body>
</html>