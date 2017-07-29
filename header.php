
<?php require_once 'functions.php'; ?>
<?php require_once 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


<!--находиться будем всегда на стр индекс, а стр будет много. Передавать данные с этих стр на индекс бедем через GET 

начало документа...-->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

      	<?php foreach ($menu as $text => $link): ?> 
      	<?php $active = ($_GET['page']==$link)?' class="active"':'';?><!-- если выбраная ли, присвоили класс актив	// активна строка или нет. Актив асоциативный массив, взятый через адрессную стр-->
      	
        <li><a  href="index.php?page=<?= $link ?>" style="color:<?php echo ($_GET['page']==$link)?'#fff':'#9d9d9d'?>"><?= $text ?></a></li>
	     <?php endforeach;  ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?page=sing-up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="index.php?page=log-in"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
