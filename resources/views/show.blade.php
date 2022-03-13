<x-layout title="HOME - PlayMP3">
    <p class="text-center display-2">
        Xem thông tin
    </p>
<p>Tên bài: {{$song->tenbai}}</p>
<p>Tác giả: {{$song->tacgia}}</p>
<p>Ca sĩ: {{$song->tencasi}}</p>
<p>Ngày upload: {{$song->created_at->format('\N\g\à\y d \t\h\á\n\g m \n\ă\m Y; \L\ú\c\: H \g\i\ờ i \p\h\ú\t s \g\i\â\y')}}</p>
</x-layout>
