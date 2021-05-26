<?php
use ArmoredCore\WebObjects\Asset;

$assetBundles = [
    'base' => [
        'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
        'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js',
        Asset::js ( 'headroom.min.js' ),
        Asset::js ( 'jQuery.headroom.min.js' ),
        Asset::js ( 'template.js' ),
        Asset::js ( 'bootsnav.js' ),
        Asset::js ( 'bootstrap.min.js' ),
        Asset::js ( 'custom.js' ),
        Asset::js ( 'datepicker.js' ),
        Asset::js ( 'jquery.couterup.min.js' ),
        Asset::js ( 'jquery.filterizr.min.js' ),
        Asset::js ( 'jquery.js' ),
        Asset::js ( 'jquery.min.js' ),
        Asset::js ( 'jquery.sticky.js' ),
        Asset::js ( 'jquery-ui.min.js' ),
        Asset::js ( 'owl.carousel.min.js' ),
        Asset::js ( 'waypoints.min.js' ),
        Asset::js ( 'highlight.pack.js' ),
        Asset::css ( 'bootstrap.min.css' ) ,
        Asset::css ( 'font-awesome.min.css' ),
        Asset::css ( 'hlstyles/default.css' ),
        Asset::css ( 'main.css' ),
        Asset::css ( 'animate.css' ),
        Asset::css ( 'bootsnav.css' ),
        Asset::css ( 'datepicker.css' ),
        Asset::css ( 'hover-min.css' ),
        Asset::css ( 'jquery-ui.min.css' ),
        Asset::css ( 'owl.carousel.min.css' ),
        Asset::css ( 'responsive.css' ),
        Asset::css ( 'style.css' ),
        Asset::css ( 'owl.theme.default.min' )
    ],
    'form-controls'	=> Asset::css('form.css'),
];