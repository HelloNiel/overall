<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    session_start();
    include 'includes/header.php'; 
    ?>
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
                    <h1 class="mt-4">Vocal Solo</h1>
                    
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
                        unset($_SESSION['success_message']); 
                    }
                    ?>

                    <form action="./function/vocalfunction.php" method="POST"> 
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Team Name</th>
                                        <th>Voice/Tone Quality (30%)</th>
                                        <th>Mastery and Timing (25%)</th>
                                        <th>Vocal Expression (15%)</th>
                                        <th>Diction (10%)</th>
                                        <th>Stage Presence (10%)</th>
                                        <th>Entertainment Value (10%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../partial/connection.php';
                                    $query = "SELECT team_name FROM teams";
                                    $result = mysqli_query($conn, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['team_name']) . "</td>";
                                        echo '<td><input type="number" min="0" max="30" name="voice_tone_quality[]" class="form-control"></td>';
                                        echo '<td><input type="number" min="0" max="25" name="mastery_timing[]" class="form-control"></td>';
                                        echo '<td><input type="number" min="0" max="15" name="vocal_expression[]" class="form-control"></td>';
                                        echo '<td><input type="number" min="0" max="10" name="diction[]" class="form-control"></td>';
                                        echo '<td><input type="number" min="0" max="10" name="stage_presence[]" class="form-control"></td>';
                                        echo '<td><input type="number" min="0" max="10" name="entertainment_value[]" class="form-control"></td>';
                                        echo "</tr>";
                                    }

                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Scores</button> 
                    </form>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/script.php'; ?>
</body>
</html>
