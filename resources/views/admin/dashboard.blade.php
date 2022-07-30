@extends('admin.master')


@section('title')
    Dashboard
@endsection

@section('body')
    <section class="section-dashboard--main">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card rounded-3">
                        <div class="card-body">

                            <div class="display-6">
                                Welcome to your dashboard!
                            </div>
                            <p class="mt-2 text-end mb-0 pe-3 text-info fw-bold"  id="file-upload-filename">
                            @if($message = Session::get('message'))
                                <h4 id="file-upload-filename" class="mt-2 text-end mb-0 pe-3 text-info fw-bold">{{ $message }}</h4>
                                @endif
                                </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-center justify-content-start">
                    <form action="{{ route('file-import') }}" class="d-flex"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- START UPLOAD BTN -->
                        <div class="col-md-6 px-2 custom-file text-left">
                            <input id='fileid' type='file' name="file" hidden class="custom-file-input" />
                            <input id='buttonid' type='button' class="btn btn-upload" value='Upload' />
                        </div>
                        <div class="col-md-6 px-2">

                            <input  type='submit' class="btn btn-upload" value='Import' />
                        </div>

                        <!-- END UPLOAD BTN -->
                    </form>
                </div>
            </div>

            <div class="container px-2">
                <div class="row">
                    <div class="col-md-12 card rounded-3">
                        <h2 class="heading--main pt-4 pb-0 px-3 mt-2">
                            Sales Report
                        </h2>
                        <canvas id="salesChart" height="300rem"></canvas>
                    </div>
                </div>
            </div>

            <div class="container px-2">
                <div class="row">
                    <div class="col-md-12 card rounded-3">
                        <h2 class="heading--main pt-4 pb-0 px-3 mt-2">
                            Recent Credit History
                        </h2>
                        <canvas id="creditChart" height="300rem"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection





