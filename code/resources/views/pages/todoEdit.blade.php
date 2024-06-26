@extends('base')

@section('content')
    <div class="pt-3 sm:pt-5">
        <h2 class="text-xl font-semibold text-black dark:text-white">{{$item?->name}}</h2>
    </div>

    <form action="{{ route($actionRoute, $item?->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" class="form-control inputField" id="name" name="name" value="{{ old('name', $item->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="comment">Comment: </label>
            <textarea class="form-control inputField" id="comment" name="comment" rows="1">{{ old('comment', $item->comment ?? '') }}</textarea>
        </div>

        <button type="submit" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"><strong>{{$item ? 'UPDATE' : 'CREATE'}}</strong></button>
    </form>


@endsection