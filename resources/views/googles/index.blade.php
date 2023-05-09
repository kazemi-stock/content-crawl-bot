@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            @include('flash-message')
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">لیست محتوای گوگل ترندز</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">گوگل ترندز</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header text-left">
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive table-striped table-hover d-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Query</th>
                                <th>Value</th>
                                <th>FormattedKey</th>
                                <th>Link</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($queries as $query)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td width="260">{{ $query->gt_query ?? '' }}</td>
                                    <td>{{ $query->gt_value ?? '' }}</td>
                                    <td style="direction: ltr">{{ $query->gt_format ?? '' }}</td>
                                    <td>{{ $query->gt_link ?? '' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.getElementById('dashboard').className = 'nav-link text-black-50'
        document.getElementById('google').className = 'nav-link active text-white'
        document.getElementById('content').className = 'nav-link text-black-50'
        document.getElementById('links').className = 'nav-link text-black-50'
        document.getElementById('users').className = 'nav-link text-black-50'
        document.getElementById('setting').className = 'nav-link text-black-50'
    </script>

@endsection
