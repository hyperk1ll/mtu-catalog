@extends('layouts.admin')

@section('content')

<style>
    select.form-control.border-foo:not([size]):not([multiple]) {
      height: auto;
    }
    .border-foo {
      border-style: solid;
      border-width: 1px;
      border-color: rgb(207, 207, 207);
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }
</style>


<div class="content-header">
    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
         <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Products</h3>
            
                            <div class="card-tools">
                              <a href="{{ url('admin/products/') }}" class="btn btn-primary btn-sm">Back</a>
                            </div>
                          </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">  
                                @csrf
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                            Home
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                            Details
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                            Product Image
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                        <div class="mb-3">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control border-foo">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Product Name</label>
                                            <input type="text" name="name" class="form-control border-foo">
                                        </div>
                                        <div class="mb-3">
                                            <label>Product Slug</label>
                                            <input type="text" name="slug" class="form-control border-foo">
                                        </div>
                                        <div class="mb-3">
                                            <label>Select Brand</label>
                                            <select name="brand" class="form-control border-foo">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Small Description (500 Words)</label>
                                            <textarea name="small_description" class="form-control border-foo" rows="4"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control border-foo" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Original Price</label>
                                                    <input type="text" name="original_price" class="form-control border-foo">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Selling Price</label>
                                                    <input type="text" name="selling_price" class="form-control border-foo">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Quantity</label>
                                                    <input type="number" name="quantity" class="form-control border-foo">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Trending</label>
                                                    <input type="checkbox" name="trending" style="width: 25px; height: 25px;">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Hide</label>
                                                    <input type="checkbox" name="status" style="width: 25px; height: 25px;">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                        <div class="mb-3">
                                            <label> Upload Product Image</label>
                                            <input type="file" name="image[]" multiple class="form-control border-foo">
                                        </div>    
                                    </div>
                                </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary float-right my-2">Submit</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection