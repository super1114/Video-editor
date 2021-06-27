<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProfileController extends Controller
{
    public function index(Request $request) 
    {
        $user = Auth::user();
        $companies = Company::all();

        return view('app.users.profile', compact('user', 'companies'));
    }

    public function avatarUpload(Request $request)
    {
        if ($request->photo) {
            $exist_photo = Auth::user()->photo;
            if($exist_photo != '') {
                $file = 'public/' . $exist_photo;
                if (Storage::exists($file)) {
                    Storage::delete($file);
                }
            }

            $image = $request->file('photo');
            $filename = time().'.'.$image->guessExtension();
            
            $path = $image->storeAs(
                 'public/avatar', $filename
            );

            $photo = 'avatar/'. $filename;

            $user = Auth::user();
            $user->photo = $photo;
            $user->save();
            echo 'success';
        }
    }
   
    public function profileUpdate(Request $request) 
    {
        $validator = Validator::make($request->all(), [            
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users'
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors()->all();            
            Toastr::error($errors[0],'Error');            
            return redirect('user/profile');
        }

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();  
        
        return redirect('user/profile')->withSuccess(__('crud.common.saved'));
    }
    
    public function jobInfoUpdate(Request $request)
    {
        $user = User::find($request->user_id);
        $user->company_id = $request->company_id;
        $user->jobtitle = $request->jobtitle;
        $user->save();

        return redirect('user/profile')->withSuccess(__('crud.common.saved'));
    }

    public function changePwd(Request $request)
    {
        $user = User::find($request->user_id);
            
        if (Hash::check($request->prev_password, $user->password)) { 
            
            if($request->password != $request->password_confirm)
            {
                Toastr::error('Password does not match','Error');
                 return redirect()->route('user.profile');
            } else {
                $user->fill([
                 'password' => Hash::make($request->password)
                 ])->save();
             
                 Toastr::success('Password changed','Sucess');
                 return redirect()->route('user.profile');
            }            
         } else {
            Toastr::error('Previous Password is not correct. Please try it again','Error');
             return redirect()->route('user.profile');
         }
    }
}