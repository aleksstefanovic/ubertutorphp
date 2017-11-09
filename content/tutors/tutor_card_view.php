<div class="card text-white  mb-3 mr-3 uber-tutor-card" style="background-color: #68bfff;">
    <div class="card-header">Tutor</div>
    <img class="card-img-top card-img-top profilepic" src=<?php echo $tutor['profilePic'] ?> alt="Image">
    <div class="card-body">
        <h4 class="card-title"><?php echo $tutor['firstName'] . ' ' . $tutor['lastName'] ?></h4>
        <p class="card-text"><?php echo $tutor['intro'] ?></p>
    </div>
    <button class="btn btn-secondary" type="button" onClick="viewTutor()">View</button>
</div>
