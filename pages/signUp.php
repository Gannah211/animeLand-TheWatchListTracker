<?php
require_once "../vendor/autoload.php";
$authObj = new \App\authenticate();
$authObj->signUp();
$authObj->redirectIfAuth();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap-aot.css">
    <link rel="icon" href="../assets/favicon.png" >
    <title>Sign Up</title>

</head>
<body class="bg-light d-flex flex-column min-vh-100">
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/navBar.php') ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">

                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="mb-0 fw-bold">✏️ Sign Up</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST">

                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium">Username</label>
                                <input id="username"
                                       type="text"
                                       name="username"
                                       class="form-control"
                                       placeholder="user123"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">Email</label>
                                <input id="email"
                                       type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="user@gmail.com"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-medium">Password</label>
                                <input id="password"
                                       type="password"
                                       name="password"
                                       class="form-control"
                                       placeholder="try make it complex"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="confirm_password" class="form-label fw-medium">Confirm Password</label>
                                <input id="confirm_password"
                                       type="password"
                                       name="confirm_password"
                                       class="form-control"
                                       placeholder="write it again"
                                       required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="signUpBtn" class="btn btn-dark">
                                    Create Account
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
                <p class="text-center mt-3 text-body small">
                    Already have an account? <a href="signIn.php">Sign in</a>
                </p>
            </div>
        </div>
    </div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/animeLand/components/footer.php') ?>

</body>
</html>