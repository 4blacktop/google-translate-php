<?php
// вывод хэдера для броузера
header("Content-Type: text/html; charset=utf-8");

// N0 LIIMITS
set_time_limit(0);
ini_set('memory_limit', '512M');

// запускаем таймер выполнения скрипта
$mtime = microtime(true);

require("GTranslate.php");

// $translate_string = "
// Не глядя, просто просил маленькую машину мотаться по городу.
// Тогда это было проще. Взяли  
// Согласен, что маленькие машины только для города, по комфорту балалайки, что-то другое ожидать от них тяжело.
// Но по ходовой. Задний мост - балка, амортизаторы, пружины,  100000 пробега по Сахалину - ничего, кроме резинок.
// Пружины - спрашивали поднимал, Нет. 
// Только поменял подшипник ступицы задний левый.
// Передние стойки менял через два года
// ";

$lines = file("pages.txt");

// Осуществим проход массива и выведем номера строк и их содержимое в виде HTML-кода.
foreach ($lines as $line_num => $translate_string)
	{
    // echo "Строка #<b>{$line_num}</b> : " . htmlspecialchars($translate_string) . "<br />\n";
	try
		{
		$pause = (rand (1,3));
		$sumpause = $sumpause + $pause;
		sleep ($pause);
		// echo "<br /><br />пауза $pause сек...<br />";
		// echo "<br />$translate_string";
		
		$gt = new Gtranslate;
		$gt->setRequestType('curl');
		echo $gt->russian_to_english($translate_string)."<br />";
		}

	catch (GTranslateException $ge) {
	echo $ge->getMessage();
	}
	
	}


echo "<br /><br />Время работы скрипта: " . round((microtime(true) - $mtime) * 1, 4) . " с.";
echo "<br />Задержки $sumpause с.";

?>
