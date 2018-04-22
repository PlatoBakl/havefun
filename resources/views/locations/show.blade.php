@extends('layouts.admin')

@section('title')
    Места
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
                                Места
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{route('locations.edit',['location' => $location])}}" class=" waves-effect waves-block">Редактировать</a></li>
                                        @if($location->allowDelete())<li><a href="#" onclick="event.preventDefault(); document.getElementById('delete-location').submit()" class=" waves-effect waves-block">Удалить</a></li>@endif

                                        <form id="delete-location" action="{{route('locations.destroy',['location' => $location])}}" method="POST" style="display: none;">
                                            <input name="_method" type="hidden" value="DELETE">
                                            {{ csrf_field() }}
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                    <label>Название</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <p>
                                        {{$location->name}}
                                    </p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                    <label>Описание</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <p>
                                        {{$location->description}}
                                    </p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                    <label>Адрес</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <p>
                                        {{$location->address}}
                                    </p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                    <label>Рабочее время</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <p>
                                        {{$location->working_hours}}
                                    </p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                    <label>Расположение</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <div style="height: 300px;max-width:400px" id="map"></div>
                                </div>
                            </div>
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
            var myLatLng = {lat: {{$location->latitude}}, lng:  {{$location->longitude}}};
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 16
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: '{{$location->name}}'
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTwCzxFDlUj_FOQB5Im471unBCxF5gNnk&callback=initMap&language=ru&region=UA"
            async defer></script>
@endsection

