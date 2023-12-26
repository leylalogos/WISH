@extends('errors.layout')
@section('message', 'خطا از سمت سرور می باشد!')
@section('exception', $exception->getMessage())
