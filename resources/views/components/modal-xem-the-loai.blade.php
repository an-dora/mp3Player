@php
$_data = $attributes['data'];
@endphp
<div class="modal fade" id="modalXemTL-{{$_data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Thông tin</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <p >Tên thể loại: {{$_data->tentheloai}}</p>
        <p>Mô tả: @if($_data->motatheloai) {{($_data->motatheloai)}} @else Chưa được cập nhật @endif</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary"data-bs-dismiss="modal">OK</button>
    </div>
  </div>
</div>
</div>