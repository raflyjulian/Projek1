<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        try{

            $data = User::all();

            return ApiFormatter::sendResponse(200, 'success', $data);
        }catch (\Exception $err){
            return ApiFormatter::sendResponse(400, 'bad request', $err->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'username' => 'required|min:3',
                'email' => 'required|email:dns',
                'password' => 'required',

            ]);


 
            $data = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return ApiFormatter::sendResponse(200, 'success', $data);
        } catch (\Exception $err) {
            return ApiFormatter::sendResponse(400, 'bad request', $err->getMessage());
        }
    }

    // public function update(Request $request, $id)
    // {
    //     try {
    //         $validate = $request->validate([
    //             'name' => 'required',
    //             'notes' => 'required',
    //             'user_id' => 'required',
    //             'category_id' => 'required',
    //         ]);

    //         $checkProses = Product::where('id', $id)->update([
    //             'name' => $request->name,
    //             'notes' => $request->notes,
    //             'user_id' => $request->user_id,
    //             'category_id' => $request->category_id,
    //         ]);

    //         if ($checkProses) {
    //             $data = Product::find($id);
    //             return ApiFormatter::sendResponse(200, 'success', $data);
    //         } else {
    //             return ApiFormatter::sendResponse(400, 'bad request', 'Gagal mengubah data!');
    //         }
    //     } catch (\Exception $err) {
    //         return ApiFormatter::sendResponse(400, 'bad request', $err->getMessage());
    //     }
    // }
}