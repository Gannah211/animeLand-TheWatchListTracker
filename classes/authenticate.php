<?php

namespace App;
use App\Database\DB;
use App\Helpers\Alert;

class authenticate
{
    public function isAuth(): bool
    {
        return isset($_SESSION['userID']);
    }

    public function redirectIfAuth(): void
    {
        if ($this->isAuth()) {
            header('Location: index.php');
        }
    }

    public function redirectIfNotAuth(): void
    {
        if (!$this->isAuth()) {
            header('Location: signIn.php');
        }
    }

    public function signUp(): void
    {
        if (isset($_POST['signUpBtn'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashed_password= password_hash($password, PASSWORD_DEFAULT);
            $confirm_password= $_POST['confirm_password'];


            if ($password != $confirm_password) {
                Alert::printMessage("Password Is Wrong", "Danger");
            } else {
                $db = new DB();
                $checkEmail = $db->connection->prepare("SELECT id FROM user WHERE email = ?");
                $checkEmail->bind_param("s", $email);
                $checkEmail->execute();
                $result = $checkEmail->get_result();

                if ($result->num_rows > 0) {
                    Alert::printMessage("Email already exists", "Danger");
                    return;
                }
                $insertQuery = "INSERT INTO user VALUES (NULL,?,?,?)";
                $prepareStmt = $db->connection->prepare($insertQuery);

                $prepareStmt->bind_param ('sss', $username, $email, $hashed_password);
                $checkQuery = $prepareStmt->execute();
                if ($checkQuery) {
                    $_SESSION['signUpSuccess'] = 1;
                    header("Location: SignIn.php");
                } else {
                    Alert::printMessage("Sign Up failed!", "danger");
                }
            }
        }
    }

    public function signIn(): void
    {
        if (isset($_POST['logInBtn'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = new DB();

            $query = "SELECT * FROM user WHERE email = ?";
            $stmt = $db->connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                Alert::printMessage("Email not found", "danger");
                return;
            }
            $existedUser = $result->fetch_assoc();
            $dbHashedPassword = $existedUser['password'];
            if (!password_verify($password, $dbHashedPassword)) {
                Alert::printMessage("Wrong password", "danger");
                return;
            }
            $_SESSION['userID'] = $existedUser['id'];
            $_SESSION['userName'] = $existedUser['username'];
            header('Location: index.php');

        }
    }
private function isUserExists($email,$db){
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $db->connection->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result;
}
    public function signOut(): void
    {
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            header('Location: signIn.php');
        }
    }
}
