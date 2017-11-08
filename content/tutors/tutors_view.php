<div id="main" class="col-9">
    <h1><?php echo $searchFilter ?></h1>
    <div class="row">
        <?php
            foreach ($tutors as $tutor) {
                include ('./tutor_card_view.php');
            }
        ?>
    </div>
</div>
