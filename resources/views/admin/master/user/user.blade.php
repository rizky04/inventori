@extends('layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Master</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">User</a>
                    </li>
                </ul>
            </div>




            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Data</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addUser">
                                    <i class="fa fa-plus"></i>
                                    Add Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->

                            {{-- <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                New</span>
                                                <span class="fw-light">
                                                    Row
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Create a new row using this form, make sure you fill them all</p>
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Name</label>
                                                            <input id="addName" type="text" class="form-control" placeholder="fill name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Position</label>
                                                            <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Office</label>
                                                            <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                           {{-- modal --}}

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>level</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach ($user as $u )
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>{{ $u->level }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" href="#modalEditUser{{ $u->id }}" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" href="#modalDeleteUser{{ $u->id }}" data-toggle="modal" title="" class="btn btn-link btn-danger" data-original-title="hapus">
                                                        <i class="fa fa-times"></i>
                                                    </button>
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
        </div>
    </div>

</div>

<div class="modal fade" id="addUser" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('createUser') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="level" id="mySelect2">Level</label>
                            <select name="level" id="mySelect2" class="form-control">
                                <option value="admin">admin</option>
                                <option value="gudang">gudang</option>
                            </select>
                        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>



@foreach ( $user as $us )
<div class="modal fade" id="modalEditUser{{ $us->id }}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('editUser', $us->id) }}" method="post">
                        @csrf

                        <input type="hidden" class="form-control" name="name" value="{{ $us->id }}">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $us->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $us->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password...">
                        </div>
                        <div class="form-group">
                            <label for="level" >Level</label>
                            <select name="level" class="form-control">
                                <option <?php if($us['level']=="admin") echo "selected"; ?> value="admin">admin</option>
                                <option <?php if($us['level']=="gudang") echo "selected"; ?> value="gudang">gudang</option>
                                <option <?php if($us['level']=="pembelian") echo "selected"; ?> value="pembelian">pembelian</option>
                                <option <?php if($us['level']=="pajak") echo "selected"; ?> value="pajak">gudang</option>
                                <option <?php if($us['level']=="keuangan") echo "selected"; ?> value="keuangan">keuangan</option>
                                <option <?php if($us['level']=="penjualan") echo "selected"; ?> value="penjualan">penjualan</option>
                                <option <?php if($us['level']=="hrd") echo "selected"; ?> value="hrd">hrd</option>
                                <option <?php if($us['level']=="sales") echo "selected"; ?> value="sales">sales</option>
                                <option <?php if($us['level']=="kasir") echo "selected"; ?> value="kasir">kasir</option>

                            </select>
                        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($user as $usr )
<div class="modal fade" id="modalDeleteUser{{ $usr->id }}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('deleteUser', $usr->id) }}" method="get">
                        @csrf
                        <input type="hidden" class="form-control" value="{{ $usr->id }}">
                        <div class="form-group">
                            <label for="nama">Data Akan dihapus</label>
                            <input type="text" class="form-control" value="{{ $usr->name }}" readonly>
                        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach

@endsection

