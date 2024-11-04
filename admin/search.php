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
                    <h1 class="mt-4">SEARCH 2024</h1>
                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success" role="alert">
                            Scores submitted successfully!
                        </div>
                    <?php endif; ?>
                    <div class="card mb-4">
                        <div class="card-header">Teams and Scores</div>
                        <div class="card-body">
                            <form action="./function/searchfunction.php" method="post">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Team Name</th>
                                            <th>Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../partial/connection.php';
                                        $sql = "SELECT team_id, team_name FROM teams";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . htmlspecialchars($row['team_name']) . "</td>";
                                                echo "<td><input type='number' name='score[" . $row['team_id'] . "]' placeholder='Enter score' class='form-control'></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='2'>No teams found</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Submit All Scores</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/script.php'; ?>
</body>
</html>
