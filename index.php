<?php

$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$text = $output['message']['text'];
file_get_contents('http://ggsite.ru/ficom/index.php?id='.$id.'&text='.$id);

?>