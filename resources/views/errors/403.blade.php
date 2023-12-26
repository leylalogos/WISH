@extends('errors.layout')
@section('message', 'شما اجازه دسترسی به این صفحه را ندارید!')
@section('exception', $exception->getMessage())
