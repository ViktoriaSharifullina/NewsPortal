@extends('layouts/app')

@section('style')
    @vite(['resources/css/home.css'])
@endsection


@section('content')
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage</li>
            </ol>
        </nav>
        <div class="row mb-2">
            @foreach($news as $item)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{ $item->title }}</h3>
                            <div class="mb-1 text-body-secondary">{{ $item->publication_date }}</div>
                            @if($item->image)
                                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="img-fluid mt-4  mx-auto d-block"
                                     style="height: 200px;">
                            @endif
                            <p class="card-text mb-auto mt-4">{{ Str::limit($item->description, 200) }}</p>
                            <div class="d-flex mt-5 justify-content-between">
                                <a href="{{ route('news.show', $item->id) }}"
                                   class="icon-link gap-1 icon-link-hover">Continue reading</a>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('news.edit.form', $item->id) }}" class="btn btn-outline-secondary btn-submit me-4">Edit</a>
                                    <form action="{{ route('news.delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn btn-danger btn-submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
