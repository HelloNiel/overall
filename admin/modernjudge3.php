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
                    <h1 class="mt-4">Modern Dance Scores - Third Judge</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Modern Dance Scores
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Team</th>
                                        <th>Mastery of Steps</th>
                                        <th>Choreography Style</th>
                                        <th>Costume & Props</th>
                                        <th>Stage Presence</th>
                                        <th>Audience Impact</th>
                                        <th>Total Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $thirdJudgeQuery = "SELECT `jdg_id` FROM `judge` ORDER BY `jdg_id` ASC LIMIT 1 OFFSET 2";
                                    $thirdJudgeResult = mysqli_query($conn, $thirdJudgeQuery);
                                    
                                    if ($thirdJudgeResult && mysqli_num_rows($thirdJudgeResult) > 0) {
                                        $thirdJudgeRow = mysqli_fetch_assoc($thirdJudgeResult);
                                        $third_judge_id = $thirdJudgeRow['jdg_id'];

                                        $query = "SELECT `team`, `mastery_of_steps`, `choreography_style`, `costume_props`, `stage_presence`, `audience_impact`, `total_score` FROM `moderndance` WHERE `jdg_id` = ?";
                                        
                                        if ($stmt = mysqli_prepare($conn, $query)) {
                                            mysqli_stmt_bind_param($stmt, 'i', $third_judge_id);
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['team']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['mastery_of_steps']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['choreography_style']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['costume_props']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['stage_presence']) . "</td>";
                                                    echo "<td>" . sprintf('%3d', $row['audience_impact']) . "</td>";
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
