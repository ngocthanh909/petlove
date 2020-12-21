window.onload = function(){
    resetNavbar();
    activeOwlCarousel();
}

function activeOwlCarousel(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots: true,
        pagination:false,
        navigation:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
    $('.owl-example').owlCarousel({
        loop:true,
        items:1,
    })

}

function resetNavbar(){
    resetNavbarButton();
    resetNavbarTabs();
    resetNavbarPopovers();
}


$(window).on('resize', function(){
    var win = $(this); //this = window
    if (win.width() <= 992) {
        resetNavbar();
    }
});


function resetNavbarButton(){
    var navButton = document.getElementsByClassName("nav-button");
    for (i = 0; i < navButton.length; i++) {
        navButton[i].className = navButton[i].className.replace("navbtn-desktop-active","").replace("navbtn-mobile-active","");
    }
}

function resetNavbarTabs(){
    var tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
}


function resetNavbarPopovers(){
    var popovers = document.getElementsByClassName("simple-menu");
    for (i = 0 ; i < popovers.length ; i++ ){
        popovers[i].style.display = "";
    }
}

function openNav(evt,nav){
    if ($(window).width() < 992) {
        resetNavbarButton();
        resetNavbarTabs();
        document.getElementById(nav).style.display = "block";
        evt.currentTarget.className += " navbtn-mobile-active";
    }
    else {
        if (nav != "tab-search"){
            resetNavbarButton();
            var displayStatus = document.getElementById(nav+"-desktop").style.display;
            if (displayStatus == ""){
                resetNavbarPopovers();
                document.getElementById(nav+"-desktop").style.display = "block";
                evt.currentTarget.className += " navbtn-desktop-active";
            }
            else {
                evt.currentTarget.className = evt.currentTarget.className.replace("navbtn-desktop-active", "");
                document.getElementById(nav+"-desktop").style.display = "";
            }
        }
    }
}

function showCategories(){
    var x = document.getElementById("categoriesExpand").style.display;
    if (x === ""){
        document.getElementById("categoriesExpand").style.display = "block";
    }
    else {
        document.getElementById("categoriesExpand").style.display = "";
    }
}