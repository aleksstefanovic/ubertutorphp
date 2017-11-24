<div id="main" class="col-9">
    <div class="media">
        <div class="media-body">
            <h5 class="mt-0"><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></h5>
            <p><?php echo ucfirst($roleName) ?></p>
            <br />
            <p><?php echo $user['intro'] ?></p>
            <p><?php echo $user['fullIntro'] ?></p>

            <?php if ($user['roleId'] == 2) { ?>
                <p><?php echo 'Cost per Hour: $' . $user['costPerHour'] ?></p>    
            <?php } ?>
        </div>
        <img class="d-flex mr-3 profilepic" src=<?php echo $user['profilePic'] ?> alt="Profile Picture">
    </div>

    <br />

    <div class="container">
        <div class="row">
            <div class="col-3">
                <h6>Status</h6>
            </div>
            <div class="col">
                <?php if ($user['roleId'] == 1) { ?>
                    <h6>Tutor</h6>
                <?php } else { ?>
                    <h6>Student</h6>
                <?php } ?>
            </div>
            <div class="col">
                <h6>Time Start</h6>
            </div>
            <div class="col">
                <h6>Time End</h6>
            </div>
            <div class="col">
                <h6>Total Cost</h6>
            </div>
        </div>
        <?php
            foreach ($transactions as $transaction) {
                include ('../transactions/transaction_view.php');
            }
        ?>
    </div>

    <br />

    <a class="btn btn-secondary" role="button" href="/content/profile/process_profile_signout.php">SIGN OUT</a>
    <br />
    <br />
    <a class="btn btn-outline-danger" role="button" onClick="deleteAccount()">DELETE ACCOUNT</a>
    <br />
</div>
