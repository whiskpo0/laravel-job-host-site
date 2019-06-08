@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('alljobs') }}" method="GET">
        <div class="form-inline">            
            <div class="input-group input-group-sm">
                <label for="">Keyword</label>
                <input type="text" name="title" class="form-control mx-2"> 
            </div>
            <div class="input-group input-group-sm">
                <label for="">Employment Type</label>
                <select name="type" id=""  class="custom-select mx-2">
                    <option value="">Select</option>
                    <option value="fulltime">fulltime</option>
                    <option value="parttime">part-time</option>
                    <option value="casual">casual</option>                            
                </select>
            </div>                
            <div class="input-group input-group-sm">
                <label for="">category</label>                
                <select name="category" class="custom-select mx-2" id="">
                        <option value="">Select</option>
                    @foreach (App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group input-group-sm">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control mx-2"> 
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-outline-success btn-sm">Search</button>
            </div>                   
        </div>
    </form>

        <table class="table">
            <thead>
                <th>logo</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>
                        {{-- <img src="{{ asset('avatar/man.jpg')}}" width="80" alt=""> --}}
                        <img src="{{ asset('uploads/logo')}}/{{$job->company->logo}}" width="80" alt="">
                    </td>
                    <td>position: {{ $job->position }}
                        <br>
                        <i class="far fa-clock" aria-hidden="true"></i>
                        {{$job->type}}
                    </td>
                    <td><i class="fa fa-map-marker-alt" aria-hidden="true"></i> Address: {{ $job->address }}</td>
                    <td><i class="fas fa-globe-americas"></i> Date: {{$job->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{ route('jobs.show',[$job->id, $job->slug]) }}">
                            <button class="btn btn-success btn-sm">Apply</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>
</div>
@endsection
<style>
    .fa, .far, .fas{ 
        color:#4183D7;
    }
</style>