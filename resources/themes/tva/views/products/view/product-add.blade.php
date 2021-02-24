{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}
<div class="row-cta">

    @include ('shop::products.add-to-cart', ['product' => $product])

    @include ('shop::products.buy-now')

</div>
{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}