<x-layout title="HOME - Thêm tài khoản">
    <p class="text-center display-2">
        Tạo Account
    </p>
    <form method="post" action="{{ route('save') }}">
        @csrf
        <x-input name='name' label='Họ tên'/>
        <x-input name='email' type='email' label='Email'/>
        <x-input name='password' type='password' label='Password'/>
        <x-input name='confirmPassword' type='password' label='Password x2'/>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Tạo</button>
        </div>
    </form>

</x-layout>