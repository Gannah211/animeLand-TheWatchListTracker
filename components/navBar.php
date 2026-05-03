<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="light">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold " href="/AnimeLand/pages/index.php">⬡ Anime Land</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">

            <?php if ((new \App\authenticate())->isAuth()): ?>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="/AnimeLand/pages/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/AnimeLand/pages/animeList.php">Anime</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger fw-semibold" href="/AnimeLand/pages/deleteAnime.php">Delete Anime</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/AnimeLand/pages/userProfile.php">Profile</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="btn btn-danger btn-sm px-3" href="/AnimeLand/pages/index.php?logout=1">Sign Out</a>
                    </li>
                </ul>

            <?php else: ?>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center gap-2">
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm px-3" href="/AnimeLand/pages/signIn.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-sm px-3" href="/AnimeLand/pages/signUp.php">Sign Up</a>
                    </li>
                </ul>

            <?php endif; ?>

        </div>
    </div>
</nav>