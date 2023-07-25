<div>
    <div class="ec-side-cart-overlay"></div>
    <div id="ec-side-cart" class="ec-side-cart">
        <div class="ec-cart-inner">
            <div class="ec-cart-top">
                <div class="ec-cart-title">
                    <span class="cart_title">{{__('My Cart')}}</span>
                    <button class="ec-close">×</button>
                </div>
                <ul class="eccart-pro-items">
                    @if (Cart::instance('cart')->count() > 0)
                        @foreach (Cart::instance('cart')->content() as $product)
                            <li>
                            <a href="{{url('product/'.$product->model->slug)}}" class="sidekka_pro_img"><img
                                    src="{{asset('main')}}/images/products/{{$product->model->image}}" alt="product"></a>
                            <div class="ec-pro-content">
                                <a href="{{url('product/'.$product->model->slug)}}" class="cart_pro_title">{{$product->model->name}}</a>
                                <span class="cart-price"><span style="margin-right: 5px">{{$product->model->final_price}}</span>x  {{$product->qty}}</span>
                                
                                <a href="javascript:void(0)" wire:click.prevent="destroy('{{$product->rowId}}')">{{__('Remove')}}</a>
                            </div>
                        </li>
                        @endforeach
                    @else
                    <div class="col-12">
                        <h3 class="text-center" style="margin: auto"> {{__('Your Shopping Cart Is Empty!')}}</h3>
                    </div>
                    @endif
                    
                </ul>
            </div>
            <div class="ec-cart-bottom">
                <div class="cart-sub-total">
                    <table class="table cart-table">
                        <tbody>
                            
                            
                            <tr>
                                <td class="text-left">{{__('Total')}} :</td>
                                <td class="text-right primary-color">TRY {{Cart::instance('cart')->total()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart_btn">
                    <a style="height: auto" href="{{url('cart')}}" class="btn btn-primary">{{__('View Cart')}}</a>
                    @if (Cart::instance('cart')->count() > 0)

                    <a href="{{url('check-out')}}" class="btn btn-secondary">{{__('Checkout')}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
