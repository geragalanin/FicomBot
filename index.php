<?php

$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$text = $output['message']['text'];
$token = '490482772:AAHszXUudRHfOIh8306hne4EnQtlit5Kknw';

$do = json_decode(file_get_contents("https://ggsite.ru/ficom?pass=2299&uid=".$id."&what=1"),true);


function SendMessage($token,$id,$message){
	file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$id."&text=".$message);
}


switch($text){
	case '/start':
		$message = 'Выберите, что Вам нужно: найти бота или зарегистрировать бота.';
		SendMessage($token,$id,$message.KeyboardMenu1());
		file_get_contents("https://ggsite.ru/ficomindex.php?pass=2299&do=1&uid=".$id);
	break;
	case 'Поиск бота':
		$message = '';
		SendMessage($token,$id,$message);
	break;
	case 'Зарегистрировать бота':
		$message = 'Отправьте ссылку на вашего бота в формате "@FicomBot". (На данный момент один пользователь может зарегистрировать одного бота.)';
		SendMessage($token,$id,$message);
		file_get_contents("https://ggsite.ru/ficom?pass=2299&do=1.2");
	break;
	case 'Редактировать бота':
		$message = '';
		SendMessage($token,$id,$message);
	break;
	default:		
		$message = 'Неверный запрос';
		SendMessage($token,$id,$message.KeyboardMenu1());
}


function KeyboardMenu1(){
	$buttons = [['Поиск бота'],['Зарегистрировать бота'],['Редактировать бота']];
	$keyboard = json_encode($keyboard = ['keyboard' => $buttons,       //кнопки 
										  'resize_keyboard' => true,   //размер кнопок норм, если true
										  'one_time_keyboard' => true, //убирается сама, если true
										  'selective' => false]);
										  
	$reply_markup = '&reply_markup='.$keyboard.'';
	return $reply_markup; 
}

function KeyboardMenu2(){
	$buttons = ['Отмена'];
	$keyboard = json_encode($keyboard = ['keyboard' => $buttons,       //кнопки 
										  'resize_keyboard' => true,   //размер кнопок норм, если true
										  'one_time_keyboard' => true, //убирается сама, если true
										  'selective' => false]);
										  
	$reply_markup = '&reply_markup='.$keyboard.'';
	return $reply_markup; 
}

	
?>