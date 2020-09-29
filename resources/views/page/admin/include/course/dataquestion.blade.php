@php
    $number = sizeof($data['question']);
@endphp
{{-- <input type="hidden" name="maxscore" id="maxscore" value="{{$number}}"> --}}
@if($data['question']!='')
    @foreach ($data['question'] as $key => $item)
        <div class="manage">
            <i class="btn btn-sm btn-warning fa fa-pencil btn_edit_question" q-count="{{$nc = sizeof($data['choice'])}}" question-id="{{$item['question_id']}}" data-q="{{$item['question']}}" test-id="{{$data['pre_post_test']}}"></i>
            <i class="btn btn-sm btn-danger fa fa-times btn_del_question" question-id="{{$item['question_id']}}" test-id="{{$data['pre_post_test']}}"></i>
        </div>
        <div class="alert alert-success">
            <b>Question # {{$number--}} : {{$item['question']}}</b>
            <div class="m-t">
                <div><i class="fa fa-trash"></i></div>
                @foreach ($data['choice'][$key] as $keyans => $ans)
                    <p style="margin-bottom:0px;">Ans # {{$keyans+1}} : {{$ans['choice']}} <b>(<?php if($ans['answer']=='true'){ echo 'Yes'; }else{ echo 'N'; } ?>)</b></p>
                @endforeach
            </div>
        </div>
    @endforeach
@endif
