<div class="article-more btn-grid btn-grid-neutral">
    <a class="btn-hover" href="{{ route('shop.productOrCategory.index', $product->url_key) }}">
        <span class="">More</span>
    </a>
</div>
<div id="addToCart" class="article-cart btn-grid btn-grid-black">
    <form class="add-cart" action="{{ route('cart.add', $product->product_id) }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
        <input type="hidden" name="quantity" value="1">
        <button class="btn-hover"{{ $product->isSaleable() ? '' : 'disabled' }}>
            {{ __('shop::app.products.add-to-cart') }}
        </button>
    </form>
</div>



