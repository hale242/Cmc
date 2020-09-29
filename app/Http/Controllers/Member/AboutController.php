<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Category;
use App\About;

class AboutController extends Controller
{
    public function index() {

      $detail = About::first();
      $category = Category::orderby('category_id', 'asc')->get();

    //   $category = $this->CategoryMenu();

    //   return dd($data);

      if($detail->about_id>0){
      $meta_title = $detail->meta_page_title;
      $meta_description = $detail->meta_description;
      $meta_keyword = $detail->meta_keyword;
      }
      else{
      $meta_title = 'About Us';
      $meta_description = 'About Us';
      $meta_keyword = 'About Us';
      }

      	//seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            $meta_title,
            $meta_description,
            $meta_keyword,
            $meta_keyword,
            url('about')
            );

      $data = array('detail' => $detail,'seo' => $seo, 'category' => $category);
      return view('page.member.about',['data' => $data]);

    }

}
