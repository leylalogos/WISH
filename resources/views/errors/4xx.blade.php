@extends('errors.layout')
@section('message', 'خطا از سمت کاربر می باشد!')
@section('exception', $exception->getMessage())
