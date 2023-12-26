@extends('errors.layout')
@section('message', 'سرور در حال بروز رسانی می باشد!')
@section('exception', $exception->getMessage())
