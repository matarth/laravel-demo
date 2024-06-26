@extends('base')


@section('content')

    <form action="{{ route('login.auth') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" class="form-control inputField" name="email" value="{{ old('email', 'test@example.com') }}" required>
        </div>

        <div class="form-group">
            <label for="comment">Password: </label>
            <input class="form-control inputField" name="password" value="{{ old('password', 'password') }}">
        </div>

        <button type="submit" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"><strong>LOGIN</strong></button>
    </form>
@endsection