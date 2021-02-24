@if (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts()->count())
<section class="featured-pro">

    <div class="featured-heading">
        <h2 class="display">Summer 2021</h2>
        {{-- {{ __('shop::app.home.featured-products') }}<br />

        <span class="featured-seperator" style="color:lightgrey;">_____</span> --}}
    </div>

    <div class="featured-grid product-grid-4">

        @foreach (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts() as $productFlat)

        @include ('shop::products.list.card', ['product' => $productFlat])

        @endforeach

    </div>

</section>
@endif