@extends('layouts/app')

@section('style')
    @vite(['resources/css/home.css'])
@endsection

@section('content')

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $newsItem->title }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $newsItem->title }}</h2>
                <p>{{ $newsItem->publication_date }}</p>
                <div class="d-flex justify-content-center align-items-center">
                    @if($newsItem->image)
                        <img src="{{ $newsItem->image }}" alt="{{ $newsItem->title }}" class="img-fluid"
                             style="max-height: 400px;">
                    @endif
                </div>
                <p class="mt-5">{{ $newsItem->description }}</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 200px; width: 30%">
        <div class="g-0 border rounded overflow-hidden mb-5 shadow">
            <div class="container p-5 order-md-1 ">

                <h4 class="mb-3">Feedback</h4>

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

                <form id="feedbackForm" action="{{ route('feedback.create', ['id' => $newsItem->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="" value=""
                               required>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                            <small id="comment-count" class="form-text text-muted">0/200</small>
                        </div>
                    </div>

                    <script>
                        const commentTextarea = document.getElementById('comment');
                        const commentCount = document.getElementById('comment-count');

                        commentTextarea.addEventListener('input', function () {
                            const remaining = commentTextarea.value.length;

                            commentCount.textContent = `${remaining}/200`;
                        });
                    </script>

                    <button class="btn btn-outline-secondary mt-2 btn-submit" type="submit">Send</button>
                </form>


            </div>
        </div>
    </div>

@endsection
