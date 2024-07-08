//Selectors
let header=document.querySelector('.header');
let hamburgerMenu=document.querySelector('.hamburger-menu');

window.addEventListener('scroll',function (){
    let windowPosition=window.scrollY>0;
    header.classList.toggle('active',windowPosition)
})

hamburgerMenu.addEventListener('click',function(){
    header.classList.toggle('menu-open');
})

document.onreadystatechange = function () {
    var state = document.readyState
    if (state == 'interactive') {
        document.getElementById('contentss').style.visibility="hidden";
    } else if (state == 'complete') {
        setTimeout(function(){
            document.getElementById('interactive');
            document.getElementById('load').style.visibility="hidden";
            document.getElementById('contentss').style.visibility="visible";
        },1000);
    }
}


var mySwiper = new Swiper('.s1', {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});


var mySwiper2 = new Swiper('.s2', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: '.swiper-pagination',
    },
});