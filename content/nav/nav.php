<br>
<div class="container-fluid">
    <br>
    <div class="row">
        <div id="navcol" class="col-1">
            <div class="collapse bg-light stretch" id="navbarToggleExternalContent">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/content/tutors/tutors.php">
                            <img class="mr-3" src="/media/icons/ic_accessibility_black_24px.svg" alt="Image">Tutors
                        </a>
                    </li>
                    <?php if (!empty($_SESSION['LoggedIn'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/content/profile/profile.php">
                                <img class="mr-3" src="/media/icons/ic_account_circle_black_24px.svg" alt="Image">Profile
                            </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/content/help/help.php">
                            <img class="mr-3" src="/media/icons/ic_help_outline_black_24px.svg" alt="Image">Help
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/content/settings/settings.php">
                            <img class="mr-3" src="/media/icons/ic_settings_black_24px.svg" alt="Image">Settings
                        </a>
                    </li>
                    <li id="mobile-search" class="nav-item">
                        <div class="input-group">
                            <input id="searchFilter-mobile" type="text" class="form-control" placeholder="Search tutors..." aria-label="Search tutors..." aria-describedby="basic-addon2">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button" onClick="searchTutors()">
                                          <img src="/media/icons/ic_search_white_24px.svg" alt="Image">
                                    </button>
                                </span>
                        </div>
                    </li>
                    <br />
                    <li id="mobile-signin" class="nav-item">
                        <?php if (empty($_SESSION['LoggedIn'])) { ?>
                            <a class="btn btn-secondary uber-tutor-signin" role="button" href="/content/signin/signin.php">SIGN IN</a>
                        <?php } else { ?>
                            <p class="uber-tutor-signin uber-tutor-welcome"><?php echo "Welcome " . $_SESSION['firstName'] . "!"; ?></p>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>

