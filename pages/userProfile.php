<?php
require_once "../vendor/autoload.php";
$auth = new App\authenticate();
$auth->redirectIfNotAuth();

$userObj = new \App\User();
$userInfo = $userObj->getUserInfo();
$userWatchList = $userObj->getUserWatchList();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap.css">
    <link rel="icon" href="../assets/favicon.png" >
    <title>Profile</title>
</head>
<body class="bg-light d-flex flex-column min-vh-100">
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/navBar.php') ?>

<main>
    <div class="container mt-4">

        <h1 class="mb-5">Welcome, <?php echo $userInfo['username'] ?> 👋</h1>
        <h2 class="mb-4">Anime Watchlist</h2>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
            <tr>
                <th>Anime Title</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $userWatchList->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['watch_status'] ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>

    </div>
</main>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/footer.php') ?>

</body>
</html>