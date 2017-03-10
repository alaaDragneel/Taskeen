<?php

	//connect with pdo

	$dsn = "mysql:host=localhost;dbname=taskeen_store";
	$user = "root";
	$pass = "";
	$option = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		);
	try {
		$conn = new PDO($dsn, $user, $pass, $option);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		echo "failed to connect" . $e->getMessage();
	}
?>
   <label for="area_id" class="col-sm-2 control-label">area Name</label>
   <div class="col-sm-10">
      <select name="area_id" class="form-control">
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
