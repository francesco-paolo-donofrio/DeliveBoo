<?php

return [
    
        "products" => [
    [
        "name" => "Spaghetti Carbonara",
        "image" => "/images/product/carbonara.jpg",
        "price" => 12.50,
        "description" => "Traditional Italian pasta dish made with eggs, cheese, pancetta, and pepper.",
        "visible" => true,
        "restaurant_id" => 1
    ],
    [
        "name" => "Margherita Pizza",
        "image" => "/images/product/margherita.avif",
        "price" => 8.00,
        "description" => "Classic pizza topped with tomato sauce, mozzarella cheese, and fresh basil.",
        "visible" => true,
        "restaurant_id" => 1
    ],
    [
        "name" => "Caesar Salad",
        "image" => "/images/product/caesar-salad.webp",
        "price" => 7.50,
        "description" => "Crisp romaine lettuce, Parmesan cheese, croutons, and Caesar dressing.",
        "visible" => true,
        "restaurant_id" => 1
    ],
    [
        "name" => "Beef Lasagna",
        "image" => "/images/product/Lasagna.webp",
        "price" => 10.00,
        "description" => "Layers of pasta, beef ragu, béchamel sauce, and Parmesan cheese.",
        "visible" => false,
        "restaurant_id" => 1
    ],
    [
        "name" => "Tiramisu",
        "image" => "/images/product/tiramisu.jpg",
        "price" => 6.00,
        "description" => "Popular coffee-flavoured Italian dessert made with ladyfingers, mascarpone cheese, and cocoa.",
        "visible" => true,
        "restaurant_id" => 1
    ]
]
];

// $json_data = json_encode($dishes, JSON_PRETTY_PRINT);

// $file_path = 'dishes.json';

// // Scrivi il JSON su un file
// if (file_put_contents($file_path, $json_data)) {
//     echo "File JSON creato con successo!";
// } else {
//     echo "Errore nella creazione del file JSON.";
// }


