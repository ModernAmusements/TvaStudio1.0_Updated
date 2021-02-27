{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

<div class="price">
    <h1 class="large thin">
        {!! $product->getTypeInstance()->getPriceHtml() !!}
    </h1>

</div>

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}