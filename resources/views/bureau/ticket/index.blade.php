@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        @include('bureau.ticket.table.ticket')
    </div>
@endsection