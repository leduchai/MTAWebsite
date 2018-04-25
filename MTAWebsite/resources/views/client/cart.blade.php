@extends('layouts.client')
@section('content')
<section id="sp-breadcrumb-wrapper" 
class=" "><div class="container"><div class="row-fluid" id="breadcrumb">
  </div></div></section>
  <section id="sp-main-body-wrapper" class="box-layout4 ">
    <div class="container">
      <div class="row-fluid" id="main-body">
        @include('sidebar.left')
        <div id="sp-message-area" class="span9"><section id="sp-component-area-wrapper" 
          class=" "><div class="row-fluid" id="component-area">
            <div id="sp-component-area" class="span12"><section id="sp-component-wrapper"><div id="sp-component"><div id="system-message-container">
            </div>
                @if(session('thanks'))
                    <span class="text-info">
                        {{ session('thanks') }}
                    </span>
                @endif
            <div class="jshop">
              @if(count($cart) > 0)
              <form action="{{ route('cart.update') }}" method="post" name="updateCart">
                <table class="jshop cart">
                  <tr>
                    <th class="colWidth10">
                    Hình ảnh    </th>
                    <th class="colWidth30">
                    Mục    </th>    
                    <th class="colWidth15">
                    Đơn giá    </th>
                    <th class="colWidth15">
                    Số lượng    </th>
                    <th class="colWidth15">
                    Tổng    </th>
                    <th class="colWidth15">
                    Hủy bỏ    </th>
                  </tr>
                  @foreach($cart as $carts)
                  <tr class="jshop_prod_cart odd">
                    <td class="jshop_img_description_center">

                      <img src="{{asset('uploads/450x560-'.$carts->options->images)}}" alt="{{ $carts->name }}" class="jshop_img" />

                    </td>
                    <td class="product_name">
                     {{ $carts->name }}
                   </td>
                   <td>
                    <span class="jshop_price">
                      <span>{{ number_format( $carts->price) }} Đ                       </span>
                    </span>
                  </td>
                  <td>
                    <input type = "text" name = "txtqty[{{$carts->rowId}}]" value = "{{ $carts->qty }}" class = "inputbox" style = "width: 25px" />
                  </td>
                  <td >
                    <span class="jshop_price">
                      <span>
                        {{ number_format( $carts->price*$carts->qty) }}  Đ                 </span>
                      </span>
                    </td>
                    <td>
                      <a href="{{ route('cart.remove',['id'=>$carts->rowId]) }}" onclick="return confirm('Hủy trả lời?')"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="6" class="text-right"><input type="submit" value="Cập nhật" class="btn btn-success"></td>
                  </tr>
                </table>
                <div class="cartdescr"></div>
                <br/>
                <table class="jshop jshop_subtotal">
                  <tr class="total">
                    <td class = "name">
                    Tổng    </td>
                    <td class = "value jshop_price">
                      <span>
                      {{ number_format($total) }} Đ   </span>
                    </td>
                  </tr>

                </table>

                <table class="jshop" style="margin-top:10px">
                  <tr id = "checkout">
                    <td class = "colWidth50 td_1">
                     <a href = "{{ route('home.page') }}">
                       <img src = "{{ asset('client-assets/images/arrow_left.gif') }}" alt="Tiếp tục mua hàng" />
                     Tiếp tục mua hàng       </a>
                   </td>
                   <td class = "colWidth50 td_2">
                     <a onclick="javascrip()" id="thanhtoan">
                       Thanh toán <img src = "{{ asset('client-assets/images/arrow_right.gif') }}" alt="Thanh toán" />
                     </a>
                   </td>
                 </tr>
               </table>
             </form>
             @endif
             <div class="jshop address_block" id="order">
              <div class="span3">
                <div class="menu_checkout"> 
                  <h3 class="header">
                    <span>Đặt Hàng</span>
                  </h3>
                </div>
                <div class = "jshop" id = "jshop_menu_order">
                  <ul>
                    <li class = "jshop_order_step active">
                      <span class="item_menu_order"><span id="active_step"  class="active_step">Địa chỉ vận chuyển</span></span>
                    </li>
                    <li class = "jshop_order_step next">
                      <span class="item_menu_order"><span class="not_active_step">Xác nhận</span></span>
                    </li>
                  </ul>
                </div>  </div>
                <div class="span9">
                  <form action = "{{ route('order.save') }}" method = "post" name = "loginForm"  class = "form-horizontal">
                    <div class = "jshop_register">
                      <div class="fields">
                        <div class = "field">
                          <label class="required"><em>*</em>Tên</label>
                          <div class = "input-box">
                            <input required type = "text" name = "name_cus" id = "f_name" value = "" class = "input" />
                          </div>
                        </div>
                        <div class="fields">
                          <div class = "field">
                            <label class="required">
                              E-mail <em>*</em>       </label>
                              <div class = "input-box">
                                <input required type = "email" name = "email" id = "email" value = "" class = "input" />
                              </div>
                            </div>
                          </div>
                          <div class="fields">
                            <div class = "field">
                              <label class="required">
                                Địa chỉ<em>*</em>        </label>
                                <div class = "input-box">
                                  <input required type = "text" name = "address" id = "street" value = "" class = "input" />
                                </div>
                              </div>
                              <div class="fields">
                                <div class = "field">
                                  <label class="required">
                                    Điện thoại <em>*</em>       </label>
                                    <div class = "input-box">
                                      <input required type = "text" name = "phone" id = "phone" value = "" class = "input" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div style="padding-top:10px;">
                                <button type = "submit" name = "next" class = "btn btn-primary vina-button">
                                  <span>
                                    <span>Tiếp</span>
                                  </span>
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </section></div>
                  </div>
                </div></div>
              </div>
            </div>
          </div>
        </section>
        <script type="text/javascript">
              $('#thanhtoan').click(function(){
                  $('#order').toggle();
              });
        </script>
        @endsection