@extends('masterlayout.master_layout_backend')
@section('content')
    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Dashboard Administrator</a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="#" class="brand-link">
                    <span class="brand-text font-weight-light">Menu Utama</span>
                </a>
                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{asset('foto_admin_app')}}/{{$LoggedUserInfo->foto}}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{$LoggedUserInfo->nama}}</a>
                        </div>
                    </div>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Master Data
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('tampil_data_jenis_kamar_oleh_adminapp')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Jenis Kamar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('logout_admin_app')}}" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>
                                        Keluar Aplikasi
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1 class="m-0">Aplikasi Sistem Informasi Manajemen Hotel</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Deskripsi Aplikasi</h5>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <strong>Aplikasi Sistem Informasi Manajemen Hotel</strong> adalah sebuah aplikasi berbasis web yang disusun dalam rangka menunjang kegiatan pengolahan data yang berkaitan perhotelan.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Profile Administrator</h5>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary card-outline">
                                                    <div class="card-body box-profile">
                                                        <div class="text-center">
                                                            <img class="profile-user-img img-fluid img-circle"
                                                                 src="{{asset('foto_admin_app')}}/{{$LoggedUserInfo->foto}}"
                                                                 alt="User profile picture">
                                                        </div>
                                                        <h5 class="profile-username text-center">{{$LoggedUserInfo->nama}}</h5>
                                                        <p class="text-muted text-center">NIK. {{$LoggedUserInfo->nik}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card">
                                                    <div class="card-header p-2">
                                                        <ul class="nav nav-pills">
                                                            <li class="nav-item"><a class="nav-link active" href="#ubah-profile" data-toggle="tab">Ubah Profile</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="#ubah-password" data-toggle="tab">Ubah Password</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="#ubah-foto" data-toggle="tab">Ubah Foto</a></li>
                                                        </ul>
                                                    </div><!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="tab-content">
                                                            <div class="active tab-pane" id="ubah-profile">
                                                                <form method="post" action="{{route('simpan_perubahan_data_profil_admin_app')}}">
                                                                    @csrf
                                                                    <input name="id" type="hidden" class="form-control" value="{{$LoggedUserInfo->id}}">
                                                                    <div class="form-group">
                                                                        <label>NIK (tanpa spasi)</label>
                                                                        <input id="nik" name="nik" type="text" class="form-control" placeholder="Masukkan NIK" value="{{$LoggedUserInfo->nik}}" onkeypress="return isNumber(event)">
                                                                        <script>
                                                                            function isNumber(evt) {
                                                                                evt = (evt) ? evt : window.event;
                                                                                var charCode = (evt.which) ? evt.which : evt.keyCode;
                                                                                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                                                                    return false;
                                                                                }
                                                                                return true;
                                                                            }
                                                                        </script>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input id="nama" name="nama"type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama" value="{{$LoggedUserInfo->nama}}">
                                                                        @error('nama')
                                                                        <div class="invalid-feedback">{{$message}}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-success btn-block">Simpan Perubahan Profil</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="tab-pane" id="ubah-password">
                                                                <form method="post" action="{{route('simpan_perubahan_data_password_admin_app')}}">
                                                                    @csrf
                                                                    <input name="id" type="hidden" class="form-control" value="{{$LoggedUserInfo->id}}">
                                                                    <div class="form-group">
                                                                        <label>Password Baru</label>
                                                                        <input name="password_baru" type="text" class="form-control @error('password_baru') is-invalid @enderror" placeholder="Masukkan Password">
                                                                        @error('password_baru')
                                                                        <div class="invalid-feedback">{{$message}}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-danger btn-block">Simpan Perubahan Password</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="tab-pane" id="ubah-foto">
                                                                <form method="post" action="{{route('simpan_perubahan_data_foto_admin_app')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input name="id" type="hidden" class="form-control" value="{{$LoggedUserInfo->id}}">
                                                                    <label>Upload File</label><br>
                                                                    <div class="input-group mb-3">
                                                                        <input type="file" id="file" name="file" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-warning btn-block">Simpan Perubahan Foto</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
@endsection