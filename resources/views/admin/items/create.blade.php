@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="mt-3">
            <h1 class="mt-4 d-inline">Items</h1>
            <a href="" class="btn btn-primary float-end">Create Item</a>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('backend.items.index')}}">Items</a></li>
            <li class="breadcrumb-item active">Items Create</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Items List
            </div>
            <div>
                <form action="{{route('backend.items.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class = "ms-3 me-3 mt-3">
                        <div class="mb-3">
                            <label for="code_no" class="form-label">Code No</label>
                            <input type="text" class="form-control @error('code_no') is-invalid @enderror" id="code_no" name="code_no">
                            @error('code_no')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Item Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
                            @error('price')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount</label>
                            <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount">
                            @error('discount')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class = "mb-3">
                            <label for="in_stock" class="form-label">InStock</label>
                            <select class="form-select @error('in_stock') is-invalid @enderror" id="in_stock" name="in_stock">
                                <option value="">Choose InStock</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
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
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description"></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class = "d-grid mb-4">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
