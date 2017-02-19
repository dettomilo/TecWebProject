<?php
/*
* This function return an array with all the current notifications, ordered by date.
* Based on:
* - http://php.net/manual/it/mysqli-result.fetch-array.php
*/
function getNews($mysqli) {
	if ($stmt = $mysqli->prepare("SELECT IdNotifica, Titolo, Url, t.Tipo, DataOra, t.Icona
								  FROM notifiche AS n INNER JOIN tipi_notifiche AS t ON n.Tipo = t.Tipo
								  ORDER BY DataOra")) {
		$stmt->execute(); // Execute the query
		$result = $stmt->get_result(); // Getting query result
		$temp = array();
		$array = array();
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) { // For each notification...
			$temp["Titolo"] = $row["Titolo"];
			$temp["DataOra"] = $row["DataOra"];
			$temp["Url"] = $row["Url"];
			$temp["Tipo"] = $row["Tipo"];
			$temp["Icona"] = $row["Icona"];
			$array[$row['IdNotifica']] = $temp; //... we put the data in the array
			unset($temp);
		}
		return $array;
	}
}
?>
