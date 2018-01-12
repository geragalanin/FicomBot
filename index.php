<?php

$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$text = $output['message']['text'];

if(stripos($text,"/start") !== false){
	$key = substr($text, 7);
}

file_get_contents("https://api.telegram.org/bot490482772:AAHszXUudRHfOIh8306hne4EnQtlit5Kknw/sendMessage?chat_id=".$id."&text=".$key); 
	
?>