@inject ('attributeRepository', 'Webkul\Attribute\Repositories\AttributeRepository')

@inject ('productFlatRepository', 'Webkul\Product\Repositories\ProductFlatRepository')

@inject ('productRepository', 'Webkul\Product\Repositories\ProductRepository')

<?php
    $filterAttributes = [];
    $maxPrice = 0;

    if (isset($category)) {
        $products = $productRepository->getAll($category->id);

        $filterAttributes = $productFlatRepository->getFilterableAttributes($category, $products);

        $maxPrice = core()->convertPrice($productFlatRepository->getCategoryProductMaximumPrice($category));
    }

    if (! count($filterAttributes) > 0) {
        $filterAttributes = $attributeRepository->getFilterAttributes();
    }

    foreach ($filterAttributes as $attribute) {
        if ($attribute->code <> 'price') {
            if (! $attribute->options->isEmpty()) {
                $attributes[] = $attribute;
            }
        } else {
            $attributes[] = $attribute;
        }
    }

    $filterAttributes = collect($attributes);
?>

<div class="layered-filter-wrapper">

    {!! view_render_event('bagisto.shop.products.list.layered-nagigation.before') !!}

    <layered-navigation>

    </layered-navigation>

    {!! view_render_event('bagisto.shop.products.list.layered-nagigation.after') !!}

</div>

@push('scripts')
    <script type="text/x-template" id="layered-navigation-template">
        <div class="filter">
            <div class="filter-title border-b btn-grid btn-grid-primary">
                <span class="btn-hover">
                    {{ __('shop::app.products.layered-nav-title') }}
                </span>
            </div>
            <div class="filter-content">
                <ul class="filter-attributes">
                    <filter-attribute-item
                        v-for='(attribute, index) in attributes'
                        :attribute="attribute"
                        :key="index"
                        :index="index"
                        @onFilterAdded="addFilters(attribute.code, $event)"
                        :appliedFilterValues="appliedFilters[attribute.code]">
                    </filter-attribute-item>
                </ul>
            </div>
        </div>
    </script>

    <script type="text/x-template" id="filter-attribute-item-template">

        <li class="filter-attributes-item" :class="[active ? 'active' : '']">


        <div class="filter-container">
            <div class="filter-attributes-title" @click="active = !active">
               <span class=""> @{{ attribute.name ? attribute.name : attribute.admin_name }}</span>
               <span class="z-icon z-icon-arrow-down-tiny z-icon-tiny z-icon-black cat_arrowDown-3imuE">
                   <svg width="10" height="10" viewBox="0 0 10 10" class="z-icon_svg">
                       <use xlink:href="#icon_svg-arrow-down-tiny"></use>
                    </svg>
                </span>
            </div>
        </div>
            <div class="filter-attributes-content">

                <div class="items" v-if="attribute.type != 'price'">
                    <div class="filter-items" v-for='(option, index) in attribute.options'>
                            <input type="checkbox" :id="option.id" v-bind:value="option.id" v-model="appliedFilters" @change="addFilter($event)"/>
                            <label class="checkbox-view" :for="option.id">@{{ option.label ? option.label : option.admin_name }}</label>
                    </div>
                </div>

                <div class="price-range-wrapper" v-if="attribute.type == 'price'">
                    <vue-slider
                        ref="slider"
                        v-model="sliderConfig.value"
                        :process-style="sliderConfig.processStyle"
                        :tooltip-style="sliderConfig.tooltipStyle"
                        :max="sliderConfig.max"
                        :lazy="true"
                        @change="priceRangeUpdated($event)"
                    ></vue-slider>
                </div>

            </div>
            <div class="pull-right">
                <a class="remove-filter-link" v-if="appliedFilters.length" @click.stop="clearFilters()">
                    {{ ('Clear Filter') }}
                </a>
            </div>
        </li>
    </script>

    <script>
        Vue.component('layered-navigation', {

            template: '#layered-navigation-template',

            data: function() {
                return {
                    attributes: @json($filterAttributes),

                    appliedFilters: {}
                }
            },

            created: function () {
                var urlParams = new URLSearchParams(window.location.search);

                var this_this = this;

                urlParams.forEach(function (value, index) {
                    this_this.appliedFilters[index] = value.split(',');
                });
            },

            methods: {
                addFilters: function (attributeCode, filters) {
                    if (filters.length) {
                        this.appliedFilters[attributeCode] = filters;
                    } else {
                        delete this.appliedFilters[attributeCode];
                    }

                    this.applyFilter()
                },

                applyFilter: function () {
                    var params = [];

                    for(key in this.appliedFilters) {
                        if (key != 'page') {
                            params.push(key + '=' + this.appliedFilters[key].join(','))
                        }
                    }

                    window.location.href = "?" + params.join('&');
                }
            }
        });

        Vue.component('filter-attribute-item', {

            template: '#filter-attribute-item-template',

            props: ['index', 'attribute', 'appliedFilterValues'],

            data: function() {
                let maxPrice  = @json($maxPrice);

                maxPrice = maxPrice ? ((parseInt(maxPrice) !== 0 || maxPrice) ? parseInt(maxPrice) : 500) : 500;

                return {
                    appliedFilters: [],

                    active: false,

                    sliderConfig: {
                        value: [
                            0,
                            0
                        ],
                        max: maxPrice,
                        processStyle: {
                            "backgroundColor": "#FF6472"
                        },
                        tooltipStyle: {
                            "backgroundColor": "#FF6472",
                            "borderColor": "#FF6472"
                        }
                    }
                }
            },

            created: function () {
                if (!this.index)
                    this.active = false;

                if (this.appliedFilterValues && this.appliedFilterValues.length) {
                    this.appliedFilters = this.appliedFilterValues;

                    if (this.attribute.type == 'price') {
                        this.sliderConfig.value = this.appliedFilterValues;
                    }

                    this.active = true;
                }
            },

            methods: {
                addFilter: function (e) {
                    this.$emit('onFilterAdded', this.appliedFilters)
                },

                priceRangeUpdated: function (value) {
                    this.appliedFilters = value;

                    this.$emit('onFilterAdded', this.appliedFilters)
                },

                clearFilters: function () {
                    if (this.attribute.type == 'price') {
                        this.sliderConfig.value = [0, 0];
                    }

                    this.appliedFilters = [];

                    this.$emit('onFilterAdded', this.appliedFilters)
                }
            }

        });

    </script>
@endpush
