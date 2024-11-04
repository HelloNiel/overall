<?php
include '../session_check.php'; 
checkLogin();
include '../partial/connection.php';

$scoresQuery = "SELECT `id`, `category`, `team_id`, `score` FROM `scores`";
$scoresResult = mysqli_query($conn, $scoresQuery);

$teamsQuery = "SELECT `team_id`, `team_name` FROM `teams`";
$teamsResult = mysqli_query($conn, $teamsQuery);

$categories = [
    'search2024', 'quizbee', 'badminton', 'basketball', 
    'volleyball', 'chess', 'egames', 'vocalsolo', 
    'moderndance', 'interpretativedance'
];

$teamScores = [];
while ($row = mysqli_fetch_assoc($scoresResult)) {
    $teamScores[$row['team_id']][$row['category']] = $row['score'];
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
                    <h1 class="mt-4">Total Score</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Team</th>
                                <?php foreach ($categories as $category): ?>
                                    <th><?php echo ucfirst($category); ?></th>
                                <?php endforeach; ?>
                                <th>Total Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($team = mysqli_fetch_assoc($teamsResult)): ?>
                                <tr>
                                    <td><?php echo $team['team_name']; ?></td>
                                    <?php 
                                    $totalScore = 0;
                                    foreach ($categories as $category): 
                                        $score = isset($teamScores[$team['team_id']][$category]) ? $teamScores[$team['team_id']][$category] : 0;
                                        $totalScore += $score;
                                    ?>
                                        <td>
                                            <span class="form-control-plaintext"><?php echo $score; ?></span>
                                        </td>
                                    <?php endforeach; ?>
                                    <td><?php echo $totalScore; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/script.php'; ?>
</body>
</html>
