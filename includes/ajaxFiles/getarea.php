<?php
	include "../../connect.php";
?>

<?php
    $areaSelect = $conn->prepare("SELECT * FROM area WHERE city_id = ? ORDER BY Name ASC");
    $areaSelect->execute([$_POST['cityID']]);
    $areaFetch = $areaSelect->fetchAll();
?>
<select name="area_id" class="form-control" id="area_id">
    <?php foreach ($areaFetch as $k): ?>
        <option value="<?php echo $k['id'] ?>"><?php echo $k['name'] ?></option>
    <?php endforeach; ?>
</select>
