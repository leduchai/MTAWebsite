$( document ).ready(function() {

	//.................................... start js home.html

	//icon toggle menu khi responsive
	function myFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
			x.className += " responsive";
		} else {
			x.className = "topnav";
		}
	}

	// input-search, icon tìm kiếm
	$('.glyphicon-search').click(function(){

		$('#search').fadeToggle(300, function(){
			$(this).focus();
		});
		$(this).css({"font-size":"15px","background-color":"#e2e2e2","padding":"10px"});

		$(document).mouseup(function(e) 
		{

			var iconSearch = $(".glyphicon-search");
			var inputSearch = $("#search");

			if (!iconSearch.is(e.target) && iconSearch.has(e.target).length === 0 && !inputSearch.is(e.target) && inputSearch.has(e.target).length === 0) 
			{
				iconSearch.css({
					"background-color" : "#fff",
					"padding" : "0px"
				});

				inputSearch.fadeOut(300);

				$("#tag-a-search").hover(function(){
					iconSearch.css({
						"background-color" : "#e2e2e2",
						"padding" : "10px"
					})
				});

			}
		});

	});

	//............................... end js home.html


	//.................................srart js news.html

    /// custom mau so phan trang
    $('.page-link').click(function(){
        $(this).css({"background-color":"#005F37","color":"#fff"});
    });
    ////

    /// custom mau hover vao chuyen muc
    $('#category-name-1').hover(function(){
        $('#category-name-1 .category-link').css({ "color": "#005F37" });
        $('#category-name-1 .count').css({ "color": "#005F37", "cursor": "pointer" });
    });

    $('#category-name-1').mouseleave(function () {
        $('#category-name-1 .category-link').css({ "color": "#000" });
        $('#category-name-1 .count').css({ "color": "#000", "cursor": "pointer" });
    });

    $('#category-name-2').hover(function () {
        $('#category-name-2 .category-link').css({ "color": "#005F37" });
        $('#category-name-2 .count').css({ "color": "#005F37", "cursor": "pointer" });
    });

    $('#category-name-2').mouseleave(function () {
        $('#category-name-2 .category-link').css({ "color": "#000" });
        $('#category-name-2 .count').css({ "color": "#000", "cursor": "pointer" });
    });

    $('#category-name-3').hover(function () {
        $('#category-name-3 .category-link').css({ "color": "#005F37" });
        $('#category-name-3 .count').css({ "color": "#005F37", "cursor": "pointer" });
    });

    $('#category-name-3').mouseleave(function () {
        $('#category-name-3 .category-link').css({ "color": "#000" });
        $('#category-name-3 .count').css({ "color": "#000", "cursor": "pointer" });
    });

    $('#category-name-4').hover(function () {
        $('#category-name-4 .category-link').css({ "color": "#005F37" });
        $('#category-name-4 .count').css({ "color": "#005F37", "cursor": "pointer" });
    });

    $('#category-name-4').mouseleave(function () {
        $('#category-name-4 .category-link').css({ "color": "#000" });
        $('#category-name-4 .count').css({ "color": "#000", "cursor": "pointer" });
    });

    $('#category-name-5').hover(function () {
        $('#category-name-5 .category-link').css({ "color": "#005F37" });
        $('#category-name-5 .count').css({ "color": "#005F37", "cursor": "pointer" });
    });

    $('#category-name-5').mouseleave(function () {
        $('#category-name-5 .category-link').css({ "color": "#000" });
        $('#category-name-5 .count').css({ "color": "#000", "cursor": "pointer" });
    });

    ///

    ///custom cho nhung tin tuc tieu diem
    $('.img-vertical-new, .img-horirontal-new').hover(function () {
        $('.title-for-new, .date-for-new').css({ "opacity": "0.7" });
    });

    $('.img-vertical-new, .img-horirontal-new').mouseleave(function () {
        $('.title-for-new, .date-for-new').css({ "opacity": "1" });

    });


    //...............................end js news.html



    //...............................start js btn liên hệ

    $('#btn-contact').hover(function () {
        $('button > a').css({ "color": "#fff" });
    });
    $('#btn-contact').mouseleave(function () {
        $('button > a').css({ "color": "#005F37" });
    });

    //...............................end js btn liên hệ


});

