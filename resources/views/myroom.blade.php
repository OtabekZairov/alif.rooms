@extends('layouts.app')
@section('content')
<form action="{{ route('myroom.update', $room->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <div class="container">
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name"  required>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker'>
                            <input type='time' class="form-control" name="start"  />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker'>
                            <input type='time' class="form-control" name="end" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <label for="exampleFormControlTextarea"></label>
            <textarea class="form-control" id="exampleFormControlTextarea" placeholder="Comments..." rows="3" name="body" ></textarea>
        </div>
        </div>
        <div class="container">
            <div class="row">
            <button class="btn btn-success">save</button>    
            </div>
        </div>
        </div> 
    </div>   
</form>

@endsection