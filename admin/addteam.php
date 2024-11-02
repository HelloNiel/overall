<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Candidate</title>
    <?php 
    session_start();
    include 'includes/header.php'; 
    ?>
    <link rel="icon" href="../img/logo.png" type="image/png">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        #layoutSidenav_content {
            padding-bottom: 0;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <div id="layoutSidenav" class="flex-grow-1">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <?php include 'includes/sidenavbar.php'; ?>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <?php include 'includes/topnavbar.php'; ?>
            </nav>
            <div class="container mt-4">
                <h1>Add Team</h1>

                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                        echo $_SESSION['success_message'];
                        unset($_SESSION['success_message']);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error_message'];
                        unset($_SESSION['error_message']);
                        ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="./function/teamfunction.php">
                    <div class="mb-3">
                        <label for="cand_team" class="form-label">Team Name</label>
                        <select class="form-select" id="cand_team" name="cand_team" required>
                            <option value="" disabled selected>Select a team</option>
                            <option value="Team 1 - Orange Wolves">Team 1 - Orange Wolves</option>
                            <option value="Team 2 - Yellow Tigers">Team 2 - Yellow Tigers</option>
                            <option value="Team 3 - Green Tamaraws">Team 3 - Green Tamaraws</option>
                            <option value="Team 4 - Blue Eagles">Team 4 - Blue Eagles</option>
                            <option value="Team 5 - Red Phoenix">Team 5 - Red Phoenix</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Team</button>
                </form>
            </div>

            <footer class="py-2 bg-light mt-auto">
                <?php include 'includes/footer.php'; ?>
            </footer>
        </div>
    </div>

    <?php include 'includes/script.php'; ?>
</body>
</html>
