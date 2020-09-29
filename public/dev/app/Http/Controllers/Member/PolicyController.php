<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Policy;

class PolicyController extends Controller
{
    public function index() {

      $detail = Policy::first();

      if(!empty($detail)){
      $meta_title = $detail->meta_page_title;
      $meta_description = $detail->meta_description;
      $meta_keyword = $detail->meta_keyword;
      }
      else{
      $meta_title = 'Privacy & Policy';
      $meta_description = 'Privacy & Policy';
      $meta_keyword = 'Privacy & Policy';
      }

      	//seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            $meta_title,
            $meta_description,
            $meta_keyword,
            $meta_keyword,
            url('policy')
            );

      $data = array('detail' => $detail,'seo' => $seo);
      return view('page.member.policy',['data' => $data]);

    }

}
