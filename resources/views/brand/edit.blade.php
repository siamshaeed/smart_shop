@extends('master')

@section('title')
    Edit Brand
@endsection

@section('body')

    {{-- For Message Show --}}
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Brand Info</h4>
                    <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Brand name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $brand->name }}" name="name"
                                    id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input1" class="col-sm-2 col-form-label">Brand
                                Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description"
                                    id="horizontal-firstname-input1">{{ $brand->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input2" class="col-sm-2 col-form-label">Brand Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" name="image" id="horizontal-email-input2">
                                <img src="{{ asset($brand->image) }}" alt="" height="50" width="100">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2">Publication Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" {{ $brand->status == 1 ? 'checked' : '' }} type="radio"
                                        name="status" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" {{ $brand->status == 0 ? 'checked' : '' }} type="radio"
                                        name="status" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Brand Info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Data Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Brand Info Goes Here</h4>
                    <hr />
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Brand Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- show brand info --}}
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->description }}</td>
                                    <td><img src="{{ asset($brand->image) }}" alt="" height="40" width="60"></td>
                                    <td>{{ $brand->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td class="text-right">
                                        {{-- brand status --}}
                                        <a href="{{ route('brand.update-status', ['id' => $brand->id]) }}"
                                            class="btn btn-sm {{ $brand->status == 1 ? 'btn-info' : 'btn-warning' }}"><i
                                                class="fas fa-arrow-circle-up"></i></a>
                                        {{-- brand edit --}}
                                        <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-success btn-sm"><i
                                                class="fas fa-edit"></i></a>
                                        {{-- brand delete --}}
                                        <a href="" class="btn btn-danger btn-sm"
                                            onclick="event.preventDefault(); document.getElementById('categoryForm{{ $brand->id }}').submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form method="POST" action="{{ route('brand.destroy', $brand->id) }}"
                                            id="categoryForm{{ $brand->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
