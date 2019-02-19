<?php

Route::get('/', 'PostsController@index')->name('posts.index');
Route::resource('posts', 'PostsController')->except('index');

Route::get('categories/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

// Route::get('posts/{post}', 'PostsController@show')->name('posts.show');

// REST - W3C
// GET, POST, PATCH, DELETE

// index    - Lista tutte le risorse        - GET       - /posts                - PostsController@index    - posts.index
// show     - Mostra singola risorsa        - GET       - /posts/{post}         - PostsController@show    - posts.show
// create   - Mostra form creazione risorsa - GET       - /posts/create         - PostsController@create    - posts.create
// store    - Persisti nuova risorsa        - POST      - /posts                - PostsController@store    - posts.store
// edit     - Mostra form modifica risorsa  - GET       - /posts/{post}/edit    - PostsController@edit    - posts.edit
// update   - Aggiorna risorsa esistente    - PATCH     - /posts/{post}         - PostsController@update    - posts.update
// destroy  - Cancella risorsa              - DELETE    - /posts/{post}         - PostsController@destroy    - posts.destroy



Auth::routes();
