@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.bookings.title')</h3>
{!! Form::open(['method' => 'POST', 'route' => ['admin.bookings.store']]) !!}

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_create')
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('customer_id', trans('quickadmin.bookings.fields.customer').'', ['class' => 'control-label']) !!}
                {!! Form::select('customer_id', $customers, old('customer_id'), ['class' => 'form-control select2']) !!}
                <p class="help-block"></p>
                @if($errors->has('customer_id'))
                <p class="help-block">
                    {{ $errors->first('customer_id') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('room_id', trans('quickadmin.bookings.fields.room').'', ['class' => 'control-label']) !!}
                {!! Form::select('room_id', $rooms, old('room_id'), ['class' => 'form-control select2']) !!}
                <p class="help-block"></p>
                @if($errors->has('room_id'))
                <p class="help-block">
                    {{ $errors->first('room_id') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('time_from', trans('quickadmin.bookings.fields.time-from').'*', ['class' => 'control-label']) !!}
                {!! Form::text('time_from', old('time_from'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('time_from'))
                <p class="help-block">
                    {{ $errors->first('time_from') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('time_to', trans('quickadmin.bookings.fields.time-to').'*', ['class' => 'control-label']) !!}
                {!! Form::text('time_to', old('time_to'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('time_to'))
                <p class="help-block">
                    {{ $errors->first('time_to') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('additional_information', trans('quickadmin.bookings.fields.additional-information').'*', ['class' => 'control-label']) !!}
                {!! Form::textarea('additional_information', old('additional_information'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('additional_information'))
                <p class="help-block">
                    {{ $errors->first('additional_information') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('parking', trans('quickadmin.bookings.fields.parking').'*', ['class' => 'control-label']) !!}
                {{ Form::radio('parking', 1) }} Yes
                {{ Form::radio('parking', 0) }} No
                <!-- {!! Form::radio('parking', old('parking'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    {!! Form::radio('parking', old('parking'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!} -->
                <p class="help-block"></p>
                @if($errors->has('parking'))
                <p class="help-block">
                    {{ $errors->first('parking') }}
                </p>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12 form-group">
                <!-- CreditCard','Cash','Debit','Voucher','EFTPOS' -->
                <label name="status" for="status">Status*</label>
                <select class="form-control" id="status" name="status">
                    <option value="1">None</option>
                    <option value="2">CheckedIn</option>
                    <option value="3">CheckedOut</option>
                
                </select>
            </div>
        </div>

    </div>
</div>

{!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@stop

@section('javascript')
@parent
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $('.datetimepicker').datetimepicker({
        format: "YYYY-MM-DD HH:mm"
    });
</script>
@stop