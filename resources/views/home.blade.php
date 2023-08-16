@extends('layouts/app')

@section('style')
    @vite(['resources/css/home.css'])
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row mb-2">
            @foreach($news as $item)
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{ $item->title }}</h3>
                            <div class="mb-1 text-body-secondary">{{ $item->publication_date }}</div>
                            <p class="card-text mb-auto mt-4">
                                {{ Str::limit($item->description, 250) }}
                            </p>
                            <a href="{{ route('news.show', $item->id) }}" class="icon-link mt-5 gap-1 icon-link-hover stretched-link">
                                Continue reading
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection

