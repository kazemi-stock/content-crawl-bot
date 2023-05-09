@extends('layouts.app')
@push('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
          rel="stylesheet">
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            @include('flash-message')
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">لیست لینک ها</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">لینک ها</li>
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
                        <h6 class="float-right">لیست لینک ها</h6>
                        <a href="#!" class="btn btn-success px-4 float-left" onclick="$('#create-form').css('display', 'block')">جدید</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive table-striped table-hover d-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($links as $link)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $link->name ?? '' }}</td>
                                    <td>{{ $link->url ?? '' }}</td>
                                    <td class="text-center" width="100">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" @if($link->active == 1) checked id="status"
                                                   @endif onchange="setStatus({{ $link }})" data-toggle="toggle"
                                                   data-on="Active" data-off="Inactive" data-onstyle="success"
                                                   data-offstyle="danger">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-center" width="100">
                                        <a href="{{ route('links.delete', ['link' => $link]) }}" class="btn btn-danger px-5">حذف</a>
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
            <form action="{{ route('links.store') }}" method="post" class="card border rounded shadow">
                @csrf
                <div class="card-header">
                    <h4>فرم ثبت لینک</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <p>نام: </p>
                        </label>
                        <input type="text" name="name" id="name" class="form-control"
                               placeholder="نام لینک را وارد کنید..." required>
                    </div>
                    <div class="form-group">
                        <label for="url" class="form-label">
                            <p>لینک: <span class="text-danger">*</span></p>
                        </label>
                        <input type="text" name="url" id="url" class="form-control"
                               placeholder="آدرس لینک را وارد کنید..." required>
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
    <script>
        document.getElementById('dashboard').className = 'nav-link text-black-50'
        document.getElementById('google').className = 'nav-link text-black-50'
        document.getElementById('content').className = 'nav-link text-black-50'
        document.getElementById('links').className = 'nav-link active text-white'
        document.getElementById('users').className = 'nav-link text-black-50'
        document.getElementById('setting').className = 'nav-link text-black-50'
    </script>
    <script>
        function setStatus(link) {
            var status = document.getElementById('status').checked
            var formData = new FormData;
            formData.append('status', status)
            formData.append('link_id', link.id)
            $.ajax({
                url: '/links/status/change',
                type: 'POST',
                data: formData,
                success: function (res) {
                    console.log(res)
                },
                error: function (err) {
                    console.log(err)
                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    </script>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endpush
