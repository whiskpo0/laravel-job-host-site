@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach ($applicants as $applicant)
                                    
                <div class="card-header"><a href="{{ route('jobs.show',[$applicant->id, $applicant->slug]) }}">{{ $applicant->title }}</a></div>

                <div class="card-body"> 
                    @foreach ($applicant->users as $user)
                        
                    @endforeach               
                    <table class="table">
                      
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        
                        <tbody>
                            <tr>                            
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->profile->address}}</td>
                            <td>{{ $user->profile->gender}}</td>
                            <td>{{ $user->profile->bio}}</td>
                            <td>{{ $user->profile->experience}}</td>
                            <td><a href="{{Storage::url($user->profile->resume)}}">Resume</a></td>
                            <td><a href="{{Storage::url($user->profile->cover_letter)}}">Cover</a></td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
