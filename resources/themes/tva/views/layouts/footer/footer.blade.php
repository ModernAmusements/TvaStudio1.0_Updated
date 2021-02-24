<footer>
    {{-- Hidden Cats --}}
    <?php
        $categories = [];
        foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category){
            if ($category->slug)
                array_push($categories, $category);
        }
    ?>
    {{-- DB FOOTER --}}
    {!! DbView::make(core()->getCurrentChannel())->field('footer_content')->render() !!}
    @if(core()->getConfigData('customer.settings.newsletter.subscription'))
    <div class="footer-newsletter-panel">
            <div class="newsletter-heading">
                <h2>Sign up for
                our newsletter
                </h2>
                <p>
                Are you interested in following along? Let´s stay in touch Big things are in
                the works. Stay connected to know what's next.
                </p>
            </div>
            <div class="form-group">
            <form action="{{ route('shop.subscribe') }}">
                <div class="newsletter-subheading">
                    <h4>What is your name?
                    </h4>
                </div>
                <div class="control-group">
                    <input type="name" class="form-control subscribe-field form-sub" name="FirstName" placeholder="Frist Name Optional">
                </div>
                <div class="control-group" >
                    <input type="name" class="form-control subscribe-field form-sub" name="LastName" placeholder="Last Name Optional">
                </div>
                <div class="newsletter-subheading">
                    <h4>
                        What is your email?
                    </h4>
                </div>
                <div class="control-group" :class="[errors.has('subscriber_email') ? 'has-error' : '']">
                    <input type="email" class="form-control subscribe-field form-sub" name="subscriber_email" placeholder="Email Address" required>
                    <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                </div>
                <div class="newsletter-info">
                    <h4>
                        Are you an clayroom member?
                    </h4>
                    <div class="control-group-radio">
                        <input type="checkbox" id="clayroom" value="clayroom">
                        <label for="clayroom" class="checkbox-view">Yes</label>
                    </div>
                </div>
                <div class="btn-grid form-grid btn-grid-secondary">
                    <a class="btn-hover" :class="[errors.has('subscriber_email') ? 'has-error' : '']">
                        <button class="">{{ __('shop::app.subscription.subscribe') }}</button>
                    </a>
                </div>
            </form>
            </div>
            <?php
                $term = request()->input('term');
                if (! is_null($term)) {
                    $serachQuery = 'term='.request()->input('term');
                }
            ?>
    </div>
    @endif
    {{-- MENU --}}
    <div class="footer-menu">
        <div class="btn-grid btn-grid-neutral border-r">
            <a class="btn-hover" href="@php echo route('shop.cms.page', 'about-us') @endphp"><span class="text">Imprint</span></a>
        </div>
        <div class="btn-grid btn-grid-neutral border-r">
            <a class="btn-hover" href="@php echo route('shop.cms.page', 'about-us') @endphp"><span class="text">Contact</span></a>
        </div>

        <div class="btn-grid btn-grid-neutral">
            <a class="btn-hover" href="@php echo route('shop.cms.page', 'about-us') @endphp">
                <span class="text">Instagram</span>
            </a>
        </div>
    </div>
    {{-- Newsletter --}}
    @if(core()->getConfigData('customer.settings.newsletter.subscription'))
    <div class="footer-newsletter">
        <div class="newsletter-cta btn-grid btn-grid-primary">
            {{-- <form action="{{ route('shop.subscribe') }}"> --}}
            <a class="btn-hover" :class="[errors.has('subscriber_email') ? 'has-error' : '']">
                {{-- <input type="email" class="control subscribe-field" name="subscriber_email" placeholder="Email Address" required><br/> --}}
                <span class="text">Join our Newsletter</span>
            </a>
            {{-- </form> --}}
        </div>
    </div>
    @endif
    <?php
        $term = request()->input('term');
        if (! is_null($term)) {
            $serachQuery = 'term='.request()->input('term');
        }
    ?>
    {{-- Social Media --}}
    {{-- <div class="footer-social">
        <p class="social-cta-headline">Connect!</p>
        <div class="social-inner">
            <a href="">Facebook</a>
            <a href="">Instagram</a>
            <a href="">Pinterest</a>
        </div>
    </div> --}}
    {{-- Credentials --}}
    <div class="footer-trade-mark">
        <p>©2020 all rights reserved</p><p>två studio - ceramics handmade in germany</p>
    </div>
</footer>
