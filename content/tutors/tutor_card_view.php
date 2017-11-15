<div class="card text-white  mb-3 mr-3 uber-tutor-card" style="background-color: #68bfff;">
    <div class="card-header">Tutor</div>
    <img class="card-img-top card-img-top profilepic" src=<?php echo $tutor['profilePic'] ?> alt="Image">
    <div class="card-body">
        <h4 class="card-title"><?php echo $tutor['firstName'] . ' ' . $tutor['lastName'] ?></h4>
        <p class="card-text"><?php echo $tutor['intro'] ?></p>
    </div>
     <form method="get" action="/content/tutor/tutor.php">
        <input type="hidden" name="tutorid" value=<?php echo $tutor['id'] ?> />
        <button class="btn btn-secondary uber-tutor-view" type="submit">View</button>
    </form>
</div>
