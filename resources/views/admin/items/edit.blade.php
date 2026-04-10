@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="mt-3">
            <h1 class="mt-4 d-inline">Edit Item</h1>
            <a href="{{route('backend.items.index')}}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('backend.items.index')}}">Items</a></li>
            <li class="breadcrumb-item active">Edit Item</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Item
            </div>
            <div>
                <form action="{{route('backend.items.update',$item->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class = "ms-3 me-3 mt-3">
                        <div class="mb-3">
                            <label for="code_no" class="form-label">Code No</label>
                            <input type="text" class="form-control @error('code_no') is-invalid @enderror" id="code_no" name="code_no" value = "{{$item->code_no}}">
                            @error('code_no')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Item Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value = "{{$item->name}}">
                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Image</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id=
                                    "new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls=
                                    "new_image-tab-pane" aria-selected="false">New Image</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                    <img src="{{$item->image}}" class= "w-25 h-25 my-3" alt="">
                                    <input type="hidden" name="old_image" id="" value="{{$item->image}}">
                                </div>
                                <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                                    <input type="file" accept="image/*" class="form-control my-3 @error('image') is-invalid @enderror" id="image" name="image" value = "{{old('image')}}">
                                </div>
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value = "{{$item->price}}">
                            @error('price')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount</label>
                            <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value = "{{$item->discount}}">
                            @error('discount')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class = "mb-3">
                            <label for="in_stock" class="form-label">InStock</label>
                            <select class="form-select @error('in_stock') is-invalid @enderror" id="in_stock" name="in_stock" value = "{{old('in_stock')}}">
                                <option value="1" {{ $item->in_stock == 1 ? 'selected':'' }} >Yes</option>
                                <option value="0" {{ $item->in_stock == 0 ? 'selected':'' }} >No</option>
                            </select>
                            @error('in_stock')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class = "mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                <option value="">Choose Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ $item->category_id == $category->id ? 'selected':'' }} >
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description"> {{$item->description}} </textarea>
                            @error('description')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class = "d-grid mb-4">
                            <button class="btn btn-warning" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
