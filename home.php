<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Language" content="ru" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Roboto:300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<script src="04-Skript/jquery-1.11.1.min.js"></script>

<script src="04-Skript/acc.js"></script>

<script type="text/javascript" src="04-Skript/skript.js"></script>

<title>Books</title>
<meta name="keywords" content="Ключевые слова" />
<meta name="description" content="Описание страницы" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" media="screen and (min-width: 801px) " href="03-Style/b/00-Super-b.css" />
<link rel="stylesheet" media="screen and (max-width: 800px) " href="03-Style/m/00-Super-m.css" />
<!--[if IE ]> <link rel="stylesheet" href="03-Style/b/00-Super-b.css" /><![endif]-->


<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

<script type="text/javascript">
    $(document).ready(function () {
        var url = document.location.toString();
        $("a").filter(function () {
            return url.indexOf(this.href) != -1;
        }).addClass("Current");
    }); 
</script>
</head>

<body>

<div id="list">
				<table class="Shapka">
								<tr>
												<th>
												<a href="home.php"><img alt="" src="07-Images/logo.png" style="width: 141px; height: 60px" /></a></th>
																				</tr>
				</table>
				<table class="Тelo">
								<tr>
												<td style="background-color: #FFFFFF">
												<table style="width: 100%; height: auto; border: 2px solid #ffffff">
																<tr>
																				<td>																				
																				<form name="search" method="post" action="index.php">
																				<input type="search" name="query" placeholder="Поиск">
																				<input type="submit" value="Найти">
																				</form>																			
																				</td>
																</tr>
																<tr>
																	<td>
																	<div id="accordeon">
                                                                     <div class="acc-head">
                                                                         <b>Авторы</b><span class="acc-text">+</span>
                                                                     </div>
                                                                   <div class="acc-body">
                                                                        <form name="search" method="post" action="index.php">
																		<input type="checkbox" name="query" value="Наталья Краснова"/>Наталья Краснова
																		<input type="checkbox" name="query" value="Майкл Гибни"/>Майкл Гибни
																		<input type="checkbox" name="query" value="Александр Мазин"/>Александр Мазин
																		<input type="checkbox" name="query" value="Эми Хатвани"/>Эми Хатвани
																		<br/>
																		<input type="checkbox" name="query" value="Джоджо Мойес"/>Джоджо Мойес
																		<input type="checkbox" name="query" value="Денис Целых"/>Денис Целых
																		<input type="checkbox" name="query" value="Сергей Тармашев"/>Сергей Тармашев
																		<input type="checkbox" name="query" value="Максим Керн"/>Максим Керн
																		<br/>
																	<div class="buttom">																													
																		<input type="submit" value="Найти"/>
																	</div>		
																		</from>
                                                                     </div>
                                                                   </div>
                                                                   <br/>
                                                                   <div id="accordeon">
                                                                     <div class="acc-head">
                                                                         <b>Жанры</b><span class="acc-text">+</span>
                                                                     </div>
                                                                   <div class="acc-body">
                                                                        <form name="search" method="post" action="index.php">
																		<input type="checkbox" name="query" value="Истории из жизни"/>Истории из жизни
																		<input type="checkbox" name="query" value="Любовь и отношения"/>Любовь и отношения
																		<input type="checkbox" name="query" value="Спорт / фитнес"/>Спорт / фитнес
                                                                        <input type="checkbox" name="query" value="Современные любовные романы"/>Современные любовные романы

																		<br/>
																		<input type="checkbox" name="query" value="Боевая фантастика"/>Боевая фантастика
																		<input type="checkbox" name="query" value="Зарубежные любовные романы"/>Зарубежные любовные романы
																		<input type="checkbox" name="query" value="Героическое фэнтези"/>Героическое фэнтези
                                                                        <input type="checkbox" name="query" value="Кулинария"/>Кулинария
																		<br/>
																	<div class="buttom">																													
																		<input type="submit" value="Найти"/>
																	</div>		
																		</from>
                                                                     </div>
                                                                   </div>
																	</td>
																</tr>																
																																				
																				<?php

function link_bar($page, $pages_count)
{
for ($j = 1; $j <= $pages_count; $j++)
{
// Вывод ссылки
if ($j == $page) {
echo '<a class="Current link" ><b>'.$j.'</b></a>';
} else {
echo ' <a class="link" href='.$_SERVER['name'].'?page='.$j.'>'.$j.'</a> ';
}
// Выводим разделитель после ссылки, кроме последней
// например, вставить "|" между ссылками
if ($j != $pages_count) echo ' ';
}
return true;
} // Конец функции

// Подключение к базе данных
mysql_connect('localhost', 'root', '') or die('error! Нет соединения с сервером mysql!');
mysql_select_db('books') or die('error! Нет соединения с базой данных!');
// Подготовка к постраничному выводу
$perpage = 5; // Количество отображаемых данных из БД

if (empty($_GET['page']) || ($_GET['page'] <= 0)) {
$page = 1;
} else {
$page = (int) $_GET['page']; // Считывание текущей страницы
}
// Общее количество информации
$count = mysql_numrows(mysql_query('select * from articles')) or die('error! Записей не найдено!');
$pages_count = ceil($count / $perpage); // Количество страниц

// Если номер страницы оказался больше количества страниц
if ($page > $pages_count) $page = $pages_count;
$start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД

$result = mysql_query('select * from articles limit '.$start_pos.', '.$perpage) or die('error!');
while ($row = mysql_fetch_array($result)) {
echo '
<tr style="border-bottom: 1px solid #DBDBDB">
           <td>
           <div class="biblio_book_left column">
                        <img class="biblio_book_img" src="'.$row['img'].'"/>
           <div/> 
            <div class="biblio_book_center column">
             <h1 class="biblio_book_name">'.$row['title'].'</h1>
             <div class="biblio_book_author">
             <span class ="biblio_book_author_title">Автор: <span style="color:#22a7d8">'.$row['autor'].'</span></span></br>
             <span class ="biblio_book_author_title_1">Жанар: <span style="color:#22a7d8">'.$row['janar'].'</span></span>
             <div/>
          <div class="biblio_book_descr">   
             <div class="biblio_book_descr_caption">Аннотация</div>    
             '.$row['text_article'].'
          </div>   
            <div/>
           </td>           
        </tr>
';
}


?>
																																
												</table>
												</td>
												
								</tr>									
				</table>
<div style="text-align:center">
<span style="font-weight: bold; font-size: 16px;">Страница:</span>
<?php
// Вызов функции, для вывода ссылок на экран
link_bar($page, $pages_count);
?>	
</div>				
				<p style="margin-bottom: 16px">© <span lang="en-us">
				<span style="color: #e59285">Bo</span>oks.ru</span></p>
</div>


</body>

</html>
