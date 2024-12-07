<?php

$brand_code = env('BRAND_CODE', 'TC');
$title = "Thecollectiveportfolio.com | Securely Buy, Sell & Trade Bitcoin, Ethereum and 250+ Altcoins";
$contact_email = "info@thecollectiveportfolio.com";
$site_name = "thecollectiveportfolio";
$logo_path = "logo.png";
$social_links = [
    'facebook'  => 'https://www.facebook.com/thecollectiveportfolio',
    'discord'   => 'https://discord.gg/thecollectiveportfolio',
    'youtube'   => 'https://www.youtube.com/channel/UCczXqzX6lEm9rieTb13TC7g',
];
$other_links = [
    "marketsanctum" => 'https://marketsanctum.com/news/thecollectiveportfoliocom-partners-with-bybit-exchange-to-offer-seamless-automated-connection-across-platforms/470727'
];

if ($brand_code == 'BT') {
    $title = "SolidBullTrades - Forex, Stock, Cryptocurrency Trading Platform";
    $logo_path = "bt/logo.png";
    $contact_email = "info@solidbulltrades.com";
    $site_name = "SolidBullTrades";

    $social_links = [
        'facebook'  => 'https://www.facebook.com/Bitnificent1',
        'discord'   => '',
        'youtube'   => '',
    ];
    $other_links = [
        "marketsanctum" => 'https://www.digitaljournal.com/pr/news/binary-news-network/bitnificent-com-announces-partnership-leading-crypto-1985818983.html'
    ];
}

return [
    'title'         => $title,
    'social_links'  => $social_links,
    'other_links'   => $other_links,
    'contact_email' => $contact_email,
    'site_name'     => $site_name,
    'logo_path'     => $logo_path
];