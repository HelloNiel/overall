<?php
session_start();
include '../../partial/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voice_tone_quality = $_POST['voice_tone_quality'];
    $mastery_timing = $_POST['mastery_timing'];
    $vocal_expression = $_POST['vocal_expression'];
    $diction = $_POST['diction'];
    $stage_presence = $_POST['stage_presence'];
    $entertainment_value = $_POST['entertainment_value'];

    $jdg_id = $_SESSION['jdg_id']; 

    $query = "INSERT INTO vocalsolo (team, voice_tone_quality, mastery_timing, vocal_expression, diction, stage_presence, entertainment_value, total_score, jdg_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, 'siiiiiiii', $team, $voice_tone_quality_score, $mastery_timing_score, $vocal_expression_score, $diction_score, $stage_presence_score, $entertainment_value_score, $total_score, $jdg_id);

        foreach ($_POST['voice_tone_quality'] as $index => $voice_tone) {
            $voice_tone_quality_score = intval($voice_tone);
            $mastery_timing_score = intval($mastery_timing[$index]);
            $vocal_expression_score = intval($vocal_expression[$index]);
            $diction_score = intval($diction[$index]);
            $stage_presence_score = intval($stage_presence[$index]);
            $entertainment_value_score = intval($entertainment_value[$index]);

            $total_score = $voice_tone_quality_score +
                           $mastery_timing_score +
                           $vocal_expression_score +
                           $diction_score +
                           $stage_presence_score +
                           $entertainment_value_score;

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
    header("Location: ../vocalsolo.php");
    exit();
}
?>
