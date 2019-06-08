@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
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
                                @if (empty(Auth::user()->company->logo))
                                    <img src="{{ asset('avatar/man.jpg')}}" width="100" style="width:100%">
                                @else
                                    <img src="{{ asset('uploads/logo')}}/{{ Auth::user()->company->logo }}" width="100" style="width:50%">    
                                @endif                                
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
                                <a href="{{ route('job.edit', [$job->id]) }}">
                                    <button class="btn btn-dark">Edit</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
