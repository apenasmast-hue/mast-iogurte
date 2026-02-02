<?php
// ÜRÜN VE FİYAT AYARLARI
$urunler = [
    'yogurt' => [
        'baslik' => 'Iogurtes Naturais',
        'resim' => 'yogurt.jpg',
        'cesitler' => [
            ['ad' => 'Natural 1000ml', 'fiyat' => 20.00],
            ['ad' => 'Natural 500ml', 'fiyat' => 10.00],
            ['ad' => 'Natural 250ml', 'fiyat' => 7.00]
        ]
    ],
    'sutlac' => [
        'baslik' => 'Arroz Doce Gourmet',
        'resim' => 'sutlac.jpg',
        'cesitler' => [
            ['ad' => 'Arroz Família (G)', 'fiyat' => 20.00],
            ['ad' => 'Arroz Médio (M)', 'fiyat' => 10.00],
            ['ad' => 'Arroz Individual (P)', 'fiyat' => 7.00]
        ]
    ]
];

// TESLİMAT BÖLGELERİ
$bolgeler = [
    ['ad' => 'Lago Sul (Perto)', 'ucret' => 10],
    ['ad' => 'Lago Sul (Longe)', 'ucret' => 15],
    ['ad' => 'Asa Norte/Sul', 'ucret' => 20],
    ['ad' => 'Retirada Local', 'ucret' => 0]
];

$whatsapp_no = "5561999851365";
?>
