<?php
session_start();
include '../partial/connection.php';

$jdg_id = $_SESSION['jdg_id'];
$query = "SELECT jdg_name, jdg_username FROM judge WHERE jdg_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $jdg_id);
$stmt->execute();
$stmt->bind_result($jdg_name, $jdg_username);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .rules-card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .rules-title {
            color: #343a40;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .rule-item {
            margin-bottom: 15px;
            padding-left: 10px;
            border-left: 4px solid #0d6efd;
            background-color: #f1f3f5;
            border-radius: 4px;
            padding: 10px;
        }
        .tip {
            background-color: #e9ecef;
            border-radius: 4px;
            padding: 10px;
            margin-top: 20px;
        }
        .container-fluid {
            padding-top: 40px;
        }
    </style>
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
                    <div class="rules-card">
                        <h2>Welcome, Judge <?php echo htmlspecialchars($jdg_name); ?>!</h2>
                        <p class="lead">You're logged in as (<strong><?php echo htmlspecialchars($jdg_username); ?></strong>). <br><br>
                        Please review the following rules carefully before proceeding.</p>
                        
                        <h1 class="rules-title">Judging Rules</h1>
                        <ul class="list-unstyled">
                            <li class="rule-item"><strong>1. Scores cannot be edited or repeated once submitted.</strong></li>
                            <li class="rule-item"><strong>2. Strictly no duplication or repetition of score submissions.</strong></li>
                            <li class="rule-item"><strong>3. Scores will be automatically saved to the admin once submitted.</strong></li>
                            <li class="rule-item"><strong>4. Each contestant must be assigned a unique total score according to the judging criteria.</strong></li>
                            <li class="rule-item"><strong>5. Important: View the system rules to check the rules per category.</strong></li>
                        </ul>
                        <p class="mt-4 text-muted">Please adhere to these rules for a fair judging process.</p>
                        
                        <div class="tip">
                            <strong>TIP:</strong> You can use the "Important: View the rules/Modal" section to slightly hide your inputed scores.
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#top5RulesModal">Top 5 Rules</button>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="top5RulesModal" tabindex="-1" aria-labelledby="top5RulesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="top5RulesModalLabel">Top 5 Rules</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-unstyled">
                        <li class="rule-item"><strong>1. Impartiality:</strong> Judges must remain unbiased and evaluate each candidate solely on their performance.</li>
                        <li class="rule-item"><strong>2. Confidentiality:</strong> All scores must remain confidential and should not be shared with anyone outside the judging panel.</li>
                        <li class="rule-item"><strong>3. Scoring Criteria:</strong> Follow the provided scoring criteria for each category and assign scores based on merit.</li>
                        <li class="rule-item"><strong>4. No Outside Influence:</strong> Judges should not engage in any discussions with participants or other judges that could influence their scores.</li>
                        <li class="rule-item"><strong>5. Timely Submission:</strong> Ensure all scores are submitted within the allotted time to avoid delays in results.</li>
                        <li class="rule-item"><strong>6. One Submission Only:</strong> Judges can only submit scores once per candidate/form to ensure fairness in the evaluation process.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/script.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
