@extends('layouts.master')

@section('content')
<div class="grids">
    <div class="panel panel-widget forms-panel">
        <div class="forms">         
            <div class="row">
                <div class="col-md-12"> 
                    @include('common.flash-message')
                    <hr>
                    <p style="text-align: center; font-size: 22px;">{{$title}}</p>
                    <hr>
                </div>

                <div class="col-md-12">
                    <table class="table datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width:30px ">No</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th style="text-align: center; width: 55px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @foreach($inquiryes as $inquiry)
                            <tr style="background: {{$inquiry->read_at == null ? 'gainsboro':'white'}}">
                                <td>{{++$i}}</td>
                                <td>
                                    {{$inquiry->name}}
                                </td>
                                <td>
                                    {{$inquiry->subject}}
                                </td>
                                <td>
                                    {{$inquiry->created_at->diffForHumans()}}
                                </td>
                                <td>
                                    <a href="{{route('inquiries.show', $inquiry)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>

                                    <form action="{{route('inquiries.destroy', $inquiry)}}" method="POST" style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm_user('delete')"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>    
                            @endforeach                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection