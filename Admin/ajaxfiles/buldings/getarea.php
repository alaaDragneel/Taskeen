<?php
	include "../../connect.php";
?>

<?php
    $areaSelect = $conn->prepare("SELECT * FROM area WHERE city_id = ? ORDER BY Name ASC");
    $areaSelect->execute([$_POST['cityID']]);
    $areaFetch = $areaSelect->fetchAll();
    foreach($areaFetch as $area):
?>
    <option value="<?php echo $area['id']?>"><?php echo $area['name']?></option>
<?php endforeach;?>
