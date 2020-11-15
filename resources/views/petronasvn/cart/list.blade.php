@if($cart->getCount())
    @php $cartItems = $cart->getCart(); @endphp
    @foreach($cartItems as $cartItem)
    <tr class="cart_item" data-id="19414843779">
        <td class="cell_1">
            <div class="cart_item__img">
                <a href="{{ $cartItem->getLink() }}">  
                <img alt="{{ $cartItem->getName() }}" src="{{ $cartItem->getImage('small') }}">
                </a>
            </div>
            <div class="cart_item__info">
                <h3 class="cart_item__name product_name">
                    <a href="{{ $cartItem->getLink() }}">
                        {{ $cartItem->getName() }}
                    </a>
                </h3>
                <p class="cart_item__variant">L</p>
                <div class="cart_item__details">
                    <p class="item_type"><span>Category:</span> External hardware</p>
                    <p class="item_vendor"><span>Vendor:</span> Computers</p>
                </div>
            </div>
        </td>
        <td class="cell_2 cart_price">
            <span class="money">{{ $cartItem->getPriceFormat() }}</span>
        </td>
        <td class="cell_3">
            <div class="quantity_box">
                <input class="quantity_input" id="updates_{{ $cartItem->getId() }}" value="{{ $cartItem->getQty() }}" type="text">
                <span class="quantity_modifier quantity_down"  data-pid="{{ $cartItem->getId() }}"><i class="fa fa-minus"></i></span>
                <span class="quantity_modifier quantity_up"  data-pid="{{ $cartItem->getId() }}"><i class="fa fa-plus"></i></span>
            </div>
            <div>
                <button type="button" class="btn cart_update" data-pid="{{ $cartItem->getId() }}">Update</button>
            </div>
        </td>
        <td class="cell_4 cart_price">
            <span class="money" data-currency-usd="$119.00">{{ $cartItem->getCostFormat() }}</span>
        </td>
        <td class="cell_5">
            <a class="cart_item__remove" data-pid="{{ $cartItem->getId() }}" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    @endforeach
@endif