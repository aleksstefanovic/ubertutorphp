<div id="main" class="col-9">
     <form method="post" action="/content/signin/process_signin.php">
      <div class="form-group">
        <label>Email Address</label>
        <input name="email" type="email" class="form-control" placeholder="Enter email">
        <small class="form-text uber-tutor-error"><?php echo $_SESSION['signin-email-message'] ?></small>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-secondary">Sign In</button>
      <small class="form-text uber-tutor-error"><?php echo $_SESSION['signin-submit-message'] ?></small>
    </form>
    <a class="btn btn-secondary" role="button" href="/content/createuser/createuser.php">Create Account</a>
</div>
