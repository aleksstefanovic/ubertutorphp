<div id="main" class="col-9">
    <div class="media">
        <div class="media-body">
            <h5 class="mt-0"><?php echo $user['firstName'] . " " . $user['lastName'] ?></h5>
            <br />
            <p><?php echo $user['intro'] ?></p>
            <p><?php echo $user['fullIntro'] ?></p>

            <p><?php echo 'Cost per Hour: $' . $user['costPerHour'] ?></p>    
        </div>
        <img class="d-flex mr-3 profilepic" src=<?php echo $user['profilePic'] ?> alt="Profile Picture">
    </div>

    <br />
    <br />
    <?php if (!empty($_SESSION['LoggedIn'])) {
            if ($_SESSION['roleId'] == 2) { ?>
               <p>Only student accounts can order a tutor</p> 
            <?php } else { ?>
                 <form method="post" action="/content/tutor/process_uber_this_tutor.php">
                    <input type="hidden" name="tutorid" value=<?php echo $user['id'] ?> />
                    <input type="hidden" name="studentid" value=<?php echo $_SESSION['userId'] ?> />
                    <button class="btn btn-secondary" role="submit">UBER THIS TUTOR</button>
                </form>
            <?php } ?>
    <?php } else { ?>
        <p>Please sign in if you wish to order this tutor</p>
    <?php } ?>
</div>
