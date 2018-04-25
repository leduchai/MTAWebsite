$(document).ready(function(){

//......................start js slider home

$('.example-using-css').DrSlider({
	'userCSS': true
});
//......................end js slider home


//......................start js slider carousel
                    var owl = $('.owl-carousel');
                    owl.owlCarousel({
                        loop: false,
                        nav: true,
                        margin: 30,
                        responsive: {
                            0: {
                                items: 2
                            },
                            600: {
                                items: 3
                            },
                            960: {
                                items: 5
                            },
                            1200: {
                                items: 5
                            }
                        }
                    });
                    owl.on('mousewheel', '.owl-stage', function (e) {
                        if (e.deltaY > 0) {
                            owl.trigger('next.owl');
                        } else {
                            owl.trigger('prev.owl');
                        }
                        e.preventDefault();
                    });

//......................start js slider carousel

});