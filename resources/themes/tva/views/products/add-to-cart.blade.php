{!! view_render_event('bagisto.shop.products.add_to_cart.before', ['product' => $product]) !!}
<div class="article-cart article-cart-subpage  btn-grid btn-grid-primary">
<button type="submit" class="btn-hover" {{ ! $product->isSaleable() ? 'disabled' : '' }}>
    {{ __('shop::app.products.add-to-cart') }}
</button>
</div>
{!! view_render_event('bagisto.shop.products.add_to_cart.after', ['product' => $product]) !!}