@extends('layouts.app')

@section('title')
Products
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Products</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Products</h2>
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
                                <button class="btn btn-primary" data-toggle="modal" data-target="#create-product-modal">
                                    <i class="fas fa-plus"></i> Create New Product</button>
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
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Rating</th>
                                        @canany(['product-edit', 'product-delete'])
                                        <th>Action</th>
                                        @endcan
                                    </tr>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price_sell }}</td>
                                        <td>{{ $product->rating }}</td>
                                        @canany(['product-edit', 'product-delete'])
                                        <td>
                                            @can('product-edit')
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#edit-product-{{ $product->id }}-modal">
                                                <i class="fas fa-pencil"></i> Edit</button>
                                            @endcan
                                            @can('product-delete')
                                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                        @endcan
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

@foreach($products as $product)
<div class="modal fade" tabindex="-1" role="dialog" id="edit-product-{{ $product->id }}-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('products.update', $product) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Text</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control form-control-sm">
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

<div class="modal fade" tabindex="-1" role="dialog" id="create-product-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Text</label>
                        <input type="text" name="name" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Price Buy</label>
                        <input type="text" name="price_buy" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Price Sell</label>
                        <input type="text" name="price_sell" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quantity" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control form-control-sm">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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

@section('libJS')
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
@endsection