<?php
	include "../../connect.php";
?>

<?php
    $su_areaSelect = $conn->prepare("SELECT * FROM sub_area WHERE area_id = ? ORDER BY Name ASC");
    $su_areaSelect->execute([$_POST['area_id']]);
    $su_areaFetch = $su_areaSelect->fetchAll();
    foreach($su_areaFetch as $s_area):
?>
    <option value="<?php echo $s_area['id']?>"><?php echo $s_area['name']?></option>
<?php endforeach;?>
