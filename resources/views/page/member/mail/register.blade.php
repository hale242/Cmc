@php
    $datax = str_replace("{#Email#}",$data['input']['email'],$data['content']->content);
@endphp

{!! str_replace("{#Password#}",$data['input']['password'],$datax) !!}
