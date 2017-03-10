<?php
	include "../../connect.php";
?>

<?php
    $s_cat = $conn->prepare("SELECT * FROM sub_categouries WHERE categoury_id = ? ORDER BY name ASC");
    $s_cat->execute([$_POST['cat_id']]);
    $s_cataFetch = $s_cat->fetchAll();
    foreach($s_cataFetch as $s_cat):
?>
    <option value="<?php echo $s_cat['id']?>"><?php echo $s_cat['name']?></option>
<?php endforeach;?>
