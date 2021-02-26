@if (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts()->count())
<section class="featured-pro">

    <div class="featured-heading border-t">
        <h1 class="xlarge">Winter 2021</h2>
        {{-- {{ __('shop::app.home.new-products') }}<br />
        <span class="featured-seperator" style="color:lightgrey;">_____</span> --}}
    </div>

    <div class="product-grid-4">

        @foreach (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts() as $productFlat)

        @include ('shop::products.list.card', ['product' => $productFlat])

        @endforeach

    </div>

</section>
@endif