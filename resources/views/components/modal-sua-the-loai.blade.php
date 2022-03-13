@php
$_data = $attributes['data'];
@endphp
<div class="modal fade" id="modalSuaTL-{{$_data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Thay đổi thông tin</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif
            <form method="post" action="{{ route('luuTL',['id'=>$_data->id]) }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <x-input name="tentheloai" label="Tên thể loại" value="{{$_data->tentheloai}}"/>

                <x-textarea  name="motatheloai" label="Mô tả thể loại" value="{{$_data->motatheloai}}"/>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary d-flex justify-content-center">Lưu</button>
                </div>
            </form>
        </div>
  </div>
</div>
</div>