<?php
        //Получаем значение из адресной строки
        include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/urlFunc.php';

        //Формируем запрос к БД, в зависимости от того в какой категории мы находимся.
        $tableProducts = "SELECT p.name, p.price, p.imgName, p.new, p.sale, c.url FROM products as p
                              LEFT JOIN categories as c on p.category_id = c.id
                              WHERE 1";

        if (urlPath() == 'all' || empty(urlPath())) {
            $tableProducts .= "";
        }elseif(!empty(urlPath())){
            $tableProducts .= " AND url=" . "'". urlPath() . "'";
        }
        if (!empty($_GET['priceFrom'])){
            $tableProducts .= " AND price >= " . $_GET['priceFrom'];
        }
        if (!empty($_GET['priceTo'])){
            $tableProducts .= " AND price <= " . $_GET['priceTo'];
        }
        if (!empty($_GET['new'])){
            $tableProducts .= " AND new = 1";
        }
        if ($_GET['category'] && $_GET['category'] != 'all') {
            $where .= ' AND url = ' . "'" . $_GET['url'] . "''" ;
        }
        if (!empty($_GET['sale'])){
            $tableProducts .= " AND sale = 1";
        }
        if (!empty($_GET['sortingCategory'])){
            $tableProducts .= " AND sale = 1";
        }
        if (!empty($_GET['sortingCategory'] == 'byPrice')) {
            $tableProducts .= ' ORDER BY p.price';
        }
        if (!empty($_GET['sortingCategory'] == 'byName')) {
            $tableProducts .= ' ORDER BY p.name';
        }
        if (!empty($_GET['sortingPrices'] == 'descending' && !empty($_POST['sortingCategory']))) {
            $tableProducts .= ' DESC';
        }

        $totalProducts = mysqli_num_rows(mysqli_query(getConnection(), $tableProducts));

        //Делаем ограничение для пагинации. С помощтью GET['page'] определяем на какой страницы находимся,
        //и формируем запрос для вывода с ограничением количества товаров на страницу
        if(isset($_GET['page']) && $_GET['page']>1){
            $countProductPerPage = 3; //Количество товаров на странице
            $page = $_GET["page"]; //Данные о номере страницы
            $shift = $countProductPerPage * ($page - 1); //Выборка товаров из таблицы с учетом номера страницы
            $tableProductsFinal = $tableProducts . " LIMIT " . "$shift," . "$countProductPerPage"; //Запрос к БД
        }else{
            $tableProductsFinal = $tableProducts. " LIMIT " . "3";
        }
