<div class="container">
	<div>
		<h1 class="text-center text-primary">Галерея</h1>


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

<?php for ($i=0; $i<count($fi); $i++) :
	$folder = 'images';
	$sub_folder = $fi[$i];
					
		
			$folder = 'images';
			$dir = opendir($folder.'/'.$sub_folder);//opendir - открывает папку, в переменную записывается указатель на открытую папку
		 	$images = [];

			while(($f = readdir($dir)) !==false) //readdir функция считывает файл, возвращает его название и переходит к следующему. когда файлы закончились - фолс
			{// выполняется пока не вернется фолс (не будут перебраны все файлы)
				//echo filetype($folder.'/'.$f).'<br>';//filetype возвращает тип файла. dir - папка file - файл
				if($f!='.' && $f!='..' && filetype($folder.'/'.$sub_folder.'/'.$f)!='dir')// . и .. автоматом пишутся.(типо путь к папке), их выводить не надо, по этому так
//echo '<img src="'.$folder.'/'.$f.'" class="img-responsive"><br>';// выводим сами картинки, прописав путь к ней.    " class="img-responsive" класс из бутстрапа. чтоб большие картинки не вылезали
				$images[] = $folder.'/'.$sub_folder.'/'.$f; //новый элемент добавляется в конец массива. Массив путей к картинкам
			}
		 	closedir($dir);//closedir - закрывает папку
		  ?>  

	<div class="col-sm-6 col-sm-offset-3">

		<div id="ololo<?php echo $i ?>" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">

		<?php for ($y=0; $y<count($images); $y++): ?> <!-- необходимое колво ли. согласно колву картинок-->


		    <li data-target="#ololo<?php echo $i ?>" data-slide-to="<?= $y ?>" 
		    <?php echo ($y==0)?'class="active"':''?> ></li><!-- присвоить класс актив первому -->
		
		<?php endfor ?>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		  <?php for ($y=0; $y<count($images); $y++): ?>
		    <div class="item <? echo ($y==0)?'active':''?>">
		      <img src="<?= $images[$y] ?>" alt="Los Angeles">
		    </div>
		   <?php endfor ?>


		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#ololo<?php echo $i ?>" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#ololo<?php echo $i ?>" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		<br>
	</div>

	


<?php endfor ?>

</div>
</div>	
