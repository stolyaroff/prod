<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/urlFunc.php'; //Подключаем функцию получения данных из строки

$showCategories = 'select url, category from categories'; //Формируем запрос к БД, таблицу категории и URL
    $result = mysqli_query(
        getConnection(), $showCategories // Выполняем запрос к БД
    ); ;?>
    <ul class="filter__list">
        <?//Выводим информацию в основное меню
        //$row['url'] - формирует uri категории
        //$row['category'] - выводит название категории
        //urlPath() == $row['url'] ? 'active' : '' - выделение активных пунктов
    while ($row = mysqli_fetch_assoc($result)) //Присваеваем $row ассциативный массив где название столбца ключ, строка значение
    { ?>
        <li>
            <a class="filter__list-item <?=urlPath() == $row['url'] ? 'active' : ''?>" href="<?=$row['url']?>"><?=$row['category']?></a>
        </li>
    <?php } ?>
    </ul>

