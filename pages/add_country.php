<h3>Add Country</h3>

<?php
include_once('./pages/classes.php'); 
if( !isset($_SESSION['logged']) ){
    header('Location:./index.php?page=4');
}
if( !isset($_POST['submit']) ){
?>

<form action="index.php?page=2" method="post" enctype="multipart/form-data">
<div class="form-group">
    <input type="text" name="name" placeholder="Country Name" class="form-control" />
</div>
<div class="form-group">
    <input type="text" name="capital" placeholder="Capital" class="form-control" />
</div>
<div class="form-group">
    <input type="text" name="population" placeholder="Population" class="form-control" />
</div>
<div class="form-group">
    <input type="file" name="flag" class="form-control" />
</div>
<div class="form-group">
    <input type="submit" name="submit" value="Add Country" class="btn btn-success" />
</div>
</form>   

<?php
}
else{
    if( is_uploaded_file($_FILES['flag']['tmp_name']) ){
        $flag = file_get_contents($_FILES['flag']['tmp_name']);
    }
    $country = new Country($_POST['name'], $_POST['capital'], $_POST['population'], $flag);
    CountryRepository::addCountry($country);
    header('Location:./index.php?page=1');
?>
    <p>New country was added!</p>
    

<?php
}
?>