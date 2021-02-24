<?php
    $relatedProducts = $product->related_products()->get();
?>

@if ($relatedProducts->count())
    <div class="attached-products-wrapper">

        <div class="related-title">
            <h2>You may also like</h2>

        </div>

        <section
      class="project-list opacity-0 no-scrollbar mask-right"
      data-toggle-class="toggled"
    >

            @foreach ($relatedProducts as $related_product)

                @include ('shop::products.list.card', ['product' => $related_product])

            @endforeach

        </section>

    </div>
@endif