<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/urlFunc.php';
?>
<main class="shop-page">
    <header class="intro">
        <div class="intro__wrapper">
            <h1 class=" intro__title">COATS</h1>
            <p class="intro__info">Collection 2018</p>
        </div>
    </header>
<section class="shop container">
    <section class="shop__filter filter">
        <form class="searchForm">
            <input type="hidden" name="priceFrom" id="priceFrom" value=""/>
            <input type="hidden" name="priceTo" id="priceTo" value=""/>
            <input type="hidden" name="category" id="category" value="<?=urlPath()?>"/>
            <div class="filter__wrapper">
                <b class="filter__title">Категории</b>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/controller/menuCategories.php' ?>
            </div>
            <div class="filter__wrapper">
                <b class="filter__title">Фильтры</b>
                <div class="filter__range range">
                    <span class="range__info">Цена</span>
                    <div class="range__line" aria-label="Range Line"></div>
                    <div class="range__res">
                        <span class="range__res-item min-price">350 руб.</span>
                        <span class="range__res-item max-price">32 000 руб.</span>
                    </div>
                </div>
            </div>
            <fieldset class="custom-form__group">
                <input type="checkbox" name="new" id="new" class="custom-form__checkbox">
                <label for="new" class="custom-form__checkbox-label custom-form__info" style="display: block;">Новинка</label>
                <input type="checkbox" name="sale" id="sale" class="custom-form__checkbox">
                <label for="sale" class="custom-form__checkbox-label custom-form__info" style="display: block;">Распродажа</label>
            </fieldset>
            <button class="button" type="submit" style="width: 100%">Применить</button>
        </form>
    </section>