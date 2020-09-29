<div align="center">
    <img src="{{asset('upload/admin/logo_web/images/'.SettingWeb::LogoWeb())}}">
    <h2>How can we help?</h2>
</div>
<hr>
<h3>รายละเอียด:</h3>
<h4>
    ชื่อ-นามสกุล: {{$data['input']['fullname']}}
    <br>
    Email: {{$data['input']['email']}}
    {{-- <br> --}}
    {{-- หัวข้อ: {{$data['input']['subject']}} --}}
    <br>
    โทรศัพท์: {{$data['input']['phone']}}
    <br>
    รายละเอียด: {{$data['input']['detail']}}
</h4>
<hr>
<p style="color:red;">This is an automatically generated e-mail. Please do not reply.</p>
