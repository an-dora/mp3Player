<x-layout title="HOME - PlayMP3">
    <p class="text-center display-2">
        Thêm nhạc vào thưc viện
    </p>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif

            <form method="post" action="{{ route('luuTL') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <x-input name="tentheloai" label="Tên thể loại" />
                <x-textarea  name="motatheloai" label="Mô tả thể loại"/>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{ route('danhsachTL') }}" class="btn btn-primary">Danh sách thể loại</a>
                </div>
            </form>
        </div>
    </div>

</x-layout>
