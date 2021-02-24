{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

<div class="price">
    {!! $product->getTypeInstance()->getPriceHtml() !!}
</div>

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}