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
                <div class="d-flex">
                    @if($newsItem->image)
                        <img src="{{ $newsItem->image }}" alt="{{ $newsItem->title }}" class="img-fluid"
                             style="height: 400px; float: right; margin-right: 50px">
                    @endif
                    <p class="ml-4">{{ $newsItem->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 200px; width: 30%">
        <div class="g-0 border rounded overflow-hidden mb-5 shadow">
            <div class="container p-5 order-md-1 ">

                <h4 class="mb-3">Feedback</h4>

                <form id="feedbackForm" action="" method="POST">
                    <div class="mb-3">
                        <label for="name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Name</font></font></label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Email</font></font></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="" value=""
                               required>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                    </div>

                    <button class="btn btn-outline-secondary btn-submit" type="submit">Send</button>
                </form>


            </div>
        </div>
    </div>

@endsection
