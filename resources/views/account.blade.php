@extends('layouts/app')

@section('content')

    <div class="container col-md-3 order-md-1 mt-5">
        <h4 class="mb-3">Account</h4>

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

        <form id="accountForm" action="{{ route('account.update', $user->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder=""
                       value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="password"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">Password</font></font></label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation">Repeat password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                       required>
            </div>

            <button class="btn btn-outline-secondary btn-submit" type="submit">Save</button>
        </form>
    </div>

@endsection
