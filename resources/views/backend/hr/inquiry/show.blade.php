@extends('layouts.master')

@section('content')
<div class="grids">
    <div class="panel panel-widget forms-panel">
        <div class="forms">         
            <div class="row">
                <div class="col-md-12"> 
                    <a href="{{url('dashboard/inquiries')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>  
                    @include('common.flash-message')
                    <hr>
                    <p style="text-align: center; font-size: 22px;">{{$title}}</p>
                    <hr>
                </div>

                <div class="col-md-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                    <tr>
                        <th style="width: 150px">Date</th>
                        <td>{{$inquiry->created_at}}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{$inquiry->name}}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{$inquiry->email}}</td>
                    </tr>

                    <tr>
                        <th>Subject</th>
                        <td>{{$inquiry->subject}}</td>
                    </tr>                   

                    <tr>
                        <th>Message</th>
                        <td>{{$inquiry->message}}</td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection