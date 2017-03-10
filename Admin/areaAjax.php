<?php
	include "connect.php";
?>
   <label for="area_id" class="col-sm-2 control-label">area Name</label>
   <div class="col-sm-10">
      <select name="area_id" class="selectpicker">
         <?php
         $areaSelect = $conn->prepare("SELECT * FROM area WHERE city_id = ? ORDER BY Name ASC");
         $areaSelect->execute([$_POST['cityID']]);
         $areaFetch = $areaSelect->fetchAll();
         foreach($areaFetch as $area):
            ?>
            <option value="<?php echo $area['id']?>"><?php echo $area['name']?></option>
         <?php endforeach;?>
      </select>
   </div>
