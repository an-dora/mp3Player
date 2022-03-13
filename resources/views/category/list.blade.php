<x-layout title="Thu vien">
    <p class="text-center display-4 text-b">
        List nhạc
    </p>
    <div class="container rounded border-dark">
        <div class="row row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($theloai as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->tentheloai }}</td>
                            <td><a class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalXemTL-{{ $item->id }}">
                                    Xem</a>
                                <a class="btn btn-outline-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalSuaTL-{{ $item->id }}">
                                    Sửa</a>
                                <a class=" btn btn-outline-danger"
                                    href="{{ route('xoaTL', ['id' => $item->id]) }}">Xoá</a>
                            </td>
                        </tr>
                        <x-modal-xem-the-loai :data="$item" />
                        <x-modal-sua-the-loai :data="$item" />
                    @endforeach
            </table>

        </div>
    </div>



</x-layout>
