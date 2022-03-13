<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class userController extends Controller
{
    public function index()
    {
        return view('user.add');
    }
     public function save(Request $request){

        $data = $request->all();

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20',
            'confirmPassword' => 'required|same:password',
        ];

        $fields = [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'confirmPassword' => 'Xác nhận mật khẩu',
        ];

        $validator = FacadesValidator::make($data, $rules, [], $fields);
        $validator->validate();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('tao-user');
     }
}
