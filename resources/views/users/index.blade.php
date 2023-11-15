@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Users</h2>
        <p class="section-lead">Example of some Bootstrap table components.</p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Simple Table</h4>
                        <div class="card-header-form">
                            <div>
                                @can('product-create')
                                <!-- <a class="btn btn-primary" href="{{ route('products.create') }}"> Create New Product</a> -->
                                <button class="btn btn-primary" data-toggle="modal" data-target="#create-user-modal">
                                    <i class="fas fa-plus"></i> Create New User</button>
                                @endcan
                            </div>
                        </div>
                        <div class="card-header-form">
                            <form action="{{ route('products.index') }}">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>@foreach($user->roles as $role) 
                                            <label class="badge badge-info">{{ $role->name }}</label>
                                            @endforeach
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#edit-user-{{ $user->id }}-modal">
                                                <i class="fas fa-pencil"></i> Edit</button>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>   
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach($users as $user)
<div class="modal fade" tabindex="-1" role="dialog" id="edit-user-{{ $user->id }}-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('users.update', $user) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">
                            @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ $user->roles->contains($role) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" tabindex="-1" role="dialog" id="create-user-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">
                            @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection