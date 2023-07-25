<!-- ekka Cart Start -->
<div class="ec-side-cart-overlay"></div>
<div id="ec-side-cart" class="ec-side-cart">
    <div class="ec-cart-inner">
        <div class="ec-cart-top">
            <div class="ec-cart-title">
                <span class="cart_title">My Cart</span>
                <button class="ec-close">×</button>
            </div>
            <ul class="eccart-pro-items">
                
                <li>
                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                            src="{{asset('main')}}/images/product-image/12_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">Women Leather Shoes</a>
                        <span class="cart-price"><span>TRY 64.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                            src="{{asset('main')}}/images/product-image/3_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">Girls Nylon Purse</a>
                        <span class="cart-price"><span>TRY 59.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="ec-cart-bottom">
            <div class="cart-sub-total">
                <table class="table cart-table">
                    <tbody>
                        <tr>
                            <td class="text-left">Sub-Total :</td>
                            <td class="text-right">TRY 300.00</td>
                        </tr>
                        <tr>
                            <td class="text-left">VAT (20%) :</td>
                            <td class="text-right">TRY 60.00</td>
                        </tr>
                        <tr>
                            <td class="text-left">Total :</td>
                            <td class="text-right primary-color">TRY 360.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart_btn">
                <a href="{{url('cart')}}" class="btn btn-primary">View Cart</a>
                <a href="{{url('check-out')}}" class="btn btn-secondary">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- ekka Cart End -->