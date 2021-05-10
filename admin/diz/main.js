$(document).ready(function(){
	
	$(".silver").hover(function(){
		$(".statusInfo div").stop().fadeOut(300);
		$(".statusSilver").stop().fadeIn(300);
	}, function(){
		$(".statusInfo div").stop().fadeOut(300);
		$(".statusText").stop().fadeIn(300);
	});
	
	$(".gold").hover(function(){
		$(".statusInfo div").stop().fadeOut(300);
		$(".statusGold").stop().fadeIn(300);
	}, function(){
		$(".statusInfo div").stop().fadeOut(300);
		$(".statusText").stop().fadeIn(300);
	});
	
	$(".platinum").hover(function(){
		$(".statusInfo div").stop().fadeOut(300);
		$(".statusPlatinum").stop().fadeIn(300);
	}, function(){
		$(".statusInfo div").stop().fadeOut(300);
		$(".statusText").stop().fadeIn(300);
	});
	
	$(".premium").hover(function(){
		$(".statusInfo div").stop().fadeOut(300);
		$(".statusPremium").stop().fadeIn(300);
	}, function(){
		$(".statusInfo div").stop().fadeOut(300);
		$(".statusText").stop().fadeIn(300);
	});
	

    $(".gameTabs li a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".gameTabsContItem").not(tab).css("display", "none");
        $(tab).fadeIn();
    });

	
});