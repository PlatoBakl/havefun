@extends('layouts.admin')

@section('title')
    Главная
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Добавление события
                            </h2>
                        </div>
                        <div class="body">
                            <form method="POST" action="{{route("locations.store")}}">
                                {{ csrf_field() }}
                                <input type="hidden" id="latitude" class="form-control" name="latitude" value="@if(old('latitude')) @else 49.9984 @endif" >
                                <input type="hidden" id="longitude" class="form-control" name="longitude" value="@if(old('latitude')) @else 36.2429 @endif" >
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Название места</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Название">
                                            </div>
                                            @if($errors->has('name'))
                                                <label id="name" class="error" for="surname">{{$errors->first('name')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Описание места</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="3" class="form-control no-resize" name="description" placeholder="Описание события" > {{old('description')}}</textarea>
                                            </div>
                                            @if($errors->has('description'))
                                                <label id="description" class="error" for="surname">{{$errors->first('description')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Адрес места</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Адрес места">
                                            </div>
                                            @if($errors->has('address'))
                                                <label id="address" class="error" for="address">{{$errors->first('address')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Время работы</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="working_hours" value="{{old('working_hours')}}" placeholder="Время работы">
                                            </div>
                                            @if($errors->has('working_hours'))
                                                <label id="working_hours" class="error" for="surname">{{$errors->first('working_hours')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Время работы</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div style="height: 350px;" id="map"></div>
                                                @if($errors->has('latitude'))
                                                    <label id="latitude" class="error" for="latitude">{{$errors->first('latitude')}}</label>
                                                @endif
                                                @if($errors->has('longitude'))
                                                    <label id="longitude" class="error" for="longitude">{{$errors->first('longitude')}}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                                        <input type="submit" class="btn bg-red waves-effect" name="" value="Сохранить">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Striped Rows -->
        </div>
    </section>
@endsection

@section('script')
    <script>
        var map;
        function initMap() {
            @if(old('latitude') && old('longitude'))
                var myLatLng = {lat: {{old('latitude')}}, lng:  {{old('longitude')}}};
            @else
                var myLatLng = {lat: 49.9984, lng:  36.2429};
            @endif

            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 16
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                draggable:true,
                animation: google.maps.Animation.DROP,
            });

            google.maps.event.addListener(marker, 'dragend', function(marker){
                var latLng = marker.latLng;
                currentLatitude = latLng.lat();
                currentLongitude = latLng.lng();
                $("#latitude").val(currentLatitude);
                $("#longitude").val(currentLongitude);

                console.log(currentLatitude,currentLongitude);
            });

        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTwCzxFDlUj_FOQB5Im471unBCxF5gNnk&callback=initMap&language=ru&region=UA"
            async defer></script>
@endsection