<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Shop', route('shop.home.index'));
});

// Sing In
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push('Register', route('customer.register.index'));
});

// log In
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('register');
    $trail->push('Login', route('customer.session.index'));
});


// Home
Breadcrumbs::for('profileIndex', function ($trail) {
    $trail->parent('login');
    $trail->push('Home', route('customer.profile.index'));
});

// Product
Breadcrumbs::for('product', function ($trail) {
    $trail->parent('home');
    $trail->push('Product', route('shop.home.index'));
});




