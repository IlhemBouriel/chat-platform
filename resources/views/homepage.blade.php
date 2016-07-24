@extends('index')
@section('content')

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>Hello ! </b>Welcome Back <b> {{ Session::get('name')}}  </b>

                    </div>
                </div>
                <!--end  Welcome -->
            </div>


            <div class="row">
                 
            </div>

@endsection