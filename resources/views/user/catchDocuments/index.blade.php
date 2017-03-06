@extends('admin.layouts.layout')

@section('title')
أضف موظف
@endsection


@section('header')


@endsection




@section('content')


{!! Form::select('bankNameCatch',array('cash'=>'cash','bank'=>'bank'))!!}



@foreach($accountsCatch as $accountCatch)

{{$accountCatch->accountCatchName}}
{{$accountCatch->accountCatchDate}}


@endforeach





@endsection



@section('footer')
@endsection