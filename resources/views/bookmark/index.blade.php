@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-responsive-sm">
        <thead>
            <tr>
                <th>Location</th>
                <th>Area</th>
                <th>Bed</th>
                <th>Bath</th>
                <th>Balcony</th>
                <th>Price</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($tolets as $tolet)
                    <tr>
                        <td>{{$tolet->location}}</td>
                        <td>{{$tolet->area}}</td>
                        <td>{{$tolet->bed}}</td>
                        <td>{{$tolet->bath}}</td>
                        <td>{{$tolet->balcony}}</td>
                        <td>{{$tolet->price}}</td>
                        <td class="text-center">
                            <a class="btn btn-success btn-sm" href="{{ url('/tolet/'.$tolet->id) }}"> Detail</a>
                            <form class="table-from-inline" method="POST" action="{{ route('bookmark.remove', ['tolet' => $tolet->id]) }}" aria-label="{{ __('Delete') }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</div>
@endsection