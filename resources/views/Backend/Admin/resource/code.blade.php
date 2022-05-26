@extends('layouts.master')

@section('title') {{ __('Code Resource') }} @endsection

@section('css')
   <!-- CSS -->
   <link rel="stylesheet" href="{{ asset('/prism.css') }}" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') {{ __('Code Resource') }} @endslot
        @slot('title') {{ __('Code Resource') }}  @endslot
    @endcomponent

    
<!-- My code for resouce help -->
<div class="resource__box">
    <div class="card">
        <div class="card-header bg-ss">
            <h4 class="text-white">Resouce Box</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search what are you looking for..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"> @ </span>
                        </div>
                    </div>
                    <!-- All the items -->
                        <div class="resource__items">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">
                                    <p class="m-0">Html Markup Code</p>
                                    <span>Language: html</span>
                                </a>
                                <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="false">Profile</a>
                                <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                    aria-selected="false">Messages</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                                    role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                            </div>
                        </div>
                </div>
                <div class="col-md-9">
                    <div class="resource__item">
                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
<!-- Body text -->
<pre class="line-numbers"><code class="language-markup">
@verbatim
    &lt;!DOCTYPE html&gt;
        &lt;html lang=&quot;en&quot;&gt;
        &lt;head&gt;
            &lt;meta charset=&quot;UTF-8&quot;&gt;
            &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;&gt;
            &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;&gt;
            &lt;title&gt;Document&lt;/title&gt;
        &lt;/head&gt;
        &lt;body&gt;
            &lt;h6&gt;Hello test&lt;/h6&gt;
        &lt;/body&gt;
    &lt;/html&gt;
@endverbatim
</code></pre>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
<!-- Body text -->
<pre class="line-numbers"><code class="language-css">
@verbatim
    @font-face {
        font-family: Chunkfive; src: url('Chunkfive.otf');
        }

        body, .usertext {
        color: #F0F0F0; 
        background: #600;
        font-family: Chunkfive, sans;
        --heading-1: 30px/32px Helvetica, sans-serif;
        }

        @import url(print.css);
        @media print {
        a[href^=http]::after {
            content: attr(href)
        }
    }
@endverbatim
</code></pre>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
<!-- Body text -->
<pre class="line-numbers">
<code class="language-php">
@verbatim
    @php echo "hello world"; @endphp 
@endverbatim
</code>
</pre>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab">
                                <p>
                                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                    art party before they sold out master cleanse gluten-free squid
                                    scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                    art party locavore wolf cliche high life echo park Austin. Cred
                                    vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                    farm-to-table.
                                </p>
                                <p class="mb-0">Fanny pack portland seitan DIY,
                                    art party locavore wolf cliche high life echo park Austin. Cred
                                    vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                    farm-to-table.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>















            </div>
            <!-- end row -->

@endsection

@section('script')
<script src="{{ asset('/prism.js') }}"></script>
@endsection