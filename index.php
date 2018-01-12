<?php

$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$text = $output['message']['text'];
if(stripos($text,'start=')===true){
	$key = substr($text, 7);
	file_get_contents('http://ggsite.ru/ficom/index.php?id='.$id.'&text='.$text.'&key='.$key);
}
else{
	file_get_contents('http://ggsite.ru/ficom/index.php?id='.$id.'&text='.$text.');
}
	
?>