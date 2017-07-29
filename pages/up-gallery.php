<div class="container">
  <h2 class="text-center text-primary">Новая папка</h2>
  <form class="form-inline"  method="POST">
    <div class="form-group">
      <label for="folder">Папка: </label>
      <input type="folder" class="form-control" id="folder" style="width: 300px" placeholder="Введите название новой папки" name="folder">
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
  </form>
</div>



<?php
$value = $_POST['folder'];//берем имя для папки из value

if(file_exists("images/$value") && $value != '') {

  echo '<div class= "alert alert-danger" style= "width: 270px; margin: 10px 0 0 24%">Папка с именем "'.$value.'" уже существует!</div>';
}
if( !file_exists("images/$value")) {//если папки с таким именем нету, тогда создать
mkdir("images/$value");
}


?>