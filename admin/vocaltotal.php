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
                    <h1 class="mt-4">Vocal Solo Average Scores</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Team</th>
                                    <th>Average Total Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../partial/connection.php';

                                $query = "
                                    SELECT team, 
                                           ROUND(SUM(total_score) / COUNT(jdg_id), 2) AS average_score
                                    FROM vocalsolo
                                    GROUP BY team
                                    ORDER BY average_score DESC
                                ";

                                $result = mysqli_query($conn, $query);
                                $rank = 1; 

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $rank . "</td>";
                                        echo "<td>" . $row['team'] . "</td>";
                                        echo "<td>" . $row['average_score'] . "</td>";
                                        echo "</tr>";
                                        $rank++;
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No records found</td></tr>";
                                }

                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/script.php'; ?>
</body>
</html>
