@extends('layouts.master')

@section('title') ওয়ালেট বক্স @endsection

@section('css')
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') ওয়ালেট বক্স @endslot
        @slot('title') ওয়ালেট বক্স @endslot
    @endcomponent

    <!-- Starting content -->
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-4">
            <div class="card card-body">
                <form action="{{ route('settings.walletstore') }}" method="post">
                    @csrf
                    <div class="mb-5">
                        <label for="formrow-websiteherotitle-input" class="form-label">ওয়ালেট নাম</label>
                        <input type="text" name="walletname" class="form-control" id="formrow-websiteherotitle-input" placeholder="ওয়ালেট নাম লিখুন!">
                        <span class="text-danger">@error('walletname'){{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">সেভ করুন</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8 col-lg-8 col-xl-8 col-sm-12 col-8">
            <div class="card card-body">
                <table class="table table-bordered dt-responsive nowrap w-100 align-self-center align-middle">
                    <thead>
                        <tr>
                            <th>ক্র.নং</th>
                            <th>ওয়ালেট আইডি</th>
                            <th>ওয়ালেট নাম</th>
                        </tr>
                    </thead>


                    <tbody>
                        @php $i = 1;  @endphp
                        @foreach( $wallet as $value )
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


@section('script')
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

@endsection