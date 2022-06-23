<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ОСББ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body id="main-page">
<?php 
      $file= @file('files/counter.txt');
      $count = @implode('', $file);
      $count++;
      $myFile=fopen('files/counter.txt','w');
      fputs($myFile, $count);
      fclose($myFile);
?>
<header class="d-flex align-items-center justify-content-between">
    <div class="d-flex flex-column align-items-center justify-content-center logo">
        <h1>ОСББ</h1>
        <p class="abbr">Об'єднання співвласників багатоквартирного будинку</p>
    </div>
    <div class="sidebar">
        <ul class="sidebarUl">
            <li class="sidebarLi"><a href="#main-page">Головна</a></li>
            <li class="sidebarLi"><a href="#news">Новини</a></li>
            <li class="sidebarLi"><a href="#projects">Проекти</a></li>
            <li class="sidebarLi"><a href="#debtors">Боржники</a></li>
            <li class="sidebarLi"><a href="#contacts">Контакти</a></li>
            <li class="sidebarLi"><a href="form.php">Залишити повідомлення</a></li>
        </ul>
        <button class="sidebarBtn d-flex align-items-center justify-content-center">
            <span></span>
        </button>
    </div>
</header>
<main class="d-flex align-items-center">
    <p class="view-line">Кількість переглядів: <?=$count?></p>
    <section class="d-flex align-items-center">
        <p class="text-design">
            ОСББ було створене для покращення житлових умов. <br>
            Усі свої бажання та пропозиції можна висловити на гарячу лінію, <br>
            електронну скриньку чи в наших соцмережах. <br>
            Також, за необхідності, можна заернутись у головний офіс у під'їзді №1.<br>
        </p>
        <img src="img/main.jpg" alt="main image">
    </section>
    <section id="news" class="d-flex align-items-center">
        <div>
            <h2>Новини</h2>
            <ul class="text-design">
                <li>Триває збір коштів на очистку і збільшення ставка у парку.</li>
                <li>Шукаємо садівника для догляду за парком і клумбами.</li>
                <li>Отримано дозвіл на будівництво скейт-парку.</li>
                <li>Запрошуємо всіх охочиш приєднатись до толоки цієї суботи.</li>
            </ul>
        </div>

        <img src="img/news.jpg" alt="news image">
    </section>
    <section id="projects" class="d-flex align-items-center">
        <div>
            <h2>Проекти</h2>
            <ul class="text-design">
                <li>Будівництво скейт-парку вже почато.</li>
                <li>Планується висадка дерев і озеленення прибудинкових територій.</li>
                <li>Подано заяву на відновлення пішохідних доріжок.</li>
            </ul>
        </div>


        <img src="img/project.jpg" alt="project image">
    </section>
    <section id="debtors">
        <h2>Таблиця боржників</h2>
        <p style="color: red; font-size: 18px"><b>Боржники повинні сплатити борги в найкоротші термніни. При перевищенні
            терміну сплати
            боргу будуть
            застосоувватись санкції.</b></p>
        <?php
        $f = fopen("files/info.txt", "r");
        $col = 0;
        $i = 0;
	echo "<table>";
	echo "<tr><th>ПІБ</th><th>Борг(грн)</th></tr>";
        while(!feof($f)){
		$inf = fgets($f);
	    	echo "<tr><td>".str_replace(',','</td><td>', $inf)."</td></tr>";
	}
	echo "</table>";
        fclose($f);
        ?>
    </section>
    <button id="ScrTopBtn">Вгору</button>
</main>
<footer id="contacts" class="d-flex flex-column align-items-center justify-content-center">
    <h2>Наші контакти</h2>
    <ul>
        <li><a href="#">+380971234567</a></li>
        <li><a href="#">FACEBOOK</a></li>
        <li><a href="#">TELEGRAM</a></li>
        <li><a href="#">GMAIL</a></li>
    </ul>
</footer>
</body>
</html>
<!doctype html>
