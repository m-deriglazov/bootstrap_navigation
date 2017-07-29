	<?php require_once 'header.php'; ?> <!-- подключили стр хедер -->
	<?
		$page = isset($_GET['page'])?$_GET['page']:'';//если ГЕТ есть, откр нужную стр. если ГЕТ нет. загружаем индекс стр
		switch ($page) {//перебираем. Что перебираем
			case '':// с чем сравниваем
			case 'main':
				require_once 'pages/main.php';//если '' подключить main.php
				break;
			case 'gallery':// с чем сравниваем
				require_once 'pages/gallery.php';//если 'gallery' подключить gallery.php
				break;

			case 'guest-book':// с чем сравниваем
				require_once 'pages/guest-book.php';//если 'guest-book' подключить guest-book.php
				break;

			case 'up-gallery':// с чем сравниваем
				require_once 'pages/up-gallery.php';//если 'guest-book' подключить guest-book.php
				break;

			case 'upload-image':// с чем сравниваем
				require_once 'pages/upload-image.php';
				break;

			case 'singl-up':// с чем сравниваем
				require_once 'pages/singl-up.php';
				break;
			
			case 'login':// с чем сравниваем
				require_once 'pages/login.php';
				break;

			default:
				require_once 'pages/404.php';
				break;
		}
	?>
	<?php require_once 'footer.php'; ?>