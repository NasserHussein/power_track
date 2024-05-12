<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminEditDataRequest;
use App\Http\Requests\ClientChangePasswordRequest;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CpanelController extends Controller
{
    use General;
    public function edit(){
        $admin = Admin::find(Auth()->user()->id);
        return view('admin.cpanel.edit',compact('admin'));
    }
    public function update(AdminEditDataRequest $request){
        $admin = Admin::find(Auth()->user()->id);
        if(!$admin){
            return abort(401);
        }
        $admin->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone_no' => $request['phone_no'],
        ]);
        if($request->has('photo')){
        // لو في ملف موجودة بالفعل امسحمه من الملفات الاول
            if($admin->photo !== NULL){
                $delet_photo = $admin->photo;
                $file_loc = base_path('assets/images/admin/admin_image/'.$delet_photo);
                if(File::exists($file_loc)){
                    unlink($file_loc);
                 }
                $file_name = $this->UploadImage($request->photo , 'assets/images/admin/admin_image');
                $admin->update([
                    'photo' => $file_name
                ]);
            }
        }
    return redirect()->route('admin.edite.personal.data');
    }
    public function edit_pass(){
        $admin = Admin::find(Auth()->user()->id);
        if(!$admin){
            return abort(401);
        }
        return view('admin.cpanel.editpass',compact('admin'));
    }
    public function update_pass(ClientChangePasswordRequest $request){
        $admin = Admin::find(Auth()->user()->id);
        if(!Hash::check($request->old_password , $admin->password)){
            return redirect()->route('admin.edit.pass.data')->with(['error'=>'كلمة المرور الحالية غير صحيحة']);
        }
        $admin->update([
            'password' => Hash::make($request->password)
        ]);
        if(auth()->guard('admin')->attempt(['username'=>$admin->username,'password'=>$request->input("password")]));
        return redirect()->route('admin.edit.pass.data')->with(['success'=>'تم تغيير كلمة المرور بنجاح']);
    }
}
