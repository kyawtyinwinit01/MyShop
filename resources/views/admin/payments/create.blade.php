@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="mt-3">
            <h1 class="mt-4 d-inline">Payments</h1>
            <a href="" class="btn btn-primary float-end">Create Payments</a>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('backend.payments.index')}}">Payments</a></li>
            <li class="breadcrumb-item active">Payment Create</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Payments List
            </div>
            <div>
                <form action="{{route('backend.payments.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class = "ms-3 me-3 mt-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" accept="image/*" class="form-control" id="logo" name="logo">
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
