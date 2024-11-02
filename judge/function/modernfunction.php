<?php
session_start();
include '../../partial/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mastery_of_steps = $_POST['mastery_of_steps'];
    $choreography_style = $_POST['choreography_style'];
    $costume_props = $_POST['costume_props'];
    $stage_presence = $_POST['stage_presence'];
    $audience_impact = $_POST['audience_impact'];

    $jdg_id = $_SESSION['jdg_id']; 

    $query = "INSERT INTO moderndance (team, mastery_of_steps, choreography_style, costume_props, stage_presence, audience_impact, total_score, jdg_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, 'siiiiiii', $team, $mastery_of_steps_score, $choreography_style_score, $costume_props_score, $stage_presence_score, $audience_impact_score, $total_score, $jdg_id);

        foreach ($_POST['mastery_of_steps'] as $index => $mastery) {
            $mastery_of_steps_score = intval($mastery);
            $choreography_style_score = intval($choreography_style[$index]);
            $costume_props_score = intval($costume_props[$index]);
            $stage_presence_score = intval($stage_presence[$index]);
            $audience_impact_score = intval($audience_impact[$index]);

            $total_score = $mastery_of_steps_score +
                           $choreography_style_score +
                           $costume_props_score +
                           $stage_presence_score +
                           $audience_impact_score;

            $team_query = "SELECT team_name FROM teams LIMIT 1 OFFSET " . $index;
            $team_result = mysqli_query($conn, $team_query);
            $team_row = mysqli_fetch_assoc($team_result);
            $team = $team_row['team_name'];

            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        $_SESSION['success_message'] = "Scores submitted successfully!";
    }

    mysqli_close($conn);
    header("Location: ../moderndance.php");
    exit();
}
?>
