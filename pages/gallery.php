<h3>Gallery</h3>

<?php
if( !isset($_SESSION['logged']) ){
    header('Location:./index.php?page=4');
}
?>

<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-6">
        <form action="index.php?page=3" method="post" enctype="multipart/form-data">
        <select name='countryid' class='form-control'>
        <option value="0">Select country</option>
<?php
        $list = CountryRepository::getCountries();
        foreach( $list as $k => $v ){
            echo '<option value="'.$v->id.'">'.$v->name.'</option>';
        }
?>
        </select>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-6">
        <!-- <form action="index.php?page=3" method="post" enctype="multipart/form-data"> -->
            <div class="form-group">
                <input type="file" name="picture[]" multiple accept="image/*" />
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload" class="btn btn-warning"   />
            </div>

        </form>
    </div>
<?php
if(isset ($_POST['submit'])){           //user clicked the button submit
    $countryid = $_POST['countryid'];
    foreach ($_FILES['picture']['name'] as $k=>$value) {
        if($FILES['picture']['error'][$k] !=0) continue;
        if( is_uploaded_file($_FILES['picture']['tmp_name'][$k]) ){
            $data = file_get_contents($_FILES['picture']['tmp_name'][$k]);
            CountryRepository::addPicture($countryid, $data);
        }
    }
}
?>    
</div>
<div class="row">
<!-- create method getAllPictures($countryid) in class CountryRepository -->
<!-- call method getAllPictures($countryid) on this page and get all returned pictures into $pictures[] -->
<!-- create carousel for $pictures[] -->
</div>




