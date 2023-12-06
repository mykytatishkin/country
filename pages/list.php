<h3>List Of Countries</h3>

<?php
$list = CountryRepository::getCountries();

echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>Id</th><th>Name</th><th>Capital</th><th>Population</th><th>Flag</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach( $list as $k => $v ){
    echo '<tr>';
    echo '<td>'. $v->id .'</td>';
    echo '<td>'. $v->name .'</td>';
    echo '<td>'. $v->capital .'</td>';
    echo '<td>'. $v->population .'</td>';
    echo '<td>'. '<img src="./pages/display_image.php?id='.$v->id.'" alt="Picture" height="50px" />' .'</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>