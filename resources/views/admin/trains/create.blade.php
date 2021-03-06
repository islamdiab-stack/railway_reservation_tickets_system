@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.add_train') }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.add_train') }}
@endsection

{{-- Styles --}}
@section('styles')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <style>
        .select2-container .select2-selection--single {
            height: auto;
        }

    </style>
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('trains.index')}}">{{ trans('site.trains') }}</a></li>
    <li class="breadcrumb-item">{{ trans('site.add_train') }}<li>
@endsection

{{-- Content --}}
@section('content')
<section class="trains-section section">
    <div class="row">
        <div class="col-md-10 m-auto">

            <!-- form container -->
            <div class="form-container">
                <div class="row">
                    <div class="col-md-7 p-0">
                        <!-- Stations form -->
                        <div class="trains-form section-form">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ trans('site.add_train') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{route('trains.store')}}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <!-- Name -->
                                            <div class="form-group">
                                                <label for="name">{{ trans('site.name') }}</label>
                                                <input type="text" class="form-control" id="name"
                                                    name="name" placeholder="{{trans('site.enter_name_train')}}"
                                                    required>
                                            </div>

                                            <!-- Train Type -->
                                            <div class="form-group">
                                                <label for="type_id">{{ trans('site.train_type') }}</label>
                                                <!-- All types -->
                                                <select class="form-control select2 searchable" name="type_id"
                                                    id="type_id" required>
                                                    <option value="0" >{{trans('site.all_types')}}</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Train Type / Seats Count -->
                                            <div class="form-group">
                                                <div class="row">

                                                    <!-- Seats available -->
                                                    <div class="col">
                                                        <label for="seats_available">{{ trans('site.seats_available') }}</label>
                                                        <input type="number" class="form-control" id="seats_available"
                                                            name="seats_count" placeholder="{{trans('site.enter_seats_available_train')}}"
                                                            required>
                                                    </div>
                                                    <!-- End of Seats available -->

                                                    <!-- Train price -->
                                                    <div class="col">
                                                        <label for="price">{{ trans('site.train_price') }}</label>
                                                        <input type="number" class="form-control" id="price"
                                                            name="price" placeholder="{{trans('site.enter_train_price')}}"
                                                            required>
                                                    </div>
                                                    <!-- End of Train price -->

                                                </div>
                                            </div>

                                            <!-- Depature Station / Time -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="depature_station">{{ trans('site.depature_station') }}</label>
                                                        <!-- All stations -->
                                                        <select class="form-control select2 searchable" name="depature_station_id"
                                                            id="depature_station" required>
                                                            <option value="" >{{trans('site.all_stations')}}</option>
                                                            @foreach ($stations as $station)
                                                                <option value="{{$station->id}}">{{$station->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="depature_at">{{ trans('site.depature_at') }}</label>
                                                        <input class="form-control" type="datetime-local" id="depature_at"
                                                            name="depature_at" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Arrival Station / Time -->
                                            <div class="form-group mb-0">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="arrival_station">{{ trans('site.arrival_station') }}</label>
                                                        <!-- All stations -->
                                                        <select class="form-control select2 searchable" name="arrival_station_id"
                                                            id="arrival_station" required>
                                                            <option value="" >{{trans('site.all_stations')}}</option>
                                                            @foreach ($stations as $station)
                                                                <option value="{{$station->id}}" >{{$station->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="arrival_at">{{ trans('site.arrival_at') }}</label>
                                                        <input class="form-control" type="datetime-local" id="arrival_at"
                                                            name="arrival_at" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <!-- Card Footer -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-add btn-crayons">
                                                {{ trans('site.add') }}
                                            </button>
                                        </div>
                                        <!-- End of Card Footer -->
                                    </form>

                                </div>
                        <!-- /.card -->
                        </div>
                        <!-- End of Stations form -->
                    </div>
                    <div class="col-md-5 p-0">
                        <!-- Stations Info -->
                        <div class="station-info section-info">
                            <div class="card">
                                <div class="card-body"></div>
                            </div>
                        </div>
                        <!-- End of Stations Info -->
                    </div>
                </div>
            </div>
            <!-- End of form container -->


        </div>
    </div>
</section>
@endsection

@section('scripts')
<!-- Select 2 -->
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection
