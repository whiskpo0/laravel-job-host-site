@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">

            @if (empty($company->cover_photo))
                <img src="{{ asset('cover/tumblr-image-sizes-banner.png') }}" alt="" style="width:100%;">
            @else
                <img src="{{ asset('uploads/coverphoto') }}/{{$company->cover_photo}}" alt="" style="width:100%;">
            @endif
            
            <div class="company-desc">
                @if(empty($company->logo))
                    <img src="{{ asset('man.jpg') }}" alt="" width="100">    
                @else
                    <img src="{{ asset('uploads/logo')}}/{{$company->logo}}" alt="" width="100">
                @endif                
                
                <p>{{ $company->description }}</p>
                <h1>{{ $company->cname }}</h1>
                <p><strong>Slogan</strong>-{{ $company->slogan}} 
                   Address-{{ $company->address}}
                   Phone-{{ $company->phone }}
                   Website-{{ $company->website }}</p>
            </div>
        </div>
        <table class="table">
                <thead>
                    <th>logo</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($company->jobs as $job)
                    <tr>
                        <td>
                            <img src="{{ asset('avatar/man.jpg')}}" width="80" alt="">
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
                                <button class="btn btn-success btn-sm">Apply</button></td>
                            </a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection
