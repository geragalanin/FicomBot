<?php

$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$text = $output['message']['text'];
$token = '384628942:AAFoapuIipUZEAwi2NQoNElgF6uXfBdWFu8';


if(isset($output['callback_query']['data'])){
	checkInline($output, $token);
}


switch($text){
	case 'hi':
		$message = 'hello';
		SendMessage($token,$id,$message);
	break;
	case 'hihi':
		$message = 'hi';
		SendMessage($token,$id,$message.KeyboardMenu());
	break;
	case 'in':
		$message = 'Done';
		SendMessage($token,$id,$message.inlineKeyboard());
	break;
	default:		
		$message = 'no';
		SendMessage($token,$id,$message);
}


function SendMessage($token,$id,$message){
	file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$id."&text=".$message);
}


function KeyboardMenu(){
	$buttons = [['hi'],['hihi']];
	$keyboard = json_encode($keyboard = ['keyboard' => $buttons,       //кнопки 
										  'resize_keyboard' => true,   //размер кнопок норм, если true
										  'one_time_keyboard' => true, //убирается сама, если true
										  'selective' => true]);
										  
	$reply_markup = '&reply_markup='.$keyboard.'';
	return $reply_markup; 
}


function inlineKeyboard(){
	$reply_markup = '';
	
	$x1 = array('text' => 'Inline_one', 'callback_data' => 'Inline_one');
	$x2 = array('text' => 'Inline_five', 'callback_data' => 'Inline_five');
	$x3 = array('text' => 'Inline_ten', 'url' => 'http://ggsite.ru');
	$opz = [[$x1], [$x2], [$x3]];
	
	$keyboard = array('inline_keyboard' => $opz);
	$keyboard = json_encode($keyboard, true);
	
	$reply_markup = '&reply_markup='.$keyboard.'';
	return $reply_markup; 
}


function checkInline($output, $token){
	$id = $output['callback_query']['message']['chat']['id'];
	$message = $output['callback_query']['data'];
	SendMessage($token,$id,$message);
}

	
?>