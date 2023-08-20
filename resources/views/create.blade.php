@extends('layouts/app')

@section('content')

    <div class="container col-md-4 order-md-1 mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.manage') }}">Manage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>

        <h4 class="mb-3">Create news</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form id="createNewsForm" action="{{ route('news.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="6"></textarea>
                </div>
            </div>

            <div class="mb-3">
                <label for="pub-date">Publication date</label>
                <input id="pub-date" name="pub-date" class="form-control" type="date" required>
            </div>

            <div class="mb-4">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" required>
            </div>

            <button class="btn btn-outline-secondary btn-submit" type="submit">Create</button>
        </form>

    </div>

@endsection
