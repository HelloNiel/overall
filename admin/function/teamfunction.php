<?php
session_start();
include '../../partial/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cand_team = $_POST['cand_team'];

    $sql = "INSERT INTO teams (team_name) VALUES (?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $cand_team);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Team added successfully.";
        } else {
            $_SESSION['error_message'] = "Error: Could not add team.";
        }

        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Error: Could not prepare statement.";
    }

    $conn->close();
    header("Location: ../addteam.php");
    exit();
}
