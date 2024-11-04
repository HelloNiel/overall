<?php
include '../../partial/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = 'egames';

    foreach ($_POST['score'] as $team_id => $score) {
        if (!empty($score)) {
            $sql = "INSERT INTO scores (category, team_id, score) VALUES (?, ?, ?)
                    ON DUPLICATE KEY UPDATE score = VALUES(score)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sii', $category, $team_id, $score);
            $stmt->execute();
        }
    }
    header('Location: ../egames.php');
    exit();
}
?>
