@extends('master')

@section('title')
    Edit Size
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
                    <h4 class="card-title mb-4">Edit Size Info</h4>
                    <form action="{{ route('size.update', $size->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Size name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $size->name }}" name="name"
                                    id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input2" class="col-sm-2 col-form-label">Size Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $size->code }}" name="code"
                                    id="horizontal-email-input2">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input1" class="col-sm-2 col-form-label">Size
                                Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description"
                                    id="horizontal-firstname-input1">{{ $size->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2">Publication Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" {{ $size->status == 1 ? 'checked' : '' }} type="radio"
                                        name="status" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" {{ $size->status == 0 ? 'checked' : '' }} type="radio"
                                        name="status" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Size Info</button>
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
                    <h4 class="card-title">All Size Info Goes Here</h4>
                    <hr />
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Size Name</th>
                                <th>Size Code</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- show brand info --}}
                            @foreach ($sizes as $size)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $size->name }}</td>
                                    <td>{{ $size->code }}</td>
                                    <td>{{ $size->description }}</td>
                                    <td>{{ $size->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td class="text-right">
                                        {{-- brand status --}}
                                        <a href="{{ route('size.update-status', ['id' => $size->id]) }}"
                                            class="btn btn-sm {{ $size->status == 1 ? 'btn-info' : 'btn-warning' }}"><i
                                                class="fas fa-arrow-circle-up"></i></a>
                                        {{-- brand edit --}}
                                        <a href="{{ route('color.edit', $size->id) }}" class="btn btn-success btn-sm"><i
                                                class="fas fa-edit"></i></a>
                                        {{-- brand delete --}}
                                        <a href="" class="btn btn-danger btn-sm"
                                            onclick="event.preventDefault(); document.getElementById('sizeForm{{ $size->id }}').submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form method="POST" action="{{ route('size.destroy', $size->id) }}"
                                            id="sizeForm{{ $size->id }}">
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
