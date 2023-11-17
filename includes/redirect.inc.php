<?php 

function check_login($pdo) {

    if (isset($_SESSION['UserID'])) {
        $id = $_SESSION['UserID'];
        $query = "SELECT * FROM user WHERE UserId = :id LIMIT 1";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        if ($statement) {
            $user_data = $statement->fetch(PDO::FETCH_ASSOC);
            if ($user_data) {
                return $user_data;
            }
        }
    }

    header("location: ..\Login-and-Registration\login.php");	
	die;
}