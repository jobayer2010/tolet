@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($tolets as $tolet)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <ul>
                            <li>{{$tolet->location}}</li>
                            <li>{{$tolet->area}}</li>
                            <li>{{$tolet->bed}}</li>
                            <li>{{$tolet->bath}}</li>
                            <li>{{$tolet->balcony}}</li>
                            <li>{{$tolet->price}}</li>
                        </ul>
                        <form method="POST" action="{{ route('tolet.destroy', ['tolet' => $tolet->id]) }}" aria-label="{{ __('Delete') }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <a class="btn btn-link" href="{{ url('/tolet/'.$tolet->id) }}"> Detail</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
