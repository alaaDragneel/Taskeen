<?php
	include "../../connect.php";
?>

<?php
    $subareaSelect = $conn->prepare("SELECT * FROM sub_area WHERE area_id = ? And city_id = ? ORDER BY Name ASC");
    $subareaSelect->execute([$_POST['areaID'], $_POST['cityID']]);
    $subareaFetch = $subareaSelect->fetchAll();
?>
<select name="subarea_id" class="form-control">
    <?php foreach ($subareaFetch as $k): ?>
        <option value="<?php echo $k['id'] ?>"><?php echo $k['name'] ?></option>
    <?php endforeach; ?>
</select>
