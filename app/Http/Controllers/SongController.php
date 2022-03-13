<?php

namespace App\Http\Controllers;

use App\Models\song;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "select * from info_song";
        $result = DB::select($sql);
        $result = song::paginate(10);
        $theloai = DB::select("select * from theloai");
        return view('list')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = DB::select("select * from theloai");
        return view('create')->with('theloai', $result); //returt đến create.blade.php trong view
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
    public function show($id=null)
    {
        $song = song::findOrFail($id);
		return view('show',['song' => $song]); //returt đến show.blade.php trong view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $song = song::findOrFail($id);
        $result = DB::select("select * from theloai");
        return view('edit')->with('song', $song)->with('theloai', $result); 
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
            "tenbai"     => "required|max:255",    // bắt buộc, tối đa 2255 ký tự
            "filenhac"             => "mimes:mp3",    // bắt buộc,
        ];

        $fields = [
            "tenbai"     => "Tên bài hát",
            "tacgia"             => "Tác giả",
            "tencasi"        => "Tên ca sĩ",
            "theloai"             => "Thể loại",
            "filehinh"             => "File hình ảnh",
            "filenhac"             => "File nhạc",
        ];

        $data = $request->all();        // lấy dữ liệu nhận được từ request

        $validator = Validator::make($data, $rules, [], $fields);

        $validator->validate();    // gọi hàm xác thực dữ liệu

        try {
            unset($data["_token"]);            // loại bỏ giá trị _token từ request

            // Nhận file tải lên
            $file = $request->file('filehinh');
            if ($file != null) {
                $filename = $file->hashName();    // Tên file ngẫu nhiên không trùng
                $file->storeAs("/public/hinhanh", $filename);
                $data["filehinh"] = $filename;
            }
            $file = $request->file('filenhac');
            if ($file != null) {
                $filename = $file->hashName();    // Tên file ngẫu nhiên không trùng
                $file->storeAs("/public/nhac", $filename);
                $data["filenhac"] = $filename;
            }

            $sp = song::updateOrCreate(['id' => $id], $data);
            return redirect()
                ->route('danhsach')
                ->with('success_mesg', 'Thêm dữ liệu thành công');
        } catch (Exception $ex) {
            return redirect()
                ->route('danhsach')
                ->with('error_mesg', 'Thêm dữ liệu thất bại (Chi tiết: ' . $ex->getMessage() . ')');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        song::destroy($id);
        return redirect()->back();
        // return view('destroy');
    }

}
