<div class="shop__wrapper">
    <section class="shop__sorting">
        <div class="shop__sorting-item custom-form__select-wrapper">
            <select class="custom-form__select searchForm" name="sortingCategory">
                <option hidden="" value="">Сортировка</option>
                <option value="byPrice">По цене</option>
                <option value="byName">По названию</option>
            </select>
        </div>
        <div class="shop__sorting-item custom-form__select-wrapper">
            <select class="custom-form__select searchForm" name="sortingPrices">
                <option hidden="" value="">Порядок</option>
                <option value="ascending">По возрастанию</option>
                <option value="descending">По убыванию</option>
            </select>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/controller/mainShow.php'?>
        <p class="shop__sorting-res">Найдено <span class="res-sort"> <?=$totalProducts?> </span> моделей</p>
    </section>

    <section class="shop__list">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/mainList.php'?>
    </section>
    <ul class="shop__paginator paginator">
        <?php
        //Выводим погинацию в зависимости от количества товаров формируем количество страниц. 3 товара на страницу.
        $result = mysqli_query(
            getConnection(), $tableProducts
        );
        $countPage = ceil(mysqli_num_rows($result)/3);
        for ($numberPage = 1; $numberPage <= $countPage ; $numberPage++){?>
            <li>
            <a class="paginator__item .paginator__item--active" href="?page=<?=$numberPage?>"><?=$numberPage?></a>
        </li>
        <? }?>
    </ul>
</div>
</section>
