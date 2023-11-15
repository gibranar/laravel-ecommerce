@extends('layouts.app')

@section('title')
FAQ
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>FAQ</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">FAQ</h2>
        <p class="section-lead">Example of some Bootstrap table components.</p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Simple Table</h4>
                        <div class="card-header-form">
                            <div>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#create-faq-modal">
                                    <i class="fas fa-plus"></i> Create New FAQ</button>
                            </div>
                        </div>
                        <div class="card-header-form">
                            <form action="{{ route('faq.index') }}">
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
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ $faq->answer }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#edit-faq-modal-{{$faq->id}}" data-id="{{ $faq->id }}" data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-action" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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

@foreach ($faqs as $faq)
<!-- Modal Edit -->

<div class="modal fade" id="edit-faq-modal-{{$faq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit FAQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}">
                    </div>
                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <textarea class="form-control" id="answer" name="answer" rows="3">{{ $faq->answer }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" tabindex="-1" role="dialog" id="create-faq-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create FAQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('faq.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" name="question" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Answer</label>
                        <input type="text" name="answer" class="form-control form-control-sm">
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