<?php
require_once "../vendor/autoload.php";

$auth = new App\authenticate();
$auth->redirectIfNotAuth();

$animeObj = new \App\Anime();
$animeId = $_GET['id'] ?? null;
$userId =$_SESSION['userID'];
if ($animeId) {
    $animeObj->addUserAnime();
    $animeObj->updateWatchStatus();
    $animeObj->UpdateSeason();
    $userWatchedSeasons = $animeObj->getWatchedSeasons();

    $animeObj->addComment();
    $animeObj->updateRate();

    $anime = $animeObj->getAnimeById();
    $quote = $animeObj->getAnimeQuote();
    $userAnime = $animeObj->getUserAnime();
    $usersComments = $animeObj->getAllComments() ?? 'No Comments';
    $animeObj->deleteComment();

    if($userAnime){
        $buttonState = '';
        $addBtnState = 'Disabled';
    }else{
        $buttonState = 'Disabled';
        $addBtnState= '';
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap.css">
    <link rel="icon" href="../assets/favicon.png" >
    <title>Anime Info</title>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/navBar.php') ?>

<?php if ($anime): ?>
    <div class="container py-5 flex-grow-1">

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <img src="<?php echo $anime['img_url'] ?>"
                     alt="<?php echo $anime['title'] ?>"
                     class="img-fluid rounded-4 shadow-sm w-100">
            </div>
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <div>
                    <h1 class="fw-bold text-primary mb-3"><?php echo $anime['title'] ?></h1>
                    <p class="text-muted"><?php echo $anime['description'] ?></p>
                </div>
                <div class="card border-0 bg-white shadow-sm rounded-4 p-3">
                    <form method="POST" class="d-flex align-items-center gap-3 flex-wrap">
                        <input type="hidden" name="a_id" value="<?php echo $animeId; ?>">
                        <label for="rate" class="fw-semibold mb-0">Your Rating</label>
                        <input type="number" id="rate" name="rate" min="0" max="10"
                               value="<?php echo isset($userAnime['rate']) ? $userAnime['rate'] : '0' ?>"
                               class="form-control rounded-3" style="width: 90px;"
                                <?php echo $buttonState?>>
                        <span class="text-muted small">/ 10</span>
                        <button type="submit" name="rateBtn"
                                class="btn btn-outline-primary rounded-pill px-4"
                                <?php echo $buttonState?>>
                            Save Rating
                        </button>
                    </form>

                        <button  name="watchBtn" class="btn btn-primary rounded-pill px-4 w-100 " <?php echo $buttonState?>>
                            <a href="<?php echo $anime['anime_url'] ?>" target="_blank" style="text-decoration: none"> ▷ Watch Now !</a>
                        </button>

                </div>

                <figure class="bg-white border-start border-primary border-4 rounded-3 shadow-sm p-4 mt-4 mb-0">
                    <blockquote class="blockquote mb-3">
                        <p class="fst-italic text-dark mb-0"><?php echo $quote['content'] ?></p>
                    </blockquote>
                    <figcaption class="blockquote-footer mb-0">
                        <?php echo $quote['anime_character'] ?> —
                        <cite><?php echo $quote['title'] ?></cite>
                    </figcaption>
                </figure>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">

                <div class=" d-flex flex-wrap align-items-center gap-2 mb-4">
                    <span class="fw-semibold text-muted me-2">Seasons:</span>
                    <?php for ($i = 0; $i < $anime['num_of__seasons']; $i++): ?>
                        <form method="POST">
                            <input type="hidden" name="a_id" value="<?php echo $animeId; ?>">
                            <input type="hidden" name="s_id" value="<?php echo $i+1; ?>">
                            <button type="submit" name="seasonBtn" class="btn btn-outline-primary btn-sm rounded-pill" style="text-decoration: <?php echo isset($userWatchedSeasons[$i+1])? 'line-through': 'none';?>" <?php echo $buttonState?>>
                                Season <?php echo $i + 1 ?>
                            </button>
                        </form>
                    <?php endfor; ?>
                </div>

                <div class="row g-3 align-items-end">
                    <div class="col-sm-6">
                        <form method="POST">
                            <?php $currentStatus = $userAnime['watch_status'] ?? 'Plan to Watch'; ?>
                            <input type="hidden" name="a_id" value="<?php echo $animeId; ?>">
                            <label for="watch_status" class="form-label fw-semibold">Watch Status</label>
                            <select class="form-select rounded-3" name="watch_status" id="watch_status" <?php echo $buttonState?>>
                                <option value="Plan to Watch" <?php echo ($currentStatus == 'Plan to Watch') ? 'selected':'' ?>>Plan to Watch</option>
                                <option value="Finished" <?php echo ($currentStatus == 'Finished')?  'selected':'' ?>>Finished</option>
                                <option value="Currently Watching" <?php echo ($currentStatus == 'Currently Watching') ?'selected':'' ?>>Currently Watching</option>
                                <option value="Didn't Finish" <?php echo ($currentStatus == "Didn't Finish")? 'selected':''?>>Didn't Finish</option>
                            </select>
                            <button type="submit" name="updateStatusBtn" class="btn btn-primary mt-2" <?php echo $buttonState?>>
                                Update Status
                            </button>
                        </form>

                    </div>
                    <div class="col-sm-6">
                        <form method="POST">
                            <input type="hidden" name="a_id" value="<?php echo $animeId; ?>">
                            <button type="submit" name="addBtn" class="btn btn-primary rounded-pill px-4 w-100" <?php echo $addBtnState ?>>
                                + Add to Watchlist
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold text-primary mb-3">Leave a Comment</h5>
                <form method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="a_id" value="<?php echo $animeId; ?>">
                        <label for="comments" class="form-label fw-semibold">Your Comment</label>
                        <textarea name="commentText" class="form-control rounded-3" id="comments" rows="3"
                                  placeholder="Share your thoughts..."></textarea>
                    </div>
                    <button type="submit" name="commentBtn" class="btn btn-primary rounded-pill px-4">Submit</button>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h5 class="fw-bold text-primary mb-4">Comments</h5>

                <div class="d-flex flex-column gap-3">
                    <?php while($row = $usersComments->fetch_assoc()): ?>
                        <div class="bg-light rounded-3 p-3">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="fw-semibold text-primary small"><?php echo $row['username']?></span>
                                <?php if($_SESSION['userName'] == $row['username']): ?>
                                    <a href="commentUpdate.php?id=<?php echo $animeId?>&commentid=<?php echo $row['c_id']?>"
                                       class="btn btn-outline-primary rounded-pill"
                                       style="font-size: 0.65rem; padding: 1px 8px;">
                                        Update
                                    </a>
                                    <form method="POST" class="m-0 p-0">
                                        <input type="hidden" name="c_id" value="<?php echo $row['c_id']?>">
                                        <button type="submit" name="deleteCommentBtn"
                                                class="btn btn-outline-danger rounded-pill"
                                                style="font-size: 0.65rem; padding: 1px 8px;">
                                            Delete
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                            <p class="mb-0 text-dark"><?php echo $row['content']?></p>
                        </div>
                    <?php endwhile; ?>
                </div>

            </div>
        </div>

    </div>
<?php endif; ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/footer.php') ?>

</body>
</html>