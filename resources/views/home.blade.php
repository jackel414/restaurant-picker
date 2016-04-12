@extends('layouts.app')

@section('content')
<div class="container text-center">
    <form class="form-inline">
        <div class="row">
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" placeholder="Category">&nbsp;
            </div>
            <div class="form-group">
                <label for="zip">Zip Code</label>
                <input type="text" class="form-control" id="zip" placeholder="Zip Code">
            </div>
        </div>
        <div class="row">
            &nbsp;
        </div>
        <div class="row">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </form>
</div>
@endsection