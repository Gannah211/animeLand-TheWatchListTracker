<?php

namespace App;

use App\Database\DB;
use App\Helpers\Alert;

class User
{
public function getUserInfo(){
    $user_id = $_SESSION['userID'];
    $DB = new DB();
    $stmt = $DB->connection->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
   return $result->fetch_assoc();
}
public function getUserWatchList(){
    $user_id = $_SESSION['userID'];
    $DB = new DB();
    $stmt ='SELECT a.title, au.watch_status, a.id FROM user_anime au JOIN anime a ON au.a_id = a.id WHERE au.u_id = ?';
    $preparedStmt=$DB->connection->prepare($stmt);
    $preparedStmt->bind_param("i", $user_id);
    $preparedStmt->execute();
    $result = $preparedStmt->get_result();
    return $result;
}
    public function deleteAnime() {
    if(isset($_POST['a_id'])){
        $a_id = $_POST['a_id'];
        $user_id = $_SESSION['userID'];
        $DB = new DB();
        $Seasonstmt= "DELETE FROM anime_season WHERE u_id = ? AND a_id = ?";
        $preparedStmt = $DB->connection->prepare($Seasonstmt);
        $preparedStmt->bind_param("ii", $user_id, $a_id);
        $check1= $preparedStmt->execute();
        $Animestmt ="DELETE FROM user_anime WHERE u_id = ? AND a_id = ?";
        $preparedStmt2=$DB->connection->prepare($Animestmt);
        $preparedStmt2->bind_param("ii", $user_id, $a_id);
        $check2= $preparedStmt2->execute();
        if($check1 && $check2){
            header("Location: userProfile.php");
        }else{
            Alert::printMessage('Delete Error', 'danger');
            header("Location: deleteAnime.php");
        }
    }



    }
}