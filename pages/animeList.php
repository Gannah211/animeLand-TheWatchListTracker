<?php require_once "../vendor/autoload.php";

$auth = new App\authenticate();
$auth->redirectIfNotAuth();

$animeObj = new \App\Anime();
$allSeries = $animeObj->getAllAnime(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap.css">
    <link rel="icon" href="../assets/favicon.png" >
    <link rel="stylesheet" href="../assets/customStyle.css" <?php echo time()?>>
    <title>All Animes</title>
    <style>
        .hover-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12) !important;
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/navBar.php') ?>

<div class="container py-5 flex-grow-1">

    <h1 class="fw-bold text-dark mb-4">All Anime</h1>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4">
        <?php while($row = $allSeries->fetch_assoc()): ?>
            <div class="col">
                <a href="animeInfo.php?id=<?php echo $row['id']; ?>" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                        <div class="card-body d-flex flex-column justify-content-between p-4">
                            <img src="<?php echo $row['img_url']; ?>" alt="">
                            <h5 class="card-title fw-bold text-dark mb-3 ">
                                <?php echo $row['title']; ?>
                            </h5>
                            <span class="text-primary fw-semibold small">View Details →</span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>

</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/footer.php') ?>



</body>
</html>
