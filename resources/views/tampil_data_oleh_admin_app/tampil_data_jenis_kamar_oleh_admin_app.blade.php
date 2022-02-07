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
                                <a href="{{route('tambah_data_jenis_kamar_oleh_admin_app')}}" class="nav-link">
                                    <i class="nav-icon fas fa-plus"></i>
                                    <p>
                                        Tambah Data
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('dashboard_admin_app')}}" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Kembali ke Beranda
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
                                        <h5 class="card-title">Data Jenis Kamar</h5>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @csrf
                                                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Jenis Kamar</th>
                                                            <th>Tarif Per Malam</th>
                                                            <th>Fasilitas</th>
                                                            <th>Foto</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $no = 1; @endphp
                                                        @foreach($DataTabel as $dt)
                                                            <tr>
                                                                <td>{{$no++}}</td>
                                                                <td>{{$dt->nama_jenis_kamar}}</td>
                                                                <td>{{$dt->tarif_per_malam}}</td>
                                                                <td>{{$dt->fasilitas}}</td>
                                                                <td><img src="{{asset('foto_jenis_kamar')}}/{{$dt->foto}}" width="300px" height="200px"  alt="User Image"></td>
                                                                <td>
                                                                    <a href="javascript:void(0)" onclick="ubahData({{$dt->id}})" class="btn btn-warning btn-block btn-sm"><i class="fa fa-edit"></i></a>
                                                                    <a href="javascript:void(0)" onclick="editDataFoto({{$dt->id}})" class="btn btn-info btn-block btn-sm"><i class="fa fa-image"></i></a>
                                                                    <a href="javascript:void(0)" onclick="hapusData({{$dt->id}})" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            <!-- Ubah Data -->
                                                            <div class="modal fade" id="ubahDataModal">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content bg-warning">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Ubah Data</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="ubahDataForm" action="" method="post">
                                                                                @csrf
                                                                                <input type="hidden" id="id1"/>
                                                                                <label>Nama Jenis Kamar *</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" id="nama_jenis_kamar1" class="form-control" required>
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text">
                                                                                            <span class="fas fa-id-card"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <label>Tarif Per Malam *</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="number" id="tarif_per_malam1" class="form-control" required>
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text">
                                                                                            <span class="fas fa-id-card"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <label>Fasilitas *</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <textarea id="fasilitas1"></textarea>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan Data</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                function ubahData(id)
                                                                {
                                                                    $.get('/jeniskamars1/'+id,function(jeniskamar){
                                                                        $("#id1").val(jeniskamar.id);
                                                                        $("#nama_jenis_kamar1").val(jeniskamar.nama_jenis_kamar);
                                                                        $("#tarif_per_malam1").val(jeniskamar.tarif_per_malam);
                                                                        $("#fasilitas1").summernote('code', jeniskamar.fasilitas);
                                                                        $("#ubahDataModal").modal('toggle');
                                                                    })
                                                                    $("#ubahDataForm").submit(function (e){
                                                                        e.preventDefault();
                                                                        let id = $("#id1").val();
                                                                        let nama_jenis_kamar = $("#nama_jenis_kamar1").val();
                                                                        let tarif_per_malam = $("#tarif_per_malam1").val();
                                                                        let fasilitas = $("#fasilitas1").val();
                                                                        let _token = $("input[name=_token]").val();
                                                                        $.ajax({
                                                                            url:"{{route('jeniskamar.updatedata')}}",
                                                                            type: "PUT",
                                                                            data:{
                                                                                id:id,
                                                                                nama_jenis_kamar:nama_jenis_kamar,
                                                                                tarif_per_malam:tarif_per_malam,
                                                                                fasilitas:fasilitas,
                                                                                _token:_token
                                                                            },
                                                                            success:function(response){
                                                                                $("#ubahDataModal").modal('hide');
                                                                                window.location = "{{route('tampil_data_jenis_kamar_oleh_adminapp')}}";
                                                                            }
                                                                        })
                                                                    })
                                                                }
                                                            </script>
                                                            <!-- Ubah Foto -->
                                                            <div class="modal fade" id="editDataFotoModal">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-info">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Ubah Data Foto</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="editDataFotoForm" action="" method="post" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" id="id2" name="id2"/>
                                                                                <label>Nama Jenis Kamar *</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" id="nama_jenis_kamar2" class="form-control" disabled>
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text">
                                                                                            <span class="fas fa-id-card"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <label>Foto Sebelumnya *</label><br>
                                                                                <div align="center">
                                                                                    <img id="foto2" width="160px" height="115px" alt="User Image">
                                                                                </div>
                                                                                &nbsp;
                                                                                <label>Upload File (300px X 200px)</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="file" id="file" name="file" class="form-control">
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan Data Foto</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                function editDataFoto(id)
                                                                {
                                                                    $.get('/jeniskamars1/'+id,function(jeniskamar){
                                                                        $("#id2").val(jeniskamar.id);
                                                                        $("#nama_jenis_kamar2").val(jeniskamar.nama_jenis_kamar);
                                                                        $("#foto2").attr('src',"foto_jenis_kamar/"+jeniskamar.foto);
                                                                        $("#editDataFotoModal").modal('toggle');
                                                                    });
                                                                    $.ajaxSetup({
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                        }
                                                                    });
                                                                    $("#editDataFotoForm").submit(function (e){
                                                                        e.preventDefault();
                                                                        var formData = new FormData(this);
                                                                        $.ajax({
                                                                            url:"{{route('jeniskamar.updatedatafoto')}}",
                                                                            type: "POST",
                                                                            data: formData,
                                                                            cache:false,
                                                                            contentType: false,
                                                                            processData: false,
                                                                            success: (data) =>{
                                                                                this.reset();
                                                                                $("#editDataFotoModal").modal('hide');
                                                                                window.location = "{{route('tampil_data_jenis_kamar_oleh_adminapp')}}";
                                                                            }
                                                                        });
                                                                    });
                                                                }
                                                            </script> 
                                                            <!-- Hapus Data -->
                                                            <div class="modal fade" id="hapusDataModal">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Hapus Data</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="hapusDataForm" action="" method="post">
                                                                                @csrf
                                                                                <input type="hidden" id="id3"/>
                                                                                <label>Nama Jenis Kamar *</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" id="nama_jenis_kamar3" class="form-control" disabled>
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text">
                                                                                            <span class="fas fa-id-card"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <button type="submit" class="btn btn-danger btn-block">Hapus Data</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                function hapusData(id)
                                                                {
                                                                    $.get('/jeniskamars1/'+id,function(jeniskamar){
                                                                        $("#id3").val(jeniskamar.id);
                                                                        $("#nama_jenis_kamar3").val(jeniskamar.nama_jenis_kamar);
                                                                        $("#hapusDataModal").modal('toggle');
                                                                    })
                                                                    $("#hapusDataForm").submit(function (e){
                                                                        e.preventDefault();
                                                                        let id = $("#id3").val();
                                                                        let _token = $("input[name=_token]").val();
                                                                        $.ajax({
                                                                            url:"{{route('jeniskamar.deletedata')}}",
                                                                            type: "PUT",
                                                                            data:{
                                                                                id:id,
                                                                                _token:_token
                                                                            },
                                                                            success:function(response){
                                                                                $("#hapusDataModal").modal('hide');
                                                                                window.location = "{{route('tampil_data_jenis_kamar_oleh_adminapp')}}";
                                                                            }
                                                                        })
                                                                    })
                                                                }
                                                            </script>       
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
