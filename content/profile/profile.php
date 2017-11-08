<html lang="en">
    <?php
        include_once ('../../header.php');
    ?>
    <body>
        <?php
            include_once ('../nav/navbar.php');
        ?>
        <br>
        <div class="container-fluid">
            <br>
            <div class="row">
                <div id="navcol" class="col-1">
                    <?php
                        include_once ('../nav/nav.php');
                    ?>
                </div>

                <div id="main" class="col-9">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0">Your Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                        <img class="d-flex mr-3 profilepic" src="/media/tutorProfilePic.png" alt="Generic placeholder image">
                    </div>

                    <br>

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
                </div>
            </div>
        </div>
    </body>
</html>
