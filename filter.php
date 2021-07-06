<?php

include 'config.php';

$sql = "SELECT p.name, p.price, p.imgName, p.new, p.sale, c.url FROM products as p
      LEFT JOIN categories as c on p.category_id = c.id WHERE 1";
$sqlTotal = "SELECT COUNT(*) AS total FROM products as p
      LEFT JOIN categories as c on p.category_id = c.id WHERE 1";
$page = $_POST['page'] ?? 1;
$where = "";
if ($_POST['category'] && $_POST['category'] != 'all') {
    $where .= ' AND url = ' . "'". $_POST['category']. "'" ;
}
if ($_POST['priceFrom']) {
    $where .= ' AND p.price >= ' . intval($_POST['priceFrom']);
}
if ($_POST['priceTo']) {
    $where .= ' AND p.price <= ' . intval($_POST['priceTo']);
}
if ($_POST['new']) {
    $where .= ' AND p.new = 1';
}
if ($_POST['sale']) {
    $where .= ' AND p.sale = 1';
}

if ($_POST['sortingCategory'] == 'byPrice') {
    $where .= ' ORDER BY p.price';
}
if ($_POST['sortingCategory'] == 'byName') {
    $where .= ' ORDER BY p.name';
}
if ($_POST['sortingPrices'] == 'descending' && !empty($_POST['sortingCategory'])) {
    $where .= ' DESC';
}

$sql = $sql . $where . ' LIMIT 3';
$sqlTotal = $sqlTotal . $where;

$result = mysqli_query(getConnection(), $sql);
$resultTotal = mysqli_query(getConnection(), $sqlTotal);

$rowTotal = mysqli_fetch_assoc($resultTotal);

$products = [];
while ($row = mysqli_fetch_assoc($result)){
    $products[] = $row;
}
$pages = ceil($rowTotal['total'] / 3);
echo json_encode(['products' => $products, 'total' => (int)$rowTotal['total'], 'perPage' => 3, 'page' => $page, 'pages' => $pages]);


