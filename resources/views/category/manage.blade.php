@extends('master')

@section('title')
    Manage Category
@endsection

@section('body')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Create New Category</h4>
                <form>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Category name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input1" class="col-sm-2 col-form-label">Category Description</label>
                        <div class="col-sm-10">
                            <textarea  class="form-control" id="horizontal-firstname-input1"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input2" class="col-sm-2 col-form-label">Category Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="horizontal-email-input2">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-sm-2">Publication Status</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Published</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                              </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Create New Category</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
