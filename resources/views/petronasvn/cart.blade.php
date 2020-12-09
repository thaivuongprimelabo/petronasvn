@extends('layouts.petronasvn')
@section('content')
<div id="main" role="main">
   <div class="container">
      <div class="row">
         <section class="main_content  col-sm-12">
            <!-- BREADCRUMBS -->
            @include('petronasvn.common.breadcrumb', ['page2' => ['name' => trans('petronasvn.cart_txt')]])
            <div class="cart_page">
               <div id="cart_loader" class="loader_off">
                  <div class="global_loader"></div>
               </div>
               <h1 class="page_heading">{{ trans('petronasvn.cart_txt') }}</h1>
               <div id="cart_content">
                  <form action="/cart" method="post" class="">
                     <table class="cart_list">
                        <thead>
                           <tr>
                              <th>Sản phẩm</th>
                              <th>Đơn giá</th>
                              <th>Số lượng</th>
                              <th>Thành tiền</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody id="cart_body">
                            
                        </tbody>
                        <tfoot>
                           <tr class="cart_buttons">
                              <td colspan="5">
                                 <a class="btn btn-alt cart_continue" href="{{ route('products') }}">{{ trans('petronasvn.button.back_to_shopping') }}</a>
                                 <button  type="button" id="cart_clear" class="btn">{{ trans('petronasvn.button.clear_cart') }}</button>
                              </td>
                           </tr>
                           <tr class="cart_summary">
                                <td colspan="5">
                                    <p class="cart_summary__row">Thành tiền <span id="total_price" class="money"></span></p>
                                    <div class="cart_summary__checkout">
                                        <button type="button" id="checkout" name="checkout" class="btn" onclick="window.location='{{ route('cart.checkout') }}'">Thanh toán</button>
                                    </div>
                                </td>
                           </tr>
                        </tfoot>
                     </table>
                  </form>
               </div>
            </div>
         </section>
      </div>
   </div>
</div>
<script>
      jQuery(function($) {
         let _this = $(this);
         _this.loadCart();

         $('#cart_clear').click(function() {
               _this.removeCart();
         });

         $('#cart_content').on('click', '.cart_update', function(e) {
               let pid = $(this).attr('data-pid');
               _this.updateCart({
                  pid: Number(pid),
                  qty: $('#updates_' + pid).val()
               });
         })

         $('#cart_content').on('click', '.quantity_down', function(e) {
               let pid = $(this).attr('data-pid');
               let qty = Number($('#updates_' + pid).val());
               if(qty === 1) return false;
               qty -= 1;
               $('#updates_' + pid).val(qty);
         })

         $('#cart_content').on('click', '.quantity_up', function(e) {
               let pid = $(this).attr('data-pid');
               let qty = Number($('#updates_' + pid).val());
               if(qty === 99) e.preventDefault();
               qty += 1;
               $('#updates_' + pid).val(qty);
         })

         $('#cart_content').on('click', '.cart_item__remove', function(e) {
               let pid = $(this).attr('data-pid');
               _this.removeItem(pid);
         })
    });
</script>
@endsection