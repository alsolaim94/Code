<?php
	function getMySQLConnection() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "akari";

		$connection = new mysqli($servername, $username, $password, $database);

		return $connection;


	}

	// get city drop down for filters
	function getCitiesFilter() {
		$connection = getMySQLConnection();
		$sql = "SELECT city FROM property GROUP BY city";

		$html = "<select id='city' name='city'>
                    <option value='none' selected> Select City </option>";


		$results = $connection -> query($sql);
		while($row = $results -> fetch_assoc()) {
			$html .= "<option value = '".$row['city']."'>".$row['city']."</option>";
		}
		$html .= "</select>";

		$connection -> close();

		return $html;
	}

	// get type dropdown for filter
	function getTypeFilter() {
        $connection = getMySQLConnection();
        $sql = "SELECT type FROM property GROUP BY type";

        $html = "<select id='type' name='type'>
                    <option value='none' selected> Select Type </option>";


        $results = $connection -> query($sql);
        while($row = $results -> fetch_assoc()) {
            $html .= "<option value = '".$row['type']."'>".$row['type']."</option>";
        }
        $html .= "</select>";
        $connection -> close();

        return $html;

    }

    // get state dropdown for filter
    function getStateFilter() {
        $connection = getMySQLConnection();
        $sql = "SELECT state FROM property GROUP BY state";

        $html = "<select id='state' name='state'>
                    <option value='none' selected> Select State </option>";


        $results = $connection -> query($sql);
        while($row = $results -> fetch_assoc()) {
            $html .= "<option value = '".$row['state']."'>".$row['state']."</option>";
        }
        $html .= "</select>";
        $connection -> close();

        return $html;
    }

    // get bedroom dropdown for filter
    function getBedroomFilter() {
        $connection = getMySQLConnection();
        $sql = "SELECT bedroom FROM property GROUP BY bedroom";

        $html = "<select id='bedroom' name='bedroom'>
                    <option value='none' selected> # Bedrooms </option>";


        $results = $connection -> query($sql);
        while($row = $results -> fetch_assoc()) {
            $html .= "<option value = '".$row['bedroom']."'>".$row['bedroom']."</option>";
        }
        $html .= "</select>";
        $connection -> close();

        return $html;
    }

    // get bathroom dropdown for filter
    function getBathroomFilter() {
        $connection = getMySQLConnection();
        $sql = "SELECT bathroom FROM property GROUP BY bathroom";

        $html = "<select id='bathroom' name='bathroom'>
                        <option value='none' selected> # Bathrooms </option>";


        $results = $connection -> query($sql);
        while($row = $results -> fetch_assoc()) {
            $html .= "<option value = '".$row['bathroom']."'>".$row['bathroom']."</option>";
        }
        $html .= "</select>";
        $connection -> close();

        return $html;
    }








?>
