<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Ayyub Faraby Pragolo",
        "image" => "ayb.jpg",
        "email" => "ayyubfarabyp@gmail.com"
    ]);
});



Route::get('/blog', function () {
    $blog_post = [
    [
        "title" => "MAPPA",
        "slug" => "judul-post-pertama",
        "author" => "Masao Maruyama",
        "body" => "MAPPA Co., Ltd. adalah sebuah studio animasi asal Jepang yang didirikan pada tahun 2011 oleh Masao Maruyama, pendiri dan mantan produser Madhouse. 'MAPPA' merupakan akronim dari Maruyama Animation Produce Project Association."
    ],
    [
        "title" => "UFOTABLE",
        "slug" => "judul-post-kedua",
        "author" => "Hikaru Kondo",
        "body" => "Ufotable, Inc. adalah studio animasi Jepang yang didirikan pada Oktober 2000 oleh mantan staf TMS Entertainment melalui anak perusahaannya Telecom Animation Film dan berlokasi di Nakano, Prefektur Tokyo. Ciri khas yang terlihat pada banyak karya mereka adalah animasi tanah liat."
    ]

    ];
    return view('posts', [
        "title" => "Posts",
        "posts" => $blog_post
    ]);
});

// halaman sigle post
Route::get('posts/{slug}', function($slug){
    $blog_post = [
        [
            "title" => "Jujutsu Kaisen",
            "slug" => "judul-post-pertama",
            "author" => "Gege Akutami",
            "body" => "Jujutsu Kaisen adalah sebuah seri manga shōnen asal Jepang yang ditulis dan diilustrasikan oleh Gege Akutami. Manga ini dimuat berseri dalam majalah Weekly Shōnen Jump terbitan Shueisha sejak Maret 2018, dan telah diterbitkan menjadi dua puluh lima volume tankōbon per Januari 2024."
        ],
        [
            "title" => "Kimetsu no Yaiba",
            "slug" => "judul-post-kedua",
            "author" => "Koyoharu Gotouge",
            "body" => "Kimetsu no Yaiba, yang diterbitkan di Indonesia dengan judul Demon Slayer: Kimetsu no Yaiba, adalah sebuah seri manga Jepang yang ditulis dan diilustrasikan oleh Koyoharu Gotōge."
        ]
    
        ];

        $new_post = [];
foreach($blog_post as $post) {
    if($post["slug"] === $slug ) {
        $new_post = $post;
    }
}

    return view('post', [
        "title" => "Single Post",
        "post" => $new_post
    ]
);
});