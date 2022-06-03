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
                                    <td>{{ date('D M, Y H:i A', strtotime($note->created_at)); }}

                                    </td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal"
                            data-bs-target="#Coursedetails{{ $note->id }}"><span><i class="fa fa-eye"></i></span></a>
                                        <!-- Static Backdrop Modal -->
                                        <div class="modal fade" id="Coursedetails{{ $note->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                            tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">{{ $note->title }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{ $note->description }}.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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