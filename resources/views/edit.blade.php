<x-layout title="HOME - Chỉ sửa thông tin">
    <p class="text-center display-2">
        Chỉnh sửa thông tin
    </p>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif

            <form method="post" action="{{ route('luu',['id'=> $song->id]) }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                {{-- Thêm file --}}
                <audio src="/storage/nhac/{{ $song->filenhac }}" controls>FileNhac</audio>
                <x-input name="filenhac" id="filenhac" label="File nhạc" type="file" />
                {{-- THêm thông tin --}}
                <x-input name="tenbai" id="tenbai" label="Tên bài hát" value="{{$song->tenbai}}" />
                <x-input name="tacgia" label="Tác giả" value="{{$song->tacgia}}"/>
                <x-input name="tencasi" label="Ca sĩ thực hiện" value="{{$song->tencasi}}"/>
                <div class="form-group">
                    <label for="">Thể loại</label>
                    <select class="form-control" name="theloai" id="">
                        <option selected>-- Chọn thể loại --</option>
                        @foreach ($theloai as $song)
                            <option value="{{ $song->tentheloai }}">{{ $song->tentheloai }}</option>
                        @endforeach
                    </select>
                </div>
                <x-input name="filehinh" label="File hình ảnh" type="file" />
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
