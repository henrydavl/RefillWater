@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        @include('bureau.reward.table.reward')
    </div>
@endsection