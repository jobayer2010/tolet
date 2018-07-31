@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('tolet.update', ['id' => $tolet->id]) }}" aria-label="{{ __('Update') }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="location" class="col-sm-4 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{$tolet->location}}" required autofocus>

                                @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                            <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" cols="30" rows="7" required autofocus>{{$tolet->description}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area" class="col-sm-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                                <input id="area" type="number" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{$tolet->area}}" required autofocus>

                                @if ($errors->has('area'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bed" class="col-sm-4 col-form-label text-md-right">{{ __('Bed') }}</label>

                            <div class="col-md-6">
                                <input id="bed" type="number" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="bed" value="{{$tolet->bed}}" required autofocus>

                                @if ($errors->has('bed'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bed') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="balcony" class="col-sm-4 col-form-label text-md-right">{{ __('Balcony') }}</label>

                            <div class="col-md-6">
                                <input id="balcony" type="number" class="form-control{{ $errors->has('balcony') ? ' is-invalid' : '' }}" name="balcony" value="{{$tolet->balcony}}" required autofocus>

                                @if ($errors->has('balcony'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('balcony') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bath" class="col-sm-4 col-form-label text-md-right">{{ __('Bath') }}</label>

                            <div class="col-md-6">
                                <input id="bath" type="number" class="form-control{{ $errors->has('bath') ? ' is-invalid' : '' }}" name="bath" value="{{$tolet->bath}}" required autofocus>

                                @if ($errors->has('bath'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bath') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{$tolet->price}}" required autofocus>
                                    <input type="checkbox" name="isNegotiable" {{ old('isNegotiable') ? 'checked' : '' }}> {{ __('Negotiable') }}
                
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <label for="image" class="col-sm-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input  type="file" multiple class="form-control" name="images[]" required>
                            </div>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                              <strong>Whoops!</strong> There were some problems with your input.<br><br>
                              <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                            </div>
                            @endif
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Tolet') }}
                                </button>
                            </div>
                        </div>

                    </form>

                    <div class="form-group row">
                            @foreach ($images as $image)
                            <div class="m-1">
                                <form method="POST" action="{{ route('tolet.image', ['id' => $image->id, 'pid' => $tolet->id]) }}" aria-label="{{ __('Update') }}" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <img src="{{$image->image_url}}" class="rounded mx-auto" alt="image">
                                </form>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
