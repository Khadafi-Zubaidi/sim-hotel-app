@extends('masterlayout.master_layout_login')
@section('content')
    <body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('logintheme/images/PulauKenawa2.jpeg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div align="center">
                            <img src="{{ asset('logintheme') }}/logo/hotel.png" class="mb-4">
                            <br>
                            <h3>Login <strong>Admin Aplikasi</strong></h3>
                            <h5>SIM Hotel</h5>
                        </div>
                        <form action="{{route('cek_login_admin_app')}}" method="post">
                            @csrf
                            <div class="result">
                                @if(Session::get('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group first">
                                <label for="nik">NIK</label>
                                <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK Anda" id="nik">
                                @error('nik')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Anda" id="password">
                                @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <input type="submit" value="Masuk" class="btn btn-block btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
