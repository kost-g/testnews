
var $menu = $(".news_menu"), // кэшируем в переменную меню
    $links = $menu.find("a"); // кэшируем в переменную ссылки

$links.on("click", function() {
    $menu.children().removeClass("active"); // убираем класс у всех пунктов
    $(this).parent().addClass("active"); // добавляем к пункту, содержащему нажатую ссылку
});
