@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create a Job
                </div>
                <div class="card-body">
                    <form action="{{route('job.store')}}" method="post">
                        @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <textarea name="roles" id=""  class="form-control @error('roles') is-invalid @enderror" name="roles" value="{{ old('roles') }}"></textarea>
                        @error('roles')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoty">Category</label>
                        <select name="category" class="form-control" id="">
                            @foreach (App\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" name="position" id="" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}">
                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Address:</label>
                        <input type="text" name="address" id="" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select name="type" id="" class="form-control">
                            <option value="fulltime">fulltime</option>
                            <option value="parttime">part-time</option>
                            <option value="casual">casual</option>                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="" class="form-control">
                            <option value="fulltime">live</option>
                            <option value="parttime">draft</option>                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="last_date">Last date:</label>
                        <input type="text" id="datepicker" name="last_date" id="" class="form-control @error('last_date') is-invalid @enderror" name="last_date" value="{{ old('last_date') }}">
                        @error('last_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>  
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
