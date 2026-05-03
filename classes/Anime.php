<?php

namespace App;
use App\Database\DB;
use App\Helpers\Alert;


class Anime
{
    public function getAllAnime(){
        $DB = new DB();
        $stmt = "SELECT * FROM anime";
        $preparedStmt = $DB->connection->prepare($stmt);
        $preparedStmt->execute();
        $result = $preparedStmt->get_result();
        return $result;
    }
    public function getAnimeById(){
        $anime_id =$_GET['id'];
        $DB = new DB();
        $stmt = 'SELECT * FROM anime WHERE id = ?';
        $preparedStmt = $DB->connection->prepare($stmt);
        $preparedStmt->bind_param('i', $anime_id);
        $preparedStmt->execute();
        $result = $preparedStmt->get_result();
        $anime = $result->fetch_assoc();
        return $anime;
    }
    public function getAnimeQuote(){
        $quote_id =$_GET['id'];
        $DB = new DB();
        $stmt = 'SELECT a.title , q.content, q.anime_character FROM quotes q JOIN anime a ON q.a_id = a.id WHERE q.id = ?';
        $preparedStmt = $DB->connection->prepare($stmt);
        $preparedStmt->bind_param('i', $quote_id);
        $preparedStmt->execute();
        $result = $preparedStmt->get_result();
        $quote = $result->fetch_assoc();
        return $quote;
    }
    Public function addUserAnime(){
        if(isset($_POST['addBtn'])) {
            $animeId = $_POST["a_id"];
            $userId = $_SESSION['userID'];
            $DB = new DB();
            $stmt = 'INSERT INTO user_anime (u_id, a_id) VALUES (?, ?)';
            $preparedStmt = $DB->connection->prepare($stmt);
            $preparedStmt->bind_param('ii', $userId, $animeId);
            $checkQuery = $preparedStmt->execute();
            if ($checkQuery) {
                Alert::printMessage("Anime inserted successfully", "success");
                header("Location: animeInfo.php?id=$animeId");
            } else {
                Alert::printMessage("failed to add anime to watchlist", "danger");
            }
        }
    }
    public function getUserAnime(){
        $userId = $_SESSION['userID'];
        $anime_id =$_GET['id'];
        $DB = new DB();
        $stmt = 'SELECT * FROM user_anime WHERE u_id = ? AND a_id = ?';
        $preparedStmt = $DB->connection->prepare($stmt);
        $preparedStmt->bind_param('ii', $userId, $anime_id);
        $preparedStmt->execute();
        $result = $preparedStmt->get_result();
        $anime = $result->fetch_assoc();
        return $anime;
    }
    public function updateWatchStatus (){
        if (isset($_POST['updateStatusBtn'])) {
            $animeId = $_POST["a_id"];
            $userId = $_SESSION['userID'];
            $watchStatus = $_POST['watch_status'];
            $DB = new DB();
            $stmt = 'UPDATE user_anime SET watch_status = ? WHERE a_id = ? AND u_id = ?';
            $preparedStmt = $DB->connection->prepare($stmt);
            $preparedStmt->bind_param('sii', $watchStatus, $animeId, $userId);
            $success = $preparedStmt->execute();
            if($success){
                Alert::printMessage("Watch Status Updated successfully", "success");
                header("Location: animeInfo.php?id=$animeId");
            } else {
                Alert::printMessage("failed to update watch status", "danger");
            }
        }
    }

    public function getWatchedSeasons(){
        $userId = $_SESSION['userID'];
        $anime_id =$_GET['id'];
        $DB = new DB();
        $stmt = 'SELECT s_id FROM anime_season WHERE a_id = ? AND u_id = ?';
        $preparedStmt = $DB->connection->prepare($stmt);
        $preparedStmt->bind_param('ii',$anime_id,$userId);
        $preparedStmt->execute();
        $result = $preparedStmt->get_result();

        $seasons =[];
        While($row = $result->fetch_assoc()) {
            $seasons[$row['s_id']] = true;
        }
        return $seasons;
    }

    public function UpdateSeason(){
        if(isset($_POST['seasonBtn'])){

            $animeId = $_POST['a_id'];
            $seasonId = $_POST['s_id'];
            $userId = $_SESSION['userID'];

            $DB = new DB();
            $stmt = "SELECT * FROM anime_season WHERE s_id=? AND a_id=? AND u_id=?";
            $preparedStmt1 = $DB->connection->prepare($stmt);
            $preparedStmt1->bind_param('iii', $seasonId, $animeId, $userId);
            $preparedStmt1->execute();
            $result = $preparedStmt1->get_result();

            if($result->num_rows > 0){
                $deleteQuery = "DELETE FROM anime_season WHERE s_id=? AND a_id=? AND u_id=?";
               $preparedStmt2= $DB->connection->prepare($deleteQuery);
                $preparedStmt2->bind_param('iii', $seasonId, $animeId, $userId);
                $preparedStmt2->execute();

            } else {
                $insertQuery ="INSERT INTO anime_season (s_id, a_id, u_id) VALUES (?, ?, ?)";
                $preparedStmt3= $DB->connection->prepare($insertQuery);
                $preparedStmt3->bind_param('iii', $seasonId, $animeId, $userId);
                $preparedStmt3->execute();
            }
            header("Location: animeInfo.php?id=$animeId");
            exit;
        }
    }
    public function addComment(){
        if(isset($_POST['commentBtn'])) {
            $animeId = $_POST["a_id"];
            $userId = $_SESSION['userID'];
            $comment = $_POST["commentText"];
            $DB = new DB();
            $stmt = 'INSERT INTO comment (u_id, a_id, content) VALUES (?, ?, ?)';
            $preparedStmt = $DB->connection->prepare($stmt);
            $preparedStmt->bind_param('iis', $userId, $animeId, $comment);
            $success = $preparedStmt->execute();
            if($success){
                header("Location: animeInfo.php?id=$animeId");
            } else {
                Alert::printMessage("failed to add comment", "danger");
            }
        }
    }
    public function getAllComments(){
        $animeId =$_GET["id"];
        $DB = new DB();
        $stmt = 'SELECT u.username, c.content, c.c_id FROM comment c JOIN user u ON c.u_id = u.id WHERE c.a_id = ?';
        $preparedStmt = $DB->connection->prepare($stmt);
        $preparedStmt->bind_param('i', $animeId);
        $preparedStmt->execute();
        $result = $preparedStmt->get_result();
        return $result;

    }
    public function deleteComment(){
        if(isset($_POST['deleteCommentBtn'])){
            $animeId = $_GET["id"];
            $userId = $_SESSION['userID'];
            $c_id = $_POST['c_id'];
            $DB = new DB();
            $stmt = 'DELETE FROM comment WHERE a_id=? AND u_id=? AND c_id=?';
            $preparedStmt = $DB->connection->prepare($stmt);
            $preparedStmt->bind_param('iii', $animeId, $userId, $c_id);
            $preparedStmt->execute();
            header("Location: animeInfo.php?id=$animeId");
        }

    }
public function getCommentByID($commentId){
        $DB = new DB();
        $stmt = 'SELECT content FROM comment WHERE c_id=?';
        $preparedStmt = $DB->connection->prepare($stmt);
        $preparedStmt->bind_param('i', $commentId);
        $preparedStmt->execute();
        $result = $preparedStmt->get_result();
        $comment = $result->fetch_assoc();
        return $comment;
}
public function updateComment($comment_id,$a_id)
{
    if(isset($_POST['UpdateCommentBtn'])) {
        $newComment = $_POST['commentText'];
        $DB = new DB();
        $stmt = 'UPDATE comment SET content=? WHERE c_id=?';
        $preparedStmt = $DB->connection->prepare($stmt);
        $preparedStmt->bind_param('si', $newComment, $comment_id);
        $success = $preparedStmt->execute();
        if($success){
            header("Location: animeInfo.php?id=$a_id");
        }else{
            Alert::printMessage("failed to update comment", "danger");
        }
    }

}
    public function updateRate()
    {
        if (isset($_POST['rateBtn'])) {
            $animeId = $_POST["a_id"];
            $userId = $_SESSION['userID'];
            $rate = $_POST["rate"];
            $DB = new DB();
            $stmt = 'UPDATE user_anime SET rate = ? WHERE u_id = ? AND a_id = ?';
            $preparedStmt = $DB->connection->prepare($stmt);
            $preparedStmt->bind_param('iii', $rate, $userId, $animeId);
            $success = $preparedStmt->execute();
            if($success){
                header("Location: animeInfo.php?id=$animeId");
            } else {
                Alert::printMessage("failed to update rate", "danger");
            }
        }
    }

}