
@php
    $_data = $attributes['data'];
@endphp
<div class="modal fade" id="modal-{{$_data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p >Tên bài: {{$_data->tenbai}}</p>
            <p>Tác giả: @if($_data->tacgia) {{($_data->tacgia)}} @else Chưa được cập nhật @endif </p>
            <p>Ca sĩ: @if($_data->tencasi) {{($_data->tencasi)}} @else Chưa được cập nhật @endif</p>
            <p>Ngày upload: {{$_data->created_at->format('\N\g\à\y d \t\h\á\n\g m \n\ă\m Y')}}</p>
            <p>Giờ upload: {{$_data->created_at->format('H \g\i\ờ i \p\h\ú\t s \g\i\â\y')}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary"data-bs-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>