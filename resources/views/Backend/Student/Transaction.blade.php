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
                            <th>ট্রান্জিকশন এমাউন্ট </th>
                            <th> ব্যবহারকারীর নাম </th>
                            <th> তারিখ </th>

                            <tbody>
                            @php $i = 1; @endphp
                            
                            @php 
                            $wallet = DB::table('wallets')->where('user_id', Auth::user()->id)->get(); 
                            @endphp

                            @foreach( $wallet as $ledger )
                            @php 
                                $walletledger = DB::table('wallet_ledgers')->where('wallet_id', $ledger->id)->get();
                            @endphp

                            @foreach( $walletledger as $ledgerdata )
                            <tr>
                                <td> {{ $i++ }}</td>
                               
                                <td>৳{{ number_format( $ledgerdata->amount , 0 , '.' , ',' ) }} BDT</td>
                                
                                <td> 
                                @php $username= App\Models\User::where('id', $ledger->user_id)->get();  @endphp
                                    @foreach( $username as $usernamsi)
                                    {{ $usernamsi->name }}
                                    @endforeach

                                </td>
                                
                                <td>{{ date('d M, Y h:i:s a', strtotime($ledgerdata->created_at)) }}</td>
                            </tr>
                            @endforeach

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