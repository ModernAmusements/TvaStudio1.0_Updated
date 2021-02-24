@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')

<?php $images = $productImageHelper->getGalleryImages($product); ?>


<div class="product-card-subpage">

    <div class="cp-spinner cp-round" id="loader">
    </div>

    <product-gallery>

    </product-gallery>


</div>

@push('scripts')

    <script type="text/x-template" id="product-gallery-template">
        <div class="hero-section">
            <div class="article-image-subpage" id="product-hero-image">
                <img :src="currentLargeImageUrl" class="tva-image-subpage" id="pro-img" :data-image="currentOriginalImageUrl"/>

                @auth('customer')
                    <a @if ($wishListHelper->getWishlistProduct($product)) class="add-to-wishlist already" @else class="add-to-wishlist" @endif href="{{ route('customer.wishlist.add', $product->product_id) }}">
                    </a>
                @endauth
            </div>
            <ul class="thumb-list">
                <li class="thumb-frame" v-for='(thumb, index) in thumbs' @mouseover="changeImage(thumb)" :class="[thumb.large_image_url == currentLargeImageUrl ? 'active' : '']" id="thumb-frame">
                    <img class="tva-image-subpage-thumb" :src="thumb.small_image_url"/>
                </li>
            </ul>

        </div>
    </script>

    <script>
        var galleryImages = @json($images);

        Vue.component('product-gallery', {

            template: '#product-gallery-template',

            data: function() {
                return {
                    images: galleryImages,

                    thumbs: [],

                    currentLargeImageUrl: '',

                    currentOriginalImageUrl: '',

                    counter: {
                        up: 0,
                        down: 0,
                    },

                    is_move: {
                        up: true,
                        down: true,
                    }
                }
            },

            watch: {
                'images': function(newVal, oldVal) {
                    this.changeImage(this.images[0])

                    this.prepareThumbs()
                }
            },

            created: function() {
                this.changeImage(this.images[0])

                this.prepareThumbs()
            },

            methods: {
                prepareThumbs: function() {
                    var this_this = this;

                    this_this.thumbs = [];

                    this.images.forEach(function(image) {
                        this_this.thumbs.push(image);
                    });
                },

                changeImage: function(image) {
                    this.currentLargeImageUrl = image.large_image_url;

                    this.currentOriginalImageUrl = image.original_image_url;
                },

            }
        });

    </script>



@endpush