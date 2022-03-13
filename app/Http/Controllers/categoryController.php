<?php

namespace App\Http\Controllers;

use App\Models\categoryModels;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "select * from theloai";
        $result = DB::select($sql);
        return view('category.list')->with('theloai', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('category.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('category.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {

        $rules = [
            "tentheloai" => "required|max:255",

        ];
        $fields = [
            'tentheloai' => "Tên thể loại",
            'motatheloai' => 'Mô tả thể loại'
        ];

        $data = $request->all();
        $validator = Validator::make($data, $rules, [], $fields);
        $validator->validate();

        try {
            unset($data["_token"]);
            $sp = categoryModels::updateOrCreate(['id' => $id], $data);

            return redirect()
                ->back()
                ->with('success_mesg', 'Thêm thể loại thành công');
        } catch (Exception $ex) {
            return redirect()
                ->back()
                ->with('error_mesg', 'Thêm thể loại thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        categoryModels::destroy($id);
        return redirect()
            ->back()
            ->with('success_mesg', 'Xóa thể loại thành công');
    }
    public function theLoai()
    {
        $sql = "select * from theloai";
        $result = DB::select($sql);
        return view('common.navbar')->with('theloai', $result);
    }
}
