{!! view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]) !!}

<div class="product-card shop-article scroll">

    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

    <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>

    @if ($product->new)
    <div class="sticker new">
        <span class="sticker-text">{{ __('shop::app.products.new') }}</span>
    </div>
    @endif

    <div class="article-image">
        <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}" title="{{ $product->name }}">
            <img class="tva-image" src="{{ $productBaseImage['medium_image_url'] }}"
                onerror="this.src='{{ asset('vendor/backend/ui/assets/images/product/meduim-product-placeholder.png') }}'" />
        </a>
    </div>

    <div class="article-information">

        <div class="description">
            <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}" title="{{ $product->name }}">
                <h1 class="large">
                    {{ $product->name }}
                </h1>
            </a>
        </div>

        @include ('shop::products.price', ['product' => $product])


    </div>
    @include('shop::products.add-buttons', ['product' => $product])

</div>

{!! view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]) !!}