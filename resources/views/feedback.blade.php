@extends('layouts/app')

@section('style')
    @vite(['resources/css/home.css'])
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row mb-2">
            @foreach($feedback as $item)
                <div class="col-md-4">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{ $item->name }}</h3>
                            <div class="mb-1 text-body-secondary">{{ $item->email }}</div>
                            <p class="card-text mb-auto mt-4">{{ $item->comment }}</p>
                            <div class="d-flex mt-4 ml-auto justify-content-between align-items-center">
                                <form action="{{ route('feedback.delete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
