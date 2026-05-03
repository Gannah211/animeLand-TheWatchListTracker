<?php
require_once "../vendor/autoload.php";
use App\authenticate;

$auth = new authenticate();
$auth->redirectIfNotAuth();

$userObj = new \App\User();
$userObj->deleteAnime();
$watchList = $userObj->getUserWatchList();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap.css">
    <link rel="icon" href="../assets/favicon.png" >
    <title>Delete Anime</title>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/navBar.php') ?>

<main class="flex-grow-1">
    <div class="container py-5">

        <h1 class="mb-5 fw-bold text-dark text-center">What do you want to delete, <?php echo $_SESSION['userName']; ?>?</h1>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h2 class="mb-4 h4 fw-bold text-primary">Anime Watchlist</h2>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-dark">
                        <tr>
                            <th>Anime Title</th>
                            <th class="text-center" style="width: 150px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($watchList && $watchList->num_rows > 0): ?>
                            <?php while ($row = $watchList->fetch_assoc()): ?>
                                <tr>
                                    <td class="fw-semibold text-dark"><?php echo $row['title']; ?></td>
                                    <td class="text-center">
                                        <form method="POST" class="m-0">
                                            <input type="hidden" name="a_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-4 shadow-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="2" class="text-center py-4 text-muted">Your watchlist is empty.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</main>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/footer.php') ?>

</body>
</html>