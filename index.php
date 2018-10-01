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
																		<br/
																	<div class="buttom">																													
																		<input type="submit" value="Найти"/>
																	</div>		
																		</from>
                                                                     </div>
                                                                   </div>
																	</td>
																</tr>																
																<tr>
																				<td>																				
																				<?php // <==================================================================================================================
// ==================================================> ------------- <======================================================
// ===============================================> © Copyright barik <=============================> Скрипт: ПОИСК ПО САЙТУ
// ==================================================> ------------- <======================================================
// =========================================================================================================================
require_once('db.php'); // =======================================================================> Подключение к бае-данных
function search ($query){ // =================================================================> Обработка поискового запроса
$text = ''; // ===============================================================================> Переменная для вывода текста
// ============================================================================================>  Проводим фильтрацию данных
$query = trim($query); // ==================================================================>  Обрезаем пробелы и спецсиволы
$query = strip_tags($query); // ==================================================================>  Удаляем HTML и PHP теги
$query = mysql_real_escape_string($query); // =============================================>  Экранируем специальные символы
if(!empty($query)){ // ====================================================================> Если поисковый запрос не пустой
  if(strlen($query) < 2){ // ================================================================> Если запрос меньше 4 символов
    $text = '<p>Слишком короткий поисковый запрос.</p>';} // ==================================================> Сообщение об ошибке
  else if(strlen($query) > 128){ // ===============================================================> Если более 128 символов
    $text = '<p>Слишком длинный поисковый запрос.</p>';} // ===================================================> Сообщение об ошибке
  else{ // =================================================================================================> Если всё верно
    $sql = "SELECT * FROM articles WHERE title LIKE '%$query%' OR autor LIKE '%$query%' OR janar LIKE '%$query%'"; // ===> Формируем строку поискового запроса
    $result = mysql_query($sql); // =======================================================================> И выполняем его
    $num = mysql_num_rows($result); // =========================================> Определим колличество найденных совпадений
    if($num > 0){ // =================================================================================> Если совпадения есть
      $row = mysql_fetch_assoc($result); // =================================================> Получаем ассоциативный массив
      $text .= '<p>По вашему запросу  <strong>'.$query.'</strong>'; // =====> И начинаем формировать строку поисковой выдачи
      $text .= ' найдено '.$num.' совпадений</p>' ; // ===================================> Показываем количество совпадениц
      // ===================================================================================================================
      do { // ==========================================================================> Динамический вывод всех совпадений
         $text .= '<tr style="border-bottom: 1px solid #DBDBDB">
           <td style="border-color: #FFFFFF; border-width: 0;">
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
        </tr>';
      }
      while($row = mysql_fetch_assoc($result));} // =================================> Делаем это пока у нас есть результаты
    else{ // =============================================================================> Если найти совпадение не удалось
      $text = '<p>По вашему запросу ничего не найдено.</p>';}}} // ====================================> Сообщение о неудаче
 else{ // =========================================================================================> Если запрос был пустой
    $text = '<p>Задан пустой поисковый запрос.</p>';} // ==============================================> Сообщение об ошибке
return $text;} // =======================================================> Возвращаем сформированную строку поисковой выдачи
// =========================================================================================================================
// ==================================================================================================> Сам скрипт обработчик
if(isset($_POST['query'])){ // ===========================================================================> Если есть запрос
  $connect = connectDB(); // ==========================================================> Открываем соединение с базой данных
  $search_result = search($_POST['query']); // ================================================> Определяем поисковый запрос 
  echo $search_result; // =========================================================================================> Выводим
  closeDB ($connect);} // ============================================================> Закрываем соединение с  базой данных
// =========================================================================================================================
// =========================================================================================================================
// ==============================================================================================> // Скрипт: ПОИСК ПО САЙТУ
// =========================================================================================================================
// =====================================================================================================================> ?>

																				</td>
																</tr>
												</table>
												</td>
												
								</tr>
				</table>
				<p style="margin-bottom: 16px">© <span lang="en-us">
				<span style="color: #e59285">Bo</span>oks.ru</span></p>
</div>


</body>

</html>
