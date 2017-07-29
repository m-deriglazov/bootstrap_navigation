<?php
function show($arr){ // общая для всех файлов где она нужна функция для выводу массива
	echo '<pre>'.print_r($arr, true).'</pre>';
}

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

function uploadUserFile($name_folder){

	global $success;
	global $error;
//global $name_folder2;
//$name_folder2 = $_SESSION['name_folder1'];



console_log ($name_folder);



	$f = isset($_FILES['user-file'])?$_FILES['user-file']:'';//если юзер файл есть - загрузили массив. если нет. то ничего. Массив уже одномерный
	if($f==''){
		$error = 'Нет информации о файле';
	}
	else 
		if($f['error']!=0){
		$error = 'Ошибка загрузки файла';
		/*
		0-нет ошибок
		1-размер файла превышает допустимый в php.ini
		2-размер файла превышает значение MAX_FILE_SIZE
		3-ФАЙЛ загружен частично
		4-файл не загружен (или не выбран)
		*/
		}
	else{
	$arrMime = ['image/png', 'image/jpeg', 'image/gif']; //массив допустимых типов файлов
	if(!in_array($f['type'], $arrMime))// ! не тру - фолс
	{
		$error = 'Недопустимый тип файла';
	}

	else{

	$arrExt = ['jpeg', 'png', 'gif', 'jpg'];
	$dot = strrpos($f['name'], '.');  // возвращает (ищет) с конца искомый символ
	$ext = strtolower( substr($f['name'], $dot+1)); //strtolower - перевести в нижний регистр (если расширение будет написано заглавными) .+1 чтоб без точки
	if(!in_array($ext, $arrExt))
	{
		$error = 'Недопустимое расширение файла';
	}

	else 
	{
		$folder = 'images';
		if(!file_exists($folder))//(и папки и файлы для пхп - файлы)проверяем. создавать, если не существует папка. не создавать если существует
		{
		mkdir($folder); //mkdir создать папку
		}
		if(!move_uploaded_file($f['tmp_name'], $folder.'/'.$name_folder.'/'.time().'-'.rand(0,100).'-'.$f['name']))//что и с каким именем загружать (в папку нашего проэкта). move_uploaded_file Перемещает файл из временной папки 1й параметр - откуда. 2й - куда и с каким именем
	
	{// !move_uploaded_file если сбой и фолс. то $error = 'Ошибка перемещения файла'; //.time().'-'.rand(0,100).'-'. все это для того чтоб создавать эксклюзивные имена картинкам. тайем добавит в название секунды. рандом еще и случайное число. (обезопасить пользователя при  загрузке в одну и ту же секунды картинку с одинаковым именем)
		$error = 'Ошибка перемещения файла'; 
	}
	else
		$success='Файл успешно загружен!';
	}
	}
	}
}


unset($_SESSION['name_folder']);
?>