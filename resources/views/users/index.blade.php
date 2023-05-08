@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            @include('flash-message')
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">لیست کاربران</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">کاربران</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h6>کاربران پنل</h6>
                        <a href="#!" class="btn btn-success px-4 float-left" onclick="$('#create-form').css('display', 'block')">جدید</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive table-striped table-hover d-table">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام کاربری</th>
                                <th>ایمیل</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name ?? '' }}</td>
                                    <td>{{ $user->email ?? 0 }}</td>
                                    <td>
                                        <a href="#!" onclick="editForm({{ $user }})" class="btn btn-sm btn-warning">ویرایش</a>
                                        <a href="{{ route('users.delete', ['user' => $user]) }}" class="btn btn-sm btn-danger px-3">حذف</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{--  Create Form  --}}
    <div class="col-4 position-absolute" style="top: 15%;left: 15%;display: none" id="create-form">
        <div class="container">
            <form action="{{ route('users.store') }}" method="post" class="card border rounded shadow">
                @csrf
                <div class="card-header">
                    <h4>فرم ایجاد کاربر</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <p>نام کاربری: <span class="text-danger">*</span></p>
                        </label>
                        <input type="text" name="name" id="name" class="form-control"
                               placeholder="نام کاربری را وارد کنید..." required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <p>ایمیل: <span class="text-danger">*</span></p>
                        </label>
                        <input type="text" name="email" id="email" class="form-control"
                               placeholder="ایمیل را وارد کنید..." required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <p>کلمه عبور: <span class="text-danger">*</span></p>
                        </label>
                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="کلمه عبور خود را وارد کنید..." required>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="form-label">
                            <p>تکرار کلمه عبور: <span class="text-danger">*</span></p>
                        </label>
                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control"
                               placeholder="کلمه عبور خود را تکرار کنید..." required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary px-4">ثبت</button>
                        <button type="button" onclick="$('#create-form').css('display', 'none')"
                                class="btn btn-danger px-4 float-left">بستن
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--  Edit Form  --}}
    <div class="col-6 position-absolute" style="top: 17%;left: 17%;display: none" id="edit-form">
        <div class="container">
            <form action="{{ route('users.update') }}" method="post" class="card border rounded shadow">
                @csrf
                @method('put')
                <input type="hidden" name="id" id="edit-id">
                <div class="card-header">
                    <h4>فرم ویرایش کاربر</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <p>نام کاربری: <span class="text-danger">*</span></p>
                        </label>
                        <input type="text" name="name" id="edit-name" class="form-control"
                               placeholder="نام کاربری را وارد کنید..." required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <p>ایمیل: <span class="text-danger">*</span></p>
                        </label>
                        <input type="text" name="email" id="edit-email" class="form-control"
                               placeholder="ایمیل را وارد کنید..." required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <p>کلمه عبور: <span class="text-danger">*</span></p>
                        </label>
                        <input type="password" name="password" id="edit-password" class="form-control"
                               placeholder="کلمه عبور خود را وارد کنید...">
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="form-label">
                            <p>تکرار کلمه عبور: <span class="text-danger">*</span></p>
                        </label>
                        <input type="password" name="password_confirmation" id="edit-password-confirm" class="form-control"
                               placeholder="کلمه عبور خود را تکرار کنید...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning px-4">ویرایش</button>
                        <button type="button" onclick="$('#edit-form').css('display', 'none')"
                                class="btn btn-danger px-4 float-left">بستن
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        document.getElementById('dashboard').className = 'nav-link text-black-50'
        document.getElementById('contact').className = 'nav-link text-black-50'
        document.getElementById('inbox').className = 'nav-link text-black-50'
        document.getElementById('send').className = 'nav-link text-black-50'
        document.getElementById('card').className = 'nav-link text-black-50'
        document.getElementById('event').className = 'nav-link text-black-50'
        document.getElementById('users').className = 'nav-link active text-white'
        document.getElementById('setting').className = 'nav-link text-black-50'
    </script>
    <script>
        function editForm(data) {
            $('#edit-id').val(data.id)
            $('#edit-name').val(data.name)
            $('#edit-email').val(data.email)
            $('#edit-form').css('display', 'block')
        }
    </script>
@endsection
