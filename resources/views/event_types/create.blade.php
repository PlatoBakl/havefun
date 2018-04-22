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
                            <form method="POST" action="{{route("events.store")}}">
                                {{ csrf_field() }}
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Название события</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Название">
                                            </div>
                                            @if($errors->has('title'))
                                                <label id="title" class="error" for="surname">{{$errors->first('title')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Описание события</label>
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
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-right">
                                        <label>Место проведения</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick selectpicker" name="location_id">
                                                    <option value="">Не выбранно</option>
                                                    @foreach($locations as $location)
                                                        <option @if($location->id == old('location_id')) selected @endif value="{{$location->id}}">{{$location->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->has('location_id'))
                                                <label id="location_id" class="error" for="surname">{{$errors->first('location_id')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-right">
                                        <label>Тип события</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick selectpicker" name="type_id">
                                                    <option value="">Не выбранно</option>
                                                    @foreach($event_types as $event_type)
                                                        <option @if($event_type->id == old('event_type')) selected @endif value="{{$event_type->id}}">{{$event_type->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->has('type_id'))
                                                <label id="type_id" class="error" for="surname">{{$errors->first('type_id')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Начало события</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control datepicker" placeholder="Начало события"  name="start" value="{{old('start')}}" ata-dtp="dtp_uTYYg">
                                            </div>
                                            @if($errors->has('start'))
                                                <label id="start" class="error" for="surname">{{$errors->first('start')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Конец события</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control datepicker" placeholder="Конец события"  name="end" value="{{old('end')}}" ata-dtp="dtp_uTYYg">
                                            </div>
                                            @if($errors->has('end'))
                                                <label id="end" class="error" for="surname">{{$errors->first('end')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Ссылка на событие</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="url" value="{{old('url')}}" placeholder="Ссылка">
                                            </div>
                                            @if($errors->has('url'))
                                                <label id="url" class="error" for="surname">{{$errors->first('url')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Ссылка на билет</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="ticket_url" value="{{old('ticket_url')}}" placeholder="Ссылка на билет">
                                            </div>
                                            @if($errors->has('ticket_url'))
                                                <label id="ticket_url" class="error" for="ticket_url">{{$errors->first('ticket_url')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <label>Цена</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="start_cost" value="{{old('start_cost')}}" placeholder="Цена от">
                                            </div>
                                            @if($errors->has('start_cost'))
                                                <label id="start_cost" class="error" for="start_cost">{{$errors->first('start_cost')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="end_cost" value="{{old('end_cost')}}" placeholder="Цена до">
                                            </div>
                                            @if($errors->has('end_cost'))
                                                <label id="end_cost" class="error" for="end_cost">{{$errors->first('end_cost')}}</label>
                                            @endif
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
        $('.selectpicker').selectpicker({
//            style: 'btn-info',
            size: 4
        });


        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            clearButton: true,
            weekStart: 1
        });
    </script>
@endsection