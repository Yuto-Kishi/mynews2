<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;


class ProfileController extends Controller
{

public function add()
    {
        return view('admin.profile.create');
    }
  

    public function create(Request $request)
    {
        
        
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();
      
       // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if ($form['image']) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
      } else {
          $news->image_path = null;
      }


      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      unset($form['image']);
     

      // データベースに保存する
      $profile->fill($form);
      $profile->save();
      
      
     return redirect('admin/profile/create');

    }

    public function edit()
    {
         $profile = Profile::find($request->id);
          if (empty($profile)) {
          abort(404);
          }
         return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update()
    { 
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
      
        $profile_form = $request->all();
        unset($profile_form['_token']);

        $profile->fill($profile_form)->save();
        
    
        return redirect('admin/profile/edit');
    }
}
