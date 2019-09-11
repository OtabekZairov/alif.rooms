@extends('layouts.app')
<div class="bcg">
@section('content')
  <form action="{{ route('room.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">Upload File Example</div>
  
                <div class="card-body">
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>

                    @endif

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
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="image" id="exampleInputFile" aria-describedby="fileHelp" value="{{ $room->avatar }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                    </div>        
                </div>
             </div>
           </div>
         </div>
       </div>
       <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
       <div class="form-group">
          <label for="formGroupExampleInput" placeholder="Input Name"></label>
          <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Example input" value="{{ $room->title }}">
       </div>
       <div class="form-group">
          <label for="exampleFormControlTextarea1" ></label>
          <textarea class="form-control" name="textarea" id="exampleFormControlTextarea" placeholder="Description..." rows="3">{{ $room->description }}</textarea>
       </div>
        <div>
          <button type="submit" class="btn btn-primary">
              Сохранить
          </button>
        </div>
      </div>
     </div>
    </div>
   </div>
  </form>
@endsection