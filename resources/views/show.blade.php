@extends('layouts/app')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $newsItem->title }}</h2>
                <p>{{ $newsItem->publication_date }}</p>
                <p>{{ $newsItem->description }}</p>
                <!-- Здесь можно добавить изображение новости, дополнительные детали и т.д. -->
            </div>
        </div>
    </div>

@endsection
