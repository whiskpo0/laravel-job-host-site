@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if (empty(Auth::user()->company->logo))
                <img src="{{ asset('avatar/man.jpg')}}" width="100" style="width:100%">
            @else
                <img src="{{ asset('uploads/logo')}}/{{ Auth::user()->company->logo }}" width="100" style="width:100%">    
            @endif
            
            <br><br>
            <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data"> 
                @csrf                 
                <div class="card">
                    <div class="card-header">
                        Update Logo
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="company_logo" enctype="multipart/form-data">
                        <br>
                        <button class="btn btn-dark float-right" type="submit">Update</button>
                        @if ($errors->has('company_logo'))
                            <div class="error text-danger">{{ $errors->first('company_logo')}}</div>                        
                        @endif
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Update Your Profile
                </div>
                <form action="{{ route('company.store') }}" method="POST">
                    @csrf
                
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{Auth::user()->company->address}}">
                            @if ($errors->has('address'))
                                <div class="error text-danger">{{ $errors->first('address')}}</div>                        
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{Auth::user()->company->phone}}">
                            @if ($errors->has('phone'))
                                <div class="error text-danger">{{ $errors->first('phone')}}</div>                        
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" class="form-control" name="website" value="{{Auth::user()->company->website}}">
                            @if ($errors->has('website'))
                                <div class="error text-danger">{{ $errors->first('website')}}</div>                        
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Slogan</label>
                            <input type="text" class="form-control" name="slogan" value="{{Auth::user()->company->slogan}}" >
                            @if ($errors->has('slogan'))
                                <div class="error text-danger">{{ $errors->first('slogan')}}</div>                        
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" id="" cols="" rows="">{{Auth::user()->company->description}}</textarea>
                            @if ($errors->has('description'))
                                <div class="error text-danger">{{ $errors->first('description')}}</div>                        
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
        </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        About Your company
                    </div>
                    <div class="card-body">
                        <p><b>Company Name</b>: {{ Auth::user()->company->cname }}</p>
                        <p><b>Address</b>: {{ Auth::user()->company->address }}</p>
                        <p>Phone: {{ Auth::user()->company->phone }}</p>
                        <p>Website: 
                            <a href="{{ Auth::user()->company->website }}">{{ Auth::user()->company->website }}</a>
                        </p>
                        <p>Slogan: {{ Auth::user()->company->slogan }}</p>
                        <p>Company Page: 
                            <a href="company/{{ Auth::user()->company->slug }}">View</a></p>

                    </div>
                </div>
                <br>
                <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf                                   
                    <div class="card">
                        <div class="card-header">
                            Update Coverletter
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="cover_photo">
                            <br>
                            <button class="btn btn-dark float-right" type="submit">Update</button>
                            @if ($errors->has('cover_photo'))
                                <div class="error text-danger">{{ $errors->first('cover_letter')}}</div>                        
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
