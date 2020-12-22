/*global $, document, window, jQuery, changeColOrder*/
$(document).ready(function () {

    'use strict';

    // ------------------------------------------------------- //
    //   Multilevel dropdowns
    // ------------------------------------------------------ //

    $(".dropdown-menu [data-toggle='dropdown']").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation();

        $(this).siblings().toggleClass("show");


        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

    });

    // ------------------------------------------------------- //
    // Make a sticky navbar on scrolling
    // ------------------------------------------------------ //
    $(window).scroll(function () {

        function makeItFixed(x) {

            var body = $('body'),
                navbar = $('nav.navbar');

            if ($(window).scrollTop() >= x) {
                navbar.addClass('fixed-top');
                body.css('padding-top', $('nav.navbar').outerHeight());
            } else {
                navbar.removeClass('fixed-top');
                body.css('padding-top', '0');
            }
        }

        makeItFixed($('.top-bar').outerHeight());
    });


    // ------------------------------------------------------- //
    // shipping form validation
    // ------------------------------------------------------ //
    $('#shipping-address-form').validate({
        messages: {
            firstname: 'please enter your first name',
            lastname: 'please enter your last name',
            email: 'please enter your email address',
            number: 'please enter your phone number',
            address: 'please enter your address',
            city: 'please enter your city',
            country: 'please enter your country',
            postalcode: 'please enter your postal code',
            region: 'please enter your region',
            sfirstname: 'please enter your first name',
            slastname: 'please enter your last name',
            semail: 'please enter your email address',
            snumber: 'please enter your phone number',
            saddress: 'please enter your address',
            scity: 'please enter your city',
            scountry: 'please enter your country',
            spostalcode: 'please enter your postal code',
            sregion: 'please enter your region',
            cardname: 'please enter your card name',
            cardnumber: 'please enter your card number',
            expirymonth: 'please enter expiry month',
            expiryyear: 'please enter expiry year',
            cvv: 'please enter your card CVV number'
        },
        rules: {
            country: {
                selectcheck: true
            }
        }
    });

    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value !== '0');
    });


    // ------------------------------------------------------- //
    // Multilevel dropdown
    // ------------------------------------------------------ //

    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();

        var parent = $(this).parent();
        parent.siblings().removeClass('show');
        parent.toggleClass('show');
    });


    // ------------------------------------------------------- //
    // Increase/Reduce product amount
    // ------------------------------------------------------ //
    $('.minus-btn').on('click', function () {

        var siblings = $(this).siblings('input.quantity');

        if (parseInt(siblings.val(), 10) >= 1) {
            siblings.val(parseInt(siblings.val(), 10) - 1);
        }
    });

    $('.plus-btn').on('click', function () {

        var siblings = $(this).siblings('input.quantity');

        siblings.val(parseInt(siblings.val(), 10) + 1);
    });


    // ------------------------------------------------------- //
    // Items Carousel
    // ------------------------------------------------------ //
    $('.item-slider').owlCarousel({
        loop: true,
        items: 1,
        thumbs: true,
        thumbsPrerendered: true,
        dots: true,
        responsiveClass: false
    });


    // ------------------------------------------------------- //
    // Hero 1 Carousel
    // ------------------------------------------------------ //
    $('.hero-1-slider').owlCarousel({
        loop: true,
        items: 1,
        dots: true,
        autoplaySpeed: 1000,
        dotsSpeed: 1000,
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        responsiveClass: false
    });


    // ------------------------------------------------------- //
    // Hweo 2 Carousel
    // ------------------------------------------------------ //
    $('.hero-2-slider').owlCarousel({
        loop: true,
        items: 1,
        nav: true,
        dots: false,
        autoplaySpeed: 1000,
        navSpeed: 1000,
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        responsiveClass: false
    });

    // ------------------------------------------------------- //
    // Search panel open/close
    // ------------------------------------------------------ //
    $('.search-close').on('click', function () {
        $('.search-overlay').fadeOut();
    });
    $('#search').on('click', function (e) {
        e.preventDefault();
        $('.search-overlay').fadeIn();
        $('.navbar-collapse').removeClass('show');
    });


    // ------------------------------------------------------- //
    // Change columns order
    // ------------------------------------------------------ //
    $(window).on('resize', function () {
        changeColOrder();
    });

    function changeColOrder() {
        if ($(window).outerWidth() < 977) {
            $('.js-pull').addClass('flex-first');
        } else {
            $('.js-pull').removeClass('flex-first');
        }
    }
    changeColOrder();

    // ------------------------------------------------------- //
    // Google Maps
    // ------------------------------------------------------ //
    if ($('#map').length > 0) {

        // ------------------------------------------------------ //
        // styled Leaflet  Map
        // ------------------------------------------------------ //

        function map() {

            var mapId = 'map',
                mapCenter = [53.14, 8.22],
                mapMarker = true;

            if ($('#' + mapId).length > 0) {

                var icon = L.icon({
                    iconUrl: 'img/marker.svg',
                    iconSize: [25, 37.5],
                    popupAnchor: [0, -18],
                    tooltipAnchor: [0, 19]
                });

                var dragging = false,
                    tap = false;

                if ($(window).width() > 700) {
                    dragging = true;
                    tap = true;
                }

                var map = L.map(mapId, {
                    center: mapCenter,
                    zoom: 13,
                    dragging: dragging,
                    tap: tap,
                    scrollWheelZoom: false
                });

                var Stamen_TonerLite = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner-lite/{z}/{x}/{y}{r}.{ext}', {
                    attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    subdomains: 'abcd',
                    minZoom: 0,
                    maxZoom: 20,
                    ext: 'png'
                });

                Stamen_TonerLite.addTo(map);

                map.once('focus', function () {
                    map.scrollWheelZoom.enable();
                });

                if (mapMarker) {
                    var marker = L.marker(mapCenter, {
                        icon: icon
                    }).addTo(map);

                    marker.bindPopup("<div class='p-4'><h5>Info Window Content</h5><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p></div>", {
                        minwidth: 200,
                        maxWidth: 600,
                        className: 'map-custom-popup'
                    })

                }
            }

        }

        map();


    }

    // ------------------------------------------------------ //
    // For demo purposes, can be deleted
    // ------------------------------------------------------ //

    var stylesheet = $('link#theme-stylesheet');
    $("<link id='new-stylesheet' rel='stylesheet'>").insertAfter(stylesheet);
    var alternateColour = $('link#new-stylesheet');

    if ($.cookie("theme_csspath")) {
        alternateColour.attr("href", $.cookie("theme_csspath"));
    }

    $("#colour").change(function () {

        if ($(this).val() !== '') {

            var theme_csspath = 'css/style.' + $(this).val() + '.css';

            alternateColour.attr("href", theme_csspath);

            $.cookie("theme_csspath", theme_csspath, {
                expires: 365,
                path: document.URL.substr(0, document.URL.lastIndexOf('/'))
            });

        }

        return false;
    });

});