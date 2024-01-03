@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Setting</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Password</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Update Password</h3>
                                </div>

                                @if (Session::has('error_message'))
                                    <div class="alert alert-warning alert-denger fade show" role="alert">
                                        <strong>Error:</strong> {{ Session::get('error_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if (Session::has('success_message'))
                                    <div class="alert alert-warning alert-denger fade show" role="alert">
                                        <strong>Sussess:</strong> {{ Session::get('success_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form method="post" action="{{ url('admin/update-password') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="admin_email">Email address</label>
                                            <input class="form-control" id="exampleInputEmail1"
                                                value="{{ Auth::guard('admin')->user()->email }}" readonly=""
                                                style="background-color: darkgray">
                                        </div>
                                        <div class="form-group">
                                            <label for="current_password">Currect Password</label>
                                            <input type="password" class="form-control" id="current_password"
                                                placeholder="Current Password" name="current_password">
                                                <span id="verifyCurrentPassword">

                                                </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password">new Password</label>
                                            <input type="password" class="form-control" id="new_password"
                                                placeholder="New Password" name="new_password">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmed_password">Confiremd Password</label>
                                            <input type="password" class="form-control" id="confirmed_password"
                                                placeholder="Confirmed Password" name="confirmed_password">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
            </section>
        </div>

    </div>
@endsection
