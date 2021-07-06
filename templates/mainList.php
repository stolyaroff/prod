<?php
//Выводим информацию в основное меню
$result = mysqli_query(getConnection(), $tableProductsFinal);

while ($row = mysqli_fetch_assoc($result)) {?>
    <article class="shop__item product" tabindex="0">
        <div class="product__image">
            <img src="/img/products/<?=$row['imgName'];?>" alt="product-name">
        </div>
        <p class="product__name" href="/templates/orderForm.php"><?=$row['name'];?></p>
        <span class="product__price"><?=$row['price'];?> руб.</span>
    </article>
<?php }?>