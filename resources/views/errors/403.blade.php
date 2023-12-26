@extends('errors.layout')

@section('image-src', url('frontend/images/error.png'))
@section('message', 'شما اجازه دسترسی به این صفحه را ندارید!')
@section('exception', $exception->getMessage())
