@php
$_filename = 'FIle nhạc';
@endphp
<x-layout title="HOME - Thêm nhạc">
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

            <form method="post" action="{{ route('luu') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                {{-- Thêm file --}}

                <div class="form-group mt-3">
                    <label for="filenhac" class="form-label">File nhạc</label>
                    <input onchange="getName(this)" type="file" id="filenhac" name="filenhac"
                        class="form-control @error($_filename) is-invalid @enderror" />

                    @error($_filename)
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- <x-input name="filenhac" id="filenhac" class="" label="File nhạc" type="file" /> --}}
                {{-- THêm thông tin --}}
                <x-input name="tenbai" id="tenbai" label="Tên bài hát" />
                <x-input name="tacgia" label="Tác giả" />
                <x-input name="tencasi" label="Ca sĩ thực hiện" />
                <x-the-loai name="id_theloai" label="Thể loại" />
                {{-- <div class="form-group">
                    <label for="">Thể loại</label>
                    <select class="form-control" name="theloai" id="">
                        <option selected disabled>-- Chọn thể loại --</option>
                        @foreach ($theloai as $item)
                            <option value="{{ $item->id }}">{{ $item->tentheloai }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <x-input name="filehinh" label="File hình ảnh" type="file" />
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
<script>
    function getName(object) {
        var file = object.files[0];
        var name = file.name;
        document.getElementById('tenbai').value = name;
    }
</script>
