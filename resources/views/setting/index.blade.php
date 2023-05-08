@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            @include('flash-message')
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">تنظیمات</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">تنظیمات</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card border rounded shadow">
                    <div class="card-header">
                        <h4>تنظیمات ربات</h4>
                    </div>
                    <form action="{{ route('setting.robot.update') }}" method="post" class="card-body">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="t_board_id" class="form-label">
                                <p>آی دی بورد: ( بورد فعال جهت ثبت رویدادها و فعالیت ربات )<span
                                        class="text-danger">*</span></p>
                            </label>
                            <input type="text" name="t_board_id" class="form-control" value="{{ $setting->t_board_id }}"
                                   placeholder="آی دی بورد را وارد کنید..." required>
                        </div>
                        <div class="form-group">
                            <label for="t_list_id" class="form-label">
                                <p>آی دی لیست: (جهت دریافت پیام های جدید از کاربر)<span class="text-danger">*</span></p>
                            </label>
                            <input type="text" name="t_list_id" class="form-control" value="{{ $setting->t_list_id }}"
                                   placeholder="آی دی لیست را وارد کنید..." required>
                        </div>
                        <div class="form-group">
                            <label for="t_key" class="form-label">
                                <p>کلید درگاه ترلو: (API Key)<span class="text-danger">*</span></p>
                            </label>
                            <input type="text" name="t_key" class="form-control" value="{{ $setting->t_key }}"
                                   placeholder="کلید درگاه ترلو را وارد کنید..." required>
                        </div>
                        <div class="form-group">
                            <label for="t_token" class="form-label">
                                <p>توکن ترلو: (Trello Token)<span class="text-danger">*</span></p>
                            </label>
                            <input type="text" name="t_token" class="form-control" value="{{ $setting->t_token }}"
                                   placeholder="توکن ترلو را وارد کنید..." required>
                        </div>
                        <div class="form-group">
                            <label for="line_number" class="form-label">
                                <p>خط: (شماره خط اختصاصی پنل پیامکی)<span class="text-danger">*</span></p>
                            </label>
                            <input type="text" name="line_number" class="form-control"
                                   value="{{ $setting->line_number }}"
                                   placeholder="شماره خط اختصاصی را وارد کنید..." required>
                        </div>
                        <div class="form-group">
                            <label for="signature" class="form-label">
                                <p>توکن پارس گرین: (ParsGreen Token)<span class="text-danger">*</span></p>
                            </label>
                            <input type="text" name="signature" class="form-control" value="{{ $setting->signature }}"
                                   placeholder="توکن پنل پیامکی را وارد کنید..." required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success px-5 float-left">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.getElementById('dashboard').className = 'nav-link text-black-50'
        document.getElementById('contact').className = 'nav-link text-black-50'
        document.getElementById('inbox').className = 'nav-link text-black-50'
        document.getElementById('send').className = 'nav-link text-black-50'
        document.getElementById('card').className = 'nav-link text-black-50'
        document.getElementById('event').className = 'nav-link text-black-50'
        document.getElementById('users').className = 'nav-link text-black-50'
        document.getElementById('setting').className = 'nav-link active text-white'
    </script>
@endsection
