@extends('layouts/app')

@section('content')

    <div class="container col-md-3 order-md-1 mt-5">
        <h4 class="mb-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Account</font></font>
        </h4>

        <form id="accountForm" action="" method="POST">
            <div class="mb-3">
                <label for="name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Name</font></font></label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="mb-3">
                <label for="email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email</font></font></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="" value="" required>
            </div>

            <div class="mb-3">
                <label for="password"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">Password</font></font></label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="mb-4">
                <label for="password_repeat"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Repeat
                            password</font></font></label>
                <input type="password" class="form-control" name="password_repeat" id="password_repeat" required>
            </div>

            <button class="btn btn-outline-secondary btn-submit" type="submit"><font style="vertical-align: inherit;"><font
                        style="vertical-align: inherit;">Save</font></font></button>
        </form>
    </div>

@endsection
