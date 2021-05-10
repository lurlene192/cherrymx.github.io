(function($) {
    $(function(){
var ink, d, x, y;
$(".menuclass li a").click(function(e){ // событие клика
if($(this).find(".ink").length === 0){ // Проверяем наличия слоя ребенка. Если его нет то добавляем его 
$(this).prepend("<span class='ink'></span>");
}

ink = $(this).find(".ink");
ink.removeClass("animate");

if(!ink.height() && !ink.width()){ // вычисляем высоту и ширину
d = Math.max($(this).outerWidth(), $(this).outerHeight());
ink.css({height: d, width: d});
}

x = e.pageX - $(this).offset().left - ink.width()/2; //получаем координаты
y = e.pageY - $(this).offset().top - ink.height()/2;

ink.css({top: y+'px', left: x+'px'}).addClass("animate"); // анимируем
});
});
})(jQuery)