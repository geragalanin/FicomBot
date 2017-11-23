<?php

$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$text = $output['message']['text'];
$token = '490482772:AAHszXUudRHfOIh8306hne4EnQtlit5Kknw';


function SendMessage($token,$id,$message){
	file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$id."&text=".$message);
}


switch($text){
	case '/start':
		$message = 'Выберите, что Вам нужно: найти бота или зарегистрировать бота.';
		SendMessage($token,$id,$message.KeyboardMenu1());
	break;
	default:		
		$message = '';
		SendMessage($token,$id,$message);
}


function KeyboardMenu1(){
	$buttons = [['Поиск бота'],['Зарегистрировать бота']];
	$keyboard = json_encode($keyboard = ['keyboard' => $buttons,       //кнопки 
										  'resize_keyboard' => true,   //размер кнопок норм, если true
										  'one_time_keyboard' => true, //убирается сама, если true
										  'selective' => false]);
										  
	$reply_markup = '&reply_markup='.$keyboard.'';
	return $reply_markup; 
}

	
?>