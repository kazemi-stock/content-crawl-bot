@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">لیست محتوا ها</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">محتوا ها</li>
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
                        <h6>لیست محتواهای دریافتی از لینک ها</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive table-striped table-hover d-table">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام مخاطب</th>
                                <th>تلفن</th>
                                <th>خط دریافتی</th>
                                <th>متن پیام</th>
                                <th>نوع ثبت</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.getElementById('dashboard').className = 'nav-link text-black-50'
        document.getElementById('content').className = 'nav-link active text-white'
        document.getElementById('links').className = 'nav-link text-black-50'
        document.getElementById('google').className = 'nav-link text-black-50'
        document.getElementById('users').className = 'nav-link text-black-50'
        document.getElementById('setting').className = 'nav-link text-black-50'
    </script>
@endsection
