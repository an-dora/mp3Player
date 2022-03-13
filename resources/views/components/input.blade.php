@php
$_name = $attributes['name'];// khởi tạo biến _name
$_label = $attributes['label'];// khởi tạo biến _label
$_type = $attributes['type'] ?? 'text';// khởi tạo biến _type defaulf của nó là 'text'
$_old_value = old($_name);// khởi tạo biến _old_value lưu giá trị cũ, khi submit lỗi ko cần nhập lại từ đầu

$_value = $attributes['value'] ?? '';// khởi tạo biến _type defaulf của nó là ''
$_value = empty($_old_value) ? $_value : $_old_value;// khi _old_value rỗng _value lấy _value ngược lại lấy _old_value
@endphp

<div class="form-group mt-3">
    <label for="{{ $_name }}" class="form-label">{{ $_label }}</label>
    <input type="{{$_type}}" id="{{$_name}}" name="{{$_name}}" value="{{$_value}}" class="form-control @error($_name) is-invalid @enderror"/>

    @error($_name)
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror
</div>
