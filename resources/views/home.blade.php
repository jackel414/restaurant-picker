@extends('layouts.app')

@section('content')
<div class="container text-center">
    <form class="form-inline">
        <div class="row">
            <div class="col-sm-6 text-right">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" class="form-control">
                        <option value="">Select a Category</option>
                        <option value="newamerican">American (New)</option>
                        <option value="tradamerican">American (Traditional)</option>
                        <option value="asianfusion">Asian Fusion</option>
                        <option value="brazilian">Brazilian</option>
                        <option value="burmese">Burmese</option>
                        <option value="chinese">Chinese</option>
                        <option value="italian">Italian</option>
                        <option value="japanese">Japanese</option>
                        <option value="korean">Korean</option>
                        <option value="mexican">Mexican</option>
                        <option value="pizza">Pizza</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 text-left">
                <div class="form-group">
                    <label for="zip">Zip Code</label>
                    <input type="text" class="form-control" id="zip" placeholder="Zip Code">
                </div>
            </div>
        </div>
        <div class="row">
            &nbsp;
        </div>
        <div class="row">
            <button type="submit" class="btn btn-default" id="submit_button">Submit</button>
        </div>
    </form>

    <div id="page_loading"><img src="ajax-loader.gif" height="60" width="60"/></div>
    <div class="text-center" id="results_container">
        <p id="yelp_result" class="collapse lead"></p>
    </div>
</div>
@endsection