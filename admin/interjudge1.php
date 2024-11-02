<?php
session_start();
include '../partial/connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <?php include 'includes/topnavbar.php'; ?>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <?php include 'includes/sidenavbar.php'; ?>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Interpretative Dance Scores - First Judge</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Interpretative Dance Scores
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Team</th>
                                        <th>Originality</th>
                                        <th>Master of Steps</th>
                                        <th>Choreography and Style</th>
                                        <th>Costume and Props</th>
                                        <th>Stage Presence</th>
                                        <th>Total Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $firstJudgeQuery = "SELECT `jdg_id` FROM `judge` ORDER BY `jdg_id` ASC LIMIT 1";
                                    $firstJudgeResult = mysqli_query($conn, $firstJudgeQuery);
                                    
                                    if ($firstJudgeResult && mysqli_num_rows($firstJudgeResult) > 0) {
                                        $firstJudgeRow = mysqli_fetch_assoc($firstJudgeResult);
                                        $first_judge_id = $firstJudgeRow['jdg_id'];

                                        $query = "SELECT `team`, `originality`, `master_of_steps`, `choreography_and_style`, `costume_and_props`, `stage_presence`, `total_score` FROM `interpretativedance` WHERE `jdg_id` = ?";
                                        
                                        if ($stmt = mysqli_prepare($conn, $query)) {
                                            mysqli_stmt_bind_param($stmt, 'i', $first_judge_id);
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['team']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['originality']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['master_of_steps']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['choreography_and_style']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['costume_and_props']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['stage_presence']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['total_score']) . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='7'>No data found.</td></tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>Error preparing statement.</td></tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No judge found.</td></tr>";
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/script.php'; ?>
</body>
</html>
