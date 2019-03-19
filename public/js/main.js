function mobileCheck(){
	var winWidth=$(window).width();
	if (winWidth<=768) {
		$("#sidebar").after($("#body .pagination:first"))
	} else {
		$(".products-wrap").before($("#body .pagination:first"))
	}
}

$(document).ready(function() {
    $("input[type=radio]").crfi();
	$("select").crfs();
	$("#slider ul").bxSlider({
		controls: false,
		auto: true,
		mode: 'fade',
		preventDefaultSwipeX: false
	});
	$(".last-add .products").bxSlider({
		pager: false,
		minSlides: 1,
		maxSlides: 4,
		slideWidth: 293,
		slideMargin: 0
	});
    $(".tabs .nav a").click(function() {
        var container = $(this).parentsUntil(".tabs").parent();
        if (!$(this).parent().hasClass("active")) {
            container.find(".nav .active").removeClass("active")
            $(this).parent().addClass("active")
            container.find(".tab-content").hide()
            $($(this).attr("href")).show();
        };
        return false;
    });
	$("#price-range").slider({
		range: true,
		min: 0,
		max: 5000,
		values: [ 500, 3500 ],
		slide: function( event, ui ) {
			$(".ui-slider-handle:first").html("<span>$" + ui.values[ 0 ] + "</span>");
			$(".ui-slider-handle:last").html("<span>$" + ui.values[ 1 ] + "</span>");
		}
	});
	$(".ui-slider-handle:first").html("<span>$" + $( "#price-range" ).slider( "values", 0 ) + "</span>");
	$(".ui-slider-handle:last").html("<span>$" + $( "#price-range" ).slider( "values", 1 ) + "</span>");

	mobileCheck();
	$(window).resize(function() {
		mobileCheck();
	});
});