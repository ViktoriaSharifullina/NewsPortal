@extends('layouts/app')

@section('style')
    @vite(['resources/css/login.css'])
@endsection

@section('content')

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-6 order-md-1">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <h4 class="mb-4 ">Login</h4>

                    @if($errors->any())
                        <div class="alert alert-danger" style="width: 70%;">
                                @foreach($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                    @endif

                    <form id="loginForm" action="" method="POST" style="width: 70%;">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="" value=""
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>

                        <button class="btn btn-outline-secondary btn-submit" type="submit">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 order-md-2 d-flex align-items-center justify-content-center">
                <img src="{{ Vite::asset('resources/images/giphy.gif') }}" alt="Гифка" loading="lazy" height="400">
            </div>
        </div>
    </div>

@endsection
