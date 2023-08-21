@extends('layouts/app')

@section('style')
    @vite(['resources/css/home.css'])
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row mb-2 d-flex align-items-center justify-content-center">
            @foreach($news as $item)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative news-item">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{ $item->title }}</h3>
                            <div class="mb-1 text-body-secondary">{{ $item->publication_date }}</div>
                            @if($item->image)
                                <img src="{{ $item->image }}" alt="{{ $item->title }}"
                                     class="img-fluid mt-4  mx-auto d-block"
                                     style="height: 200px;">
                            @endif
                            <p class="card-text mt-4">
                                {{ Str::limit($item->description, 230) }}
                            </p>
                            <a href="{{ route('news.show', $item->id) }}"
                               class="icon-link gap-1 mt-2 icon-link-hover stretched-link">
                                Continue reading
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <nav aria-label="Page navigation example">
            <div class="pagination d-flex align-items-center justify-content-center mt-5">
                {{ $news->links('pagination::bootstrap-4') }}
            </div>
        </nav>
    </div>

@endsection

