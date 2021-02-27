@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

{!! view_render_event('bagisto.shop.products.view.attributes.before', ['product' => $product]) !!}

@if ($customAttributeValues = $productViewHelper->getAdditionalData($product))
    {{-- <accordian :title="'{{ __('shop::app.products.specification') }}'" :active="false">
        <div slot="header">
            {{ __('shop::app.products.specification') }}
            <i class="icon expand-icon right"></i>
        </div> --}}

        {{-- <div slot="body"> --}}
            <div class="full-specifications medium">

                @foreach ($customAttributeValues as $attribute)

                        @if ($attribute['label'])
                            <p>{{ $attribute['label'] }}</p>
                        @else
                            <p>{{ $attribute['admin_name'] }}</p>
                        @endif
                        @if ($attribute['type'] == 'file' && $attribute['value'])
                            <div>
                                <a  href="{{ route('shop.product.file.download', [$product->product_id, $attribute['id']])}}">
                                    <i class="icon sort-down-icon download"></i>
                                </a>
                            </div>
                        @elseif ($attribute['type'] == 'image' && $attribute['value'])
                            <div>
                                <a href="{{ route('shop.product.file.download', [$product->product_id, $attribute['id']])}}">
                                    <img src="{{ Storage::url($attribute['value']) }}" style="height: 20px; width: 20px;"/>
                                </a>
                            </div>
                        @else
                            <p>{{ $attribute['value'] }}</p>
                        @endif

                @endforeach

            </div>
        {{-- </div>
    </accordian> --}}
@endif

{!! view_render_event('bagisto.shop.products.view.attributes.after', ['product' => $product]) !!}