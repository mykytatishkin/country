<h3>Register</h3>

<?php
include_once('./pages/functions.php'); 
if( !isset($_POST['submit']) ){
?>

<form action="index.php?page=5" method="post">
<div class="form-group">
    <input type="text" name="login" placeholder="Login" class="form-control" />
</div>
<div class="form-group">
    <input type="password" name="password" placeholder="Password" class="form-control" />
</div>
<div class="form-group">
    <input type="password" name="password1" placeholder="Confirm password" class="form-control" />
</div>
<div class="form-group">
    <input type="submit" name="submit" value="Register" class="btn btn-success" />
</div>
</form> 

<?php
}
else{
    if(register($_POST['login'], $_POST['password'])){
        echo '<div class="alert alert-success">*** You successfully registered!</div>';
    }
    else{
        echo '<div class="alert alert-danger">*** Registration failed!</div>';
    }
?>


<?php
}
?>