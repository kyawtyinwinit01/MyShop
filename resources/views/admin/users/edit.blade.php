@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="mt-3">
            <h1 class="mt-4 d-inline">Edit User</h1>
            <a href="{{route('backend.users.index')}}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('backend.users.index')}}">Users</a></li>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit User
            </div>
            <div>
                <form action="{{route('backend.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                     <div class = "ms-3 me-3 mt-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">User Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value = "{{$user->name}}">
                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value = "{{$user->phone}}">
                            @error('phone')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Profile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id=
                                    "new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls=
                                    "new_image-tab-pane" aria-selected="false">New Profile</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                    <img src="{{$user->profile}}" class= "w-25 h-25 my-3" alt="">
                                    <input type="hidden" name="old_profile" id="" value="{{$user->profile}}">
                                </div>
                                <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                                    <input type="file" accept="image/*" class="form-control my-3 @error('profile') is-invalid @enderror" id="profile" name="profile" value = "{{old('profile')}}">
                                </div>
                            </div>
                            @error('profile')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value = "{{$user->email}}">
                            @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class = "mb-3">
                            <label for="category_id" class="form-label">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">

                                <option value="Super Admin" {{ $user->role == 'Super Admin' ? 'selected':'' }} >Super Admin</option>
                                <option value="Admin" {{ $user->role == 'Admin' ? 'selected':'' }} >Admin</option>
                                <option value="User" {{ $user->role == 'User' ? 'selected':'' }} >User</option>

                            </select>
                            @error('role')
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
