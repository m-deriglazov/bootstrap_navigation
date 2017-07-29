

<?php
//show($_FILES); //заготовленная функция из фанкшонс, для отправки изображения
if(isset($_POST['upload-img']))
{
	uploadUserFile($_POST['name_folder']);// вызвали функцию из фанкшен (добавили параметр - имя папки)	
}
?>

<?php 
	$folder = 'images';
	$dir = opendir($folder);//opendir - открывает папку, в переменную записывается указатель на открытую папку
 	$folders = [];		 	

	while(($f = readdir($dir)) !==false) //readdir функция считывает файл, возвращает его название и переходит к следующему. когда файлы закончились - фолс
	{// выполняется пока не вернется фолс (не будут перебраны все файлы)
		//echo filetype($folder.'/'.$f).'<br>';//filetype возвращает тип файла. dir - папка file - файл

		if($f!='.' && $f!='..' && filetype($folder.'/'.$f) =='dir')// . и .. автоматом пишутся.(типо путь к папке), их выводить не надо, по этому так
//echo '<img src="'.$folder.'/'.$f.'" class="img-responsive"><br>';// выводим сами картинки, прописав путь к ней.    " class="img-responsive" класс из бутстрапа. чтоб большие картинки не вылезали
		$fi[] = $f;// массив названий папок
	
	}
 	closedir($dir);//closedir - закрывает папку
 ?>


<div class="container">	 <!--классы взяты из бутстрапа -->
<div class="row"> 	<!--классы взяты из бутстрапа--> 

<h1 class="text-center text-primary">Загрузка изображений</h1>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>
		?page=upload-image" method="POST" enctype="multipart/form-data"> <!--method="POST" если надо передать большие не текстовые файлы. исп метод ПОСТ -->
		<div class="form-group"> <!--enctype="multipart/form-data" обязательно. если форма будет пересылать файлы (у нас картинки) -->
			<label for="sel1">Выберите папку:</label>
      		<select name="name_folder" class="form-control" id="sel1" style="width:250px">
				<?php for ($i=0; $i<count($fi); $i++): ?> <!-- необходимое колво option. согласно колву папок-->

					<option><?= $fi[$i] ?></option>
		
				<?php endfor ?>

      		</select>
			<label for="user-file">Выберите изображение</label>
			<input type="file" name="user-file" id="user-file"> <!--отправляет файл -->
		</div>

		<input type="submit" class="btn btn-primary" name="upload-img"> <!-- из бутстрапа. пряймери - голубой цвет кнопки -->
	</form>

	<?php if(isset($error)): ?>
		<div class= "alert alert-danger"><?= $error?></div>
	<?php endif ?>
	<?php if(isset($success)): ?>
		<div class= "alert alert-success"><?= $success?></div> <!--alert-success бутстраповский класс, делающий цвет зеленым -->
	<?php endif ?>

</div>	
</div>