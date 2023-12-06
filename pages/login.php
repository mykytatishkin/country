<h3>Login</h3>

<?php
include_once('./pages/functions.php'); 
if( !isset($_POST['submit']) ){
?>

<form action="index.php?page=4" method="post">
<div class="form-group">
    <input type="text" name="login" placeholder="Login" class="form-control" />
</div>
<div class="form-group">
    <input type="password" name="password" placeholder="Password" class="form-control" />
</div>
<div class="form-group">
    <input type="submit" name="submit" value="Login" class="btn btn-success" />
</div>
</form> 
<div><a href="index.php?page=5">you can register here</a></div>  

<?php
}
else{
   if( login($_POST['login'], $_POST['password']) ){
        $_SESSION['logged'] = $_POST['login'];
        header('Location:./index.php?page=1');
   }
   else{
        echo '<div class="alert alert-danger">*** Login failed!</div>';
   }
?>
    

<?php
}
?>