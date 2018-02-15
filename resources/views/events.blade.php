@extends('includes.master')

@section('title') {{ $seo_info[0]->meta_title }} @stop
@section('keywords'){{ $seo_info[0]->meta_keyword }} @stop
@section('description'){{ $seo_info[0]->meta_descr }} @stop

@section('content')

<h1>Events Page</h1>

@stop 

