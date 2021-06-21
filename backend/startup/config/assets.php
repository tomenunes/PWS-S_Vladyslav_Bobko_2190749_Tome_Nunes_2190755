<?php
use ArmoredCore\WebObjects\Asset;

$assetBundles = [
    'base' => [
        'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
        'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js',
        Asset::js ( 'bs-init.js' ),
        Asset::js ( 'chart.min.js' ),
        Asset::js ( 'theme.js' ),
        Asset::js ( 'bootstrap.min_s.css' ),
        Asset::css ( 'bootstrap.min_s.css' ),
        Asset::css ( 'font-awesome.min_s.css' ),
        Asset::css ( 'fontawesome-all.min.css' )

    ],
    'form-controls'	=> Asset::css('form.css'),
];