
//jquery
$(document).ready(function () {
	$("#buttonburger").click(function () {

    $(".burger").slideToggle(500);
});
	$(".dropperphone").click(function () {

    $(".dropdownphone").slideToggle(500);
});

	$(".details").click(function () {
			$header = $(this);
			$content = $header.next();
			$content.slideToggle(500, function () {
				$header.text(function () {
            return $content.is(":visible") ? "Moins de details  \u21d3" : "Plus de details  \u21d2";
        });
			});
});


  // $('.fadein img:gt(0)').hide();
  // setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);


});


//javascripts

let topbutton = document.getElementById("topbutton");

window.onscroll = function () {scrolling()}

function scrolling() {
	if (document.documentElement.scrollTop > 20) {
		topbutton.style.display = "block";
	}
	else {
		topbutton.style.display = "none";
	}
}

function topfunction() {
  // document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

