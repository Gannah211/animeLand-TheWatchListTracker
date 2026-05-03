<?php
require_once "../vendor/autoload.php";
use App\Database\DB;

$DB = new DB();

$auth = new App\authenticate();
$auth->redirectIfNotAuth();

$auth->signOut();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap.css">
    <link rel="icon" href="../assets/favicon.png" >
    <link rel="stylesheet" href="../assets/customStyle.css" <?php echo time()?>>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/navBar.php') ?>

<section class="hero">
    <div class="welcome-card">
        <?php if (isset($_SESSION['userName'])): ?>
        <h1 class="greeting text-outline">Hello, <?php echo $_SESSION['userName'] ?>!</h1>
        <p class="subtitle">Welcome back to Anime Land &nbsp;👋</p>
        <?php else: ?>
        <h1 class="greeting text-outline">Welcome to Anime Land  </h1>
        <p class="subtitle">Your personal anime tracker starts here ✨</p>
        <?php endif; ?>
        <div class="dots">
            <span></span><span></span><span></span>
        </div>
        <br>
        <p class="subtitle">
            Track what you watch, rate your favorite anime, and never lose track of your progress again 🎬
        </p>
    </div>
</section>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/footer.php') ?>

</body>
</html>
