{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

<div class="price">
    <h3 class="thin">
        {!! $product->getTypeInstance()->getPriceHtml() !!}
    </h3>

</div>

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}