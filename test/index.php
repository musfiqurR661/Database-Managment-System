<?php

include_once('new.php');

$query = "SELECT * FROM dept";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result))
{
	echo $row['dept_name'].'<br>';
}

echo '<br>'.'End of index';

?>