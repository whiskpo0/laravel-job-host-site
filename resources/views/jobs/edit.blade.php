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
                    <form action="{{route('job.update', [$jobs->id])}}" method="post">
                        @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$jobs->title }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $jobs->description }}">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <textarea name="roles" id=""  class="form-control @error('roles') is-invalid @enderror" name="roles" value="{{ old('roles') }}">{{ $jobs->roles }}</textarea>
                        @error('roles')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoty_id">Category</label>
                        <select name="categoty_id" class="form-control" id="">
                            @foreach (App\Category::all() as $cat)
                                <option value="{{$cat->id}}" {{ $cat->id == $jobs->category_id ? 'selected' : ''}}>{{$cat->name}}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" name="position" id="" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $jobs->position }}">
                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Address:</label>
                        <input type="text" name="address" id="" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$jobs->address }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select name="type" id="" class="form-control">
                            <option value="fulltime" {{ $jobs->type == 'fulltime' ? 'selected' : ''}}>fulltime</option>
                            <option value="parttime" {{ $jobs->type == 'parttime' ? 'selected' : ''}}>parttime</option>
                            <option value="casual" {{ $jobs->type == 'casual' ? 'selected' : ''}}>casual</option>                                                      
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="" class="form-control">
                            <option value="1" {{ $jobs->status == 1 ? 'selected' : ''}}>live</option>
                            <option value="0" {{ $jobs->status == 0 ? 'selected' : ''}}>draft</option>                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="last_date">Last date:</label>
                        <input type="date" name="last_date" id="" class="form-control @error('last_date') is-invalid @enderror" name="last_date" value="{{ $jobs->last_date }}">
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
