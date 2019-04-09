<?php
require_once 'inc/_header.php';

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['personToDelete']) && !empty($_POST['personToDelete'])) {
    $query = "DELETE FROM person WHERE id = " . $_POST['personToDelete'];
    $request = $pdo->query($query);
    $request->execute();
}

include "inc/_showAll.php";
include 'inc/_footer.php';
