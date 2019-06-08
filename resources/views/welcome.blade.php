@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <search-component></search-component>
        </div>
        <br>
        <br>
        <h1>Recent Jobs</h1>
        <table class="table">

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
    </div>
    <div>
        <a href="{{ route('alljobs') }}">
            <button class="btn btn-success btn-lg" style="width: 100%">Browse all jobs</button>
        </a>
    </div>
    <br><br>
    <h1>Featured Companies</h1>
</div>

    <div class="container">
        <div class="row">
            @foreach ($companies as $company)  
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">                    
                    <img src="{{ asset('uploads/logo')}}/{{$company->logo}}" width="80" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$company->cname}}</h5>
                        <p class="card-text">{{ str_limit($company->description, 20)}}.</p>
                        <a href="{{ route('company.index', [$company->id, $company->slug])}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    .fa, .far, .fas{ 
        color:#4183D7;
    }
</style>