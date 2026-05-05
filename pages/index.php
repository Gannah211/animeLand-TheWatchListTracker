<?php
require_once "../vendor/autoload.php";
use App\Database\DB;

$DB = new DB();

$auth = new App\authenticate();
$auth->signOut();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap-aot.css">
    <link rel="stylesheet" href="../assets/home.css">
    <link rel="icon" href="../assets/favicon.png">
    <title>Home — Anime Land</title>
</head>
<body>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/navBar.php') ?>

<section class="hero">
    <div class="welcome-card">

        <!-- Red top bar is handled by welcome-card::before in your CSS -->

        <?php if (isset($_SESSION['userName'])): ?>
            <h1 class="greeting">Hello, <?php echo htmlspecialchars($_SESSION['userName']) ?>!</h1>
            <p class="subtitle">Welcome back to Anime Land &nbsp;</p>
        <?php else: ?>
            <h1 class="greeting">Welcome to Anime Land</h1>
            <p class="subtitle">Your personal anime tracker starts here </p>
        <?php endif; ?>

        <div class="dots">
            <span></span><span></span><span></span>
        </div>

        <hr class="my-4">

        <p class="subtitle">
            Track what you watch, rate your favourite anime, and never lose your progress again
        </p>
    </div>
</section>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/footer.php') ?>

</body>
</html>