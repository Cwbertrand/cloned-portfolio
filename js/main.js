




/*
window.addEventListener("scroll", function(){
    let navscroll = document.querySelector("header");

    if(window.pageYOffset > 0){
        navscroll.classList.add("stick");
    }else{
        navscroll.classList.remove("stick");
    }
});
*/

window.addEventListener("scroll", reveal);

function reveal(){
    var animation = document.querySelectorAll('.scroll');

    for (let i = 0; i < animation.length; i++) {
        const windowheight = window.innerHeight;
        const revealtop = animation[i].getBoundingClientRect().top;
        const revealpoint = 10;

        if (revealtop < windowheight - revealpoint) {

            animation[i].classList.add('active');  
        }else{

            animation[i].classList.remove('active');
        }
        
    }
}


$(document).ready(function(){

    $(window).scroll(function(){
        if($(this).scrollTop() > 5) {
            $('#header').addClass('stick');
        } else {
            $('#header').removeClass('stick');
        }
    });

    $(window).on("load", function(){
        $(".background").fadeOut("slow");
    });


    $('#myCarousel').carousel({
        interval: 2000
    })
    $('.carousel .carousel-item').each(function() {
        var minPerSlide = 4;
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < minPerSlide; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });

    $('.alert').delay(5000).fadeOut(2000);


});



// typing effect annimation

var typed = new Typed(".typing", {
    strings: ["Développeur Web junior", "Conception d'applications", "blogueur", "pigiste"],
    typeSpeed: 100,
    backSpeed: 60,
    loop: true
});

var typed =  new Typed(".typing-2", {
    strings: ["Développeur Web junior", "Conception d'applications", "blogueur", "pigiste"],
    typeSpeed: 100,
    backSpeed: 60,
    loop: true
});
