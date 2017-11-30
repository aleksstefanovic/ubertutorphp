<?php
    session_start();
?>

<nav class="navbar navbar-light uber-tutor-nav" style="background-color: #68bfff;">
    <div class="row">
        <div class="col">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onClick="expandNav()">
                  <span class="navbar-toggler-icon"></span>
            </button>
            <a class="nodecor" href="/">UBER TUTOR</a>
        </div>

        <div id="full-search" class="col">
            <div class="input-group">
                <input id="searchFilter" type="text" class="form-control" placeholder="Search tutors..." aria-label="Search tutors..." aria-describedby="basic-addon2">
                <span class="input-group-btn">
                <button class="btn btn-secondary" type="button" onClick="searchTutors()">
                      <img src="/media/icons/ic_search_white_24px.svg" alt="Image">
                </button>
              </span>
            </div>
        </div>

        <div id="full-signin" class="col">
            <?php if (empty($_SESSION['LoggedIn'])) { ?>
                <a class="btn btn-secondary uber-tutor-signin" role="button" href="/content/signin/signin.php">SIGN IN</a>
            <?php } else { ?>
                <p class="uber-tutor-signin uber-tutor-welcome"><?php echo "Welcome " . $_SESSION['firstName'] . "!"; ?></p>
            <?php } ?>
        </div>
    </div>
</nav>

