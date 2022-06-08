@extends('dashboard.layouts.default')

@section('breadcrumbs')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Edit product "{{ $item->name }}"</h1>
    </div>

@stop

@section('content')

    <div class="row">
        <div class="col-6">
            <form method="post" action="{{ route('dashboard.items.update', $item->id) }}">

                @if(session()->has('errors'))
                    <div class="alert alert-danger" role="alert">
                        <button class="close" data-dismiss="alert"></button>
                        {{ session('errors')->first() }}
                    </div>
                @endif

                {{ csrf_field() }}

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Desc</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="description">{{ $item->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="price" value="{{ $item->price }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
