@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                   <ul>
                       <li>{{$tolet->location}}</li>
                       <li>{{$tolet->description}}</li>
                       <li>{{$tolet->area}}</li>
                       <li>{{$tolet->bed}}</li>
                       <li>{{$tolet->bath}}</li>
                       <li>{{$tolet->balcony}}</li>
                       <li>{{$tolet->price}}</li>
                   </ul>
                   <ul>
                       @foreach ($images as $image)
                        <li><img src="{{$image->image_url}}" alt="image"></li>
                       @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
