<a href="{{url('wishlist')}}" class="ec-header-btn ec-header-wishlist">
    <div class="header-icon"><img src="{{asset('main')}}/images/icons/wishlist.svg"
    class="svg_img header_svg" alt="" /></div>
    @if (Cart::instance('wishlist')->count() > 0)
    <span class="ec-header-count">{{Cart::instance('wishlist')->count()}}</span>
    @endif
</a>