<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p >Tên bài: {{$item->tenbai}}</p>
            <p>Tác giả: {{$item->tacgia}}</p>
            <p>Ca sĩ: {{$item->tencasi}}</p>
            <p>Ngày upload: {{$item->created_at->format('\N\g\à\y d \t\h\á\n\g m \n\ă\m Y')}}</p>
            <p>Giờ upload: {{$item->created_at->format('H \g\i\ờ i \p\h\ú\t s \g\i\â\y')}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary"data-bs-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>