<?php
/**
 * PRO upsell content, generated from the plogins.com registry by
 * scripts/gen-pro-upsell.mjs. The admin upsell renders this; curate the
 * feature list to fit this plugin's settings screen (do not invent features).
 *
 * @package plogins-marks-pro
 */

defined('ABSPATH') || exit;

return [
    'name'       => 'Marks Pro',
    'url'        => 'https://plogins.com/plogins-marks-pro/pricing/',
    'sellable'   => true,
    'price_from' => 19,
    'currency'   => 'EUR',
    'price_pln'  => 85,
    'lead'       => [
        'en' => 'All PRO roadmap features ship in the current release.',
        'pl' => 'Wszystkie funkcje PRO z roadmapy są dostępne w bieżącym wydaniu.',
    ],
    'features'   => [
        [
            'en' => ['title' => 'Scheduled campaign badges', 'desc' => 'Marks → Scheduled Badges: label, background and text colours, optional start/end window and targeting by product, category or tag. Empty schedule = always on; empty targets = store-wide.'],
            'pl' => ['title' => 'Odznaki kampanijne', 'desc' => 'Marks → Scheduled Badges: etykieta, kolory tła i tekstu, opcjonalne okno start/koniec oraz targetowanie po produkcie, kategorii lub tagu. Puste okno = zawsze aktywne; puste targety = cały sklep.'],
        ],
        [
            'en' => ['title' => 'Conditional rules', 'desc' => 'Marks → Settings: store-wide rules by category, price threshold or low stock, label and colour style on matching products.'],
            'pl' => ['title' => 'Reguły warunkowe', 'desc' => 'Marks → Settings: reguły sklepowe po kategorii, progu ceny lub niskim stanie magazynowym, etykieta i styl koloru na pasujących produktach.'],
        ],
        [
            'en' => ['title' => 'Image badges', 'desc' => 'Product editor Badges tab: image URL (PNG/SVG), certification or brand logo at 24px height on listings and product pages.'],
            'pl' => ['title' => 'Odznaki obrazkowe', 'desc' => 'Karta produktu Badges: URL obrazu (PNG/SVG), logo certyfikatu lub marki, 24 px wysokości na listach i stronie produktu.'],
        ],
        [
            'en' => ['title' => 'A/B label sets', 'desc' => 'Marks → Settings: competing label variants rotated across visitors with impression counts in admin.'],
            'pl' => ['title' => 'Testy A/B etykiet', 'desc' => 'Marks → Settings: konkurujące warianty etykiet rotowane między odwiedzającymi z licznikiem wyświetleń w panelu.'],
        ],
    ],
];
