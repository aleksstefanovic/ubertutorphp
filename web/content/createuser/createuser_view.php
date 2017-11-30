<div id="main" class="col-9">
     <form method="post" action="/content/createuser/process_createuser.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>First Name</label>
                    <input name="firstName" type="text" class="form-control" placeholder="Enter first name">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input name="lastName" type="text" class="form-control" placeholder="Enter last name">
                </div>
                <div class="form-group">
                    <label>Profile Picture</label>
                    <input name="profilePic" type="file" class="form-control" placeholder="Select a profile pic" accept="image/*">
                    <small class="form-text uber-tutor-error"><?php echo $_SESSION['createuser-profilepic-message'] ?></small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" id="createUserRole" class="form-control" onchange="checkRole()">
                        <?php foreach ($roles as $role) { ?>
                            <option value="<?php echo $role['id'] ?>"><?php echo ucfirst($role['roleName']) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div id="createUserCostPerHour" class="form-group" style="display: none">
                    <label>How Much Do You Charge Per Hour?</label>
                    <input name="cost" type="number" class="form-control" step="0.01">
                </div>
                <div class="form-group">
                    <label>Introduction</label>
                    <textarea name="intro" class="form-control uber-tutor-intro" placeholder="Enter introduction"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Email Address</label>
                    <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                    <small class="form-text uber-tutor-error"><?php echo $_SESSION['createuser-email-message'] ?></small>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Password (Repeat)</label>
                    <input name="password2" type="password" class="form-control" placeholder="Password (Repeat)">
                    <small class="form-text uber-tutor-error"><?php echo $_SESSION['createuser-password2-message'] ?></small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary">Create User</button>
        <small class="form-text uber-tutor-error"><?php echo $_SESSION['createuser-submit-message'] ?></small>
    </form>
</div>
