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


// Profile Index
Breadcrumbs::for('profileIndex', function ($trail) {
    $trail->parent('home');
    $trail->push('Profil', route('customer.profile.index'));
});

// Profile Edit
Breadcrumbs::for('profileEdit', function ($trail) {
    $trail->parent('profileIndex');
    $trail->push('Edit', route('customer.profile.edit'));
});

Breadcrumbs::for('profileAddress', function ($trail) {
    $trail->parent('profileIndex');
    $trail->push('Address', route('customer.address.index'));
});

Breadcrumbs::for('profileReviews', function ($trail) {
    $trail->parent('profileIndex');
    $trail->push('Reviews', route('customer.reviews.index'));
});

Breadcrumbs::for('profileWishlist', function ($trail) {
    $trail->parent('profileIndex');
    $trail->push('Wishlist', route('customer.wishlist.index'));
});


Breadcrumbs::for('profileCompare', function ($trail) {
    $trail->parent('profileIndex');
    $trail->push('Compare Products', route('velocity.product.compare'));
});

Breadcrumbs::for('profileOrders', function ($trail) {
    $trail->parent('profileIndex');
    $trail->push('Review Orders', route('customer.orders.index'));
});


Breadcrumbs::for('profileDownload', function ($trail) {
    $trail->parent('profileIndex');
    $trail->push('Downloadable Products', route('customer.downloadable_products.index'));
});

















// Product
Breadcrumbs::for('product', function ($trail) {
    $trail->parent('home');
    $trail->push('Product', route('shop.home.index'));
});


// Product
Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('product');
    $trail->push('Cart', route('shop.checkout.cart.index'));
});

// Product
Breadcrumbs::for('checkout', function ($trail) {
    $trail->parent('cart');
    $trail->push('Checkout', route('shop.checkout.onepage.index'));
});

Breadcrumbs::for('orderSuccess', function ($trail) {
    $trail->parent('checkout');
    $trail->push('Success', route('shop.checkout.success'));
});






