<div id="main" class="col-9">
    <div class="media">
        <div class="media-body">
            <h5 class="mt-0"><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></h5>
        </div>
        <img class="d-flex mr-3 profilepic" src="/media/tutorProfilePic.png" alt="Generic placeholder image">
    </div>

    <br />

    <div class="container">
        <div class="row">
            <div class="col">
                <h6>Tutor</h6>
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
    </div>

    <br />

    <a class="btn btn-secondary" role="button" href="/content/profile/process_profile_signout.php">SIGN OUT</a>
</div>
