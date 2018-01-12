<?php

$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$text = $output['message']['text'];

if(stristr($text,"start=") === true){
	$key = substr($text, 7);
}

else{ file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$id."&text=".$key); }
	
?>