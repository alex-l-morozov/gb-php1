$('.cart-add').on('click', function(e) {
    e.preventDefault(); //отменить выполнение действия по умолчанию
    e.stopPropagation(); //остановить дальнейшее всплытие события
    $.ajax({
        type: "GET",
        dataType: "html",
        url: './addcart.php?product_id=' + $(this).attr('data-product-id'),
        success: function (data) {
        }
    });
});
$('.cart-del').on('click', function(e) {
    e.preventDefault(); //отменить выполнение действия по умолчанию
    e.stopPropagation(); //остановить дальнейшее всплытие события
    $.ajax({
        type: "GET",
        dataType: "html",
        url: './delcart.php?product_id=' + $(this).attr('data-product-id'),
        success: function (data) {
            location.reload();
        }
    });
});
