<?php
require_once '../../includes/dbh.inc.php';

$stmt = $pdo->prepare("SELECT * FROM hotels;");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
