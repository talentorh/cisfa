$('.lnr-menu').on('click', function(){
    
    $('.menu').toggleClass("menu-show");
    $('main').toggleClass("main-move");
})

$(document).ready(function() {
    $('.mdb-select').materialSelect();
    });