@extends('layouts.member.template')
@section('detail')
<style type="text/css">
    label {
        font-weight: normal;
    }
</style>
<?php
Use App\Course;
$total = \Cart::getSubTotal();
?>
<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                <a href="{{url('/')}}">Home</a> > <a href="{{url('cart')}}">Cart</a> > <a href="{{url('checkout')}}"
                    class="text text-primary">Checkout</a>
            </div>
            {{-- @include('layouts.member.menu_dashboard') --}}
            <div class="col-md-12">
                <hr>
                <div class="mu-course-content-area">
                    <div class="row">
                        <form action="{{url('confirm')}}" method="post">
                            @csrf
                            @include('layouts.member.flash-message')
                            @if(count($errors))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <div style="padding: 10px;">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <!-- start  -->
                            <div class="col-md-9">
                                <h2><b>Checkout</b></h2>
                                <br>
                                <table class="table">
                                    <thead>
                                        <tr class="bg-success" style="background-color: #ebebeb; border-radius: 5px;">
                                            <td width="50%">PRODUCT</td>
                                            <td align="center">PRICE</td>
                                            <td align="center">QUANTITY</td>
                                            <td align="center">TOTAL</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!Cart::isEmpty())
                                        <?php
                                            $i = 1;
                                            $total = 0;
                                            $qty = 0;
                                        ?>
                                        @foreach(Cart::getContent() as $item)
                                        <?php $detail = Course::find($item->id);?>
                                        @if(file_exists(public_path().'/upload/member/course/images/'.$detail->course_image)
                                        && $detail->course_image != null)
                                        <?Php $img = asset('upload/member/course/images/'.$detail->course_image);?>
                                        @else
                                        <?Php $img = asset('assets/member/images/no-image.png');?>
                                        @endif
                                        <tr>
                                            <td class="text-left">
                                                <div class="col-md-3">
                                                    <img src="{{$img}}" class="img-responsive">
                                                </div>
                                                <div class="col-md-9">
                                                    <p><b>{{Str::words($item->name,20)}}</b>
                                                        <br>
                                                        @php
                                                        if(strlen($detail->course_short_description)>100)
                                                        {
                                                        $dots = '...';
                                                        }else{
                                                        $dots = '';
                                                        }
                                                        @endphp
                                                        <small
                                                            style="color:#aaaaaa;">{{iconv_substr($detail->course_short_description,0,100,'UTF-8').$dots}}</small>
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="text-center" style="color:#aaaaaa;">฿ {{number_format($item->price,2)}}</td>
                                            <td class="text-info text-center">{{$item->quantity}}</td>
                                            <td class="text-info text-center">฿ {{number_format($item->price*$item->quantity,2)}}</td>
                                        </tr>
                                        <?php
                                            $total = $total+($item->price*$item->quantity);
                                            $qty = $qty+$item->quantity;
                                            $i++;
                                        ?>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5">
                                                @include('page.member.data_not_found')
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <hr>
                                <h4><b>Payment Term</b></h4>
                                @php
                                    if($total==0){
                                        $text_checkout = "Confirm";
                                        $text_value = 3;
                                    }else{
                                        $text_checkout = "Transfer to payment";
                                        $text_value = 2;
                                    }
                                @endphp
                                    <div class="radio-toolbar">
                                        @if($total!=0)
                                        <input type="radio" id="payment1" name="payment_type" value="1" autocomplete="off" data-amount="{{$qty}}" data-price="{{$total}}" required onclick="payment_order(1,'{{number_format(\Cart::getSubTotal(),2)}}');">
                                            <label for="payment1" class="pointer">
                                                <div align="center">
                                                    <span class="checked_payment1" id="checked_payment1" style="display: none"><i class="fa fa-check"></i></span>
                                                    <img src="{{asset('assets/member/images/icon/icon_payment1.png')}}">
                                                    <br>
                                                    Credit Card
                                                </div>
                                            </label>
                                        @endif
                                        <input type="radio" id="payment2" name="payment_type" value="<?php echo $text_value; ?>" autocomplete="off" required onclick="payment_order(2,'{{number_format(\Cart::getSubTotal(),2)}}');">
                                        <label for="payment2" style="position: relative;" class="pointer">
                                            <div align="center">
                                                <span class="checked_payment2" id="checked_payment2" style="display: none"><i class="fa fa-check"></i></span>
                                                <img src="{{asset('assets/member/images/icon/icon_payment3.png')}}" height="33px" width="35px">
                                                <br>
                                                {{$text_checkout}}
                                            </div>
                                        </label>
                                    </div>
                            </div>
                            <!-- end  -->
                            <div class="col-md-3">
                                <br><br><br>
                                <div
                                    style="background-color: #ebebeb; border-radius: 6px; padding:10px; height: 160px;">
                                    <h4 style="padding-left: 12px;"><b>Order Summary</b></h4>
                                    <br>
                                    <div class="col-md-6 text-left">
                                        <p>Subtotal:</p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p>฿ {{number_format(\Cart::getSubTotal(),0)}}</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <p>
                                            <h4><b>Total:</b></h4>
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p>
                                            <h4><b>฿ {{number_format(\Cart::getSubTotal(),0)}}</b></h4>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <br>
</section>
@stop
