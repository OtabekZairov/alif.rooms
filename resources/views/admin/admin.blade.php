
@extends('layouts.app')
<div class="bg">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card" style="background-color: rgba(245, 245, 245, 1); opacity: .8;">
                <div class="card-header">List of Rooms</div>
                
                    <div class="row">
                        @foreach($rooms as $room)
                            <div class="col-md-6">
                                <div class="card-body" >
                                    <div class="card; alert alert-dark" style="width: 20rem; background-color: rgba(245, 245, 245, 1); opacity: 1;">

                                        <img src="{{ $room->avatar }}" class="card-img-top">
                                        
                                        <div class="card-body">
                                            <h4 class="card-title" style="font-family:Blippo, fantasy">Room:{{ $room->title }}</h4>
                                            <h5 class="card-text" style="font-family:Marker Felt, fantasy">Забронировал:{{ $room->booking ? $room->booking->username : '' }}</h5>
                                            @if($room->booking && $room->booking->is_busy)
                                            <h6 class="alert alert-danger" style="font-family:Jazz LET, fantasy" role="alert">
                                                {{ $room->booking ? $room->booking->started_at : '' }} -- До -- {{ $room->booking ? $room->booking->ends_in : ''}}
                                            </h6>
                                            @else
                                            <h6 class="alert alert-success" style="font-family:Jazz LET, fantasy" role="alert">Открыто</h6>
                                            @endif
                                            <p class="card-text" style="font-family:Blippo, fantasy">Админ:{{ $room->description }}</p>
                                            <p class="card-text" style="font-family:Marker Felt, fantasy">Пользователь:{{ $room->booking ? $room->booking->comment : ' ' }}</p>
                                            <form action="{{ route('room.edit', $room->id) }}" method='get'>
                                                @csrf

                                                <input class="btn btn-primary" type="submit" value="edit"/>
                                                
                                            </form>    
                                            <div class="col-md-8"></div>
                                            <div>
                                            <form action="{{route('room.delete', $room->id)}}" method='post'>
                                               @method('delete')
                                                @csrf
                                             <input class="btn btn-danger" type="submit" value="X" />
                                            </form>         
                                           </div>

                                            @if($room->booking && $room->booking->is_busy)
                                            <div class="row">
                                            <form action="{{ route('myroom.free', $room->id) }}" method='post'>
                                                @csrf
                                                
                                                <input class="btn btn-primary" type="submit" value="free"/>

                                            </form><div class="col-md-7"></div>
                                            @else
                                            <form action="{{ route('myroom.edit', $room->id) }}" method='get'>
                                                @csrf
                                                
                                                <input class="btn btn-primary" type="submit" value="Снять"/>

                                            </form>
                                            </div>
                                            @endif                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @if ($loop->iteration % 2 == 0)
                                <div class="row"></div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row justify-content-center"><a href="{{ url('/room') }}"><button class="btn btn-success">Add</button></a></div>
                <div class="row justify-content-center">{{ $rooms->links() }}</div>
                
            </div>
        </div>   
    </div>
</div>
</div>
@endsection




                                           