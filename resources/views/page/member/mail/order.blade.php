{!!$data['content']->content!!}
<br>
{!!$data['email']!!}

<hr>
<h2>Order Detail</h2>
<table border="1" width="600" cellspacing="0" cellpadding="0">
    <thead>
        <th align="left" style="padding:10px;">Course name</th>
        <th align="center" style="padding:10px;">Qty</th>
        <th align="right" style="padding:10px;">Price</th>
    </thead>
    <tbody>
        @php
            $total = 0;
        @endphp
        @foreach ($data['input'] as $item)
            @php
                if($item['price']!=0){
                    $price = number_format($item['price'],2);
                    $total += $item['price'];
                }else{
                    $price = "<span style='color:#ff0000'>FREE</span>";
                    $total += 0;
                }
            @endphp
            <tr>
                <td align="left" style="padding:10px;">{{$item['name']}}</td>
                <td align="center" style="padding:10px;">{{$item['quantity']}}</td>
                <td align="right" style="padding:10px;">{!!$price!!}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" align="right" style="padding:10px;">Total</td>
            <td align="right" style="padding:10px;">{{number_format($total,2)}}</td>
        </tr>
    </tfoot>
</table>



{{-- {!!str_replace("{#Email#}",$data['input']['email'],$data['content']->content)!!} --}}
