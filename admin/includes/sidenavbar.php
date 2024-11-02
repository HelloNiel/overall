<div class="sb-sidenav-menu">
    <div class="nav">
        <div class="sb-sidenav-menu-heading"></div>
        <a class="nav-link" href="<?php echo "dashboard.php"; ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-gauge-high"></i></div>
            <span class="nav-link-text">Dashboard</span>
        </a>

        <div class="sb-sidenav-menu-heading">Scoring</div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVocalSolo" aria-expanded="false" aria-controls="collapseVocalSolo">
            <div class="sb-nav-link-icon"><i class="fas fa-microphone"></i></div>
            Vocal Solo
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseVocalSolo" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?php echo "vocaljudge1.php"; ?>">Judge 1</a>
                <a class="nav-link" href="<?php echo "vocaljudge2.php"; ?>">Judge 2</a>
                <a class="nav-link" href="<?php echo "vocaljudge3.php"; ?>">Judge 3</a>
                <a class="nav-link" href="<?php echo "vocaltotal.php"; ?>">Total score</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseModernDance" aria-expanded="false" aria-controls="collapseModernDance">
            <div class="sb-nav-link-icon"><i class="fas fa-music"></i></div>
            Modern Dance
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseModernDance" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?php echo "modernjudge1.php"; ?>">Judge 1</a>
                <a class="nav-link" href="<?php echo "modernjudge2.php"; ?>">Judge 2</a>
                <a class="nav-link" href="<?php echo "modernjudge3.php"; ?>">Judge 3</a>
                <a class="nav-link" href="<?php echo "moderntotal.php"; ?>">Total score</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInterpretativeDance" aria-expanded="false" aria-controls="collapseInterpretativeDance">
            <div class="sb-nav-link-icon"><i class="fas fa-theater-masks"></i></div>
            Interpretative Dance
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseInterpretativeDance" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?php echo "interjudge1.php"; ?>">Judge 1</a>
                <a class="nav-link" href="<?php echo "interjudge2.php"; ?>">Judge 2</a>
                <a class="nav-link" href="<?php echo "interjudge3.php"; ?>">Judge 3</a>
                <a class="nav-link" href="<?php echo "interpretativetotal.php"; ?>">Total Score</a>
            </nav>
        </div>

        <div class="sb-sidenav-menu-heading">Settings</div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStudents" aria-expanded="false" aria-controls="collapseStudents">
            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
            Manage Candidates
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseStudents" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?php echo "addteam.php"; ?>">Add Team</a>
                <a class="nav-link" href="<?php echo "viewteam.php"; ?>">View Team</a>
            </nav>
        </div>

        <a class="nav-link" href="<?php echo "addjudge.php"; ?>"> 
            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
            Add Judge Account
        </a>
        <a class="nav-link" href="<?php echo "addadmin.php"; ?>"> 
            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
            Add Admin Account
        </a>
    </div>
</div>
<div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
    Administrator
</div> 
