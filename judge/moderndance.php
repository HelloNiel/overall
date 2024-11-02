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
                    <h1 class="mt-4">Modern Dance</h1>
                    
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
                        unset($_SESSION['success_message']); 
                    }
                    ?>

                    <form action="./function/modernfunction.php" method="POST"> 
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Team Name</th>
                                        <th>Mastery of steps (25%)</th>
                                        <th>Choreography & style (30%)</th>
                                        <th>Costume & props (20%)</th>
                                        <th>Stage presence (15%)</th>
                                        <th>Audience impact (10%)</th>
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
                                        echo '<td><input type="number" min="0" max="25" name="mastery_of_steps[]" class="form-control"></td>';
                                        echo '<td><input type="number" min="0" max="30" name="choreography_style[]" class="form-control"></td>';
                                        echo '<td><input type="number" min="0" max="20" name="costume_props[]" class="form-control"></td>';
                                        echo '<td><input type="number" min="0" max="15" name="stage_presence[]" class="form-control"></td>';
                                        echo '<td><input type="number" min="0" max="10" name="audience_impact[]" class="form-control"></td>';
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
