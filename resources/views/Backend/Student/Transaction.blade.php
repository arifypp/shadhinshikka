@extends('layouts.master')

@section('title') {{ __('ট্রান্জিকশন') }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') {{ __('ট্রান্জিকশন') }} @endslot
        @slot('title') {{ __('ট্রান্জিকশন লিস্ট') }}  @endslot
    @endcomponent


    <div class="container">
        <div class="row">
            <div class="card">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                    <div class="card-body">
                        <table class="table data-table table-responsive align-middle">
                            <th>ক্র. নং</th>
                            <th>এমাউন্ট </th>
                            <th>কোর্সের নাম </th>
                            <th>ট্রান্জিকশন আইডি </th>
                            <th>মোবাইল নং</th>
                            <th>ডিউ টাকা</th>
                            <th> ব্যবহারকারীর নাম </th>
                            <th> তারিখ </th>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach( $transaction as $key => $transData )
                            

                            <tr>
                                <td> {{ $key+1 }}</td>
                                <td>৳{{ number_format( $transData->amount , 0 , '.' , ',' ) }} BDT</td>
                                <td>{{ $transData->name }} </td>
                                <td>{{ $transData->traxid }}</td>
                                <td>{{ $transData->phone }}</td>
                                <td>
                                    @if($transData->price != $transData->amount)
                                    <span class="text-danger">৳{{ number_format( $transData->amount- $transData->price, 0 , '.' , ',' ) }} BDT</span>
                                    @endif
                                </td>                               
                                
                                <td> {{ App\Models\User::find($transData->users_id)->name }} </td>
                                
                                <td>{{ date('d M, Y h:i:s a', strtotime($transData->created_at)) }}</td>
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

@section('script')
<script>
    $(document).ready( function () {
        $('.data-table').DataTable();
    } );
</script>
@endsection