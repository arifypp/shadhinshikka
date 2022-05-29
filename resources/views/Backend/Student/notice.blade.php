@extends('layouts.master')

@section('title') {{ __('নোটিশ') }} @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') {{ __('Dashboard') }} @endslot
        @slot('title') {{ __('নোটিশ') }} @endslot
    @endcomponent

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <table class="table table-responsive align-middle">
                            <thead>
                                <th>ক্র.নং</th>
                                <th>নোটিশ নাম</th>
                                <th>নোটিশ বিবরণ</th>
                                <th>তারিখ</th>
                                <th>অ্যাকশন</th>
                            </thead>
                            <tbody>
                                @foreach( $notice as $key => $note )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $note->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($note->description, 20)}}</td>
                                    <td>{{ date('D M, Y H:i', strtotime($note->created_at)); }}</td>
                                    <td>
                                        <a href="#"><span><i class="fa fa-eye"></i></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection