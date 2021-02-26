
    {{-- Hidden Cats --}}
    <?php
        $categories = [];
        foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category){
            if ($category->slug)
                array_push($categories, $category);
        }
    ?>
    @if (count($categories))
        <div class="categories-toggle">
            <ul class="nav">
                @foreach ($categories as $key => $category)
                    <li class="medium" class="{{ Request::is($category->slug) ? ' active' : '' }}" >
                        <a class="left" href="{{ route('shop.productOrCategory.index', $category->slug) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
