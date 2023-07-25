<a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
    <div class="header-icon"><img src="{{asset('main')}}/images/icons/cart.svg"
            class="svg_img header_svg" alt="" /></div>
            @if (Cart::instance('cart')->count() > 0)
            <span class="ec-header-count cart-count-lable">{{Cart::instance('cart')->count()}}</span>
            @endif
</a>
