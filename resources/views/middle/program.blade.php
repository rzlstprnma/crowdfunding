@extends('layouts.middle-layouts')

@section('title')
    Daftar Program
@endsection

<style>
.la-times{
  color: #F6554D;
  font-weight: bold !important;
  font-size: 16px !important;
}

.la-check{
  color: #B5D43C;
  font-weight: bold !important;
  font-size: 16px !important;
}

.lol{
  color: #09264A;
}

.tbh a{
  color: #09264A !important;
}

table {border-collapse:collapse; table-layout:fixed; width:310px;}
table td {border:solid 1px #fab; width:100px; word-wrap:break-word;}

</style>

@section('content')
    
<div class="box">
        <div class="box-header">
          <h3>Daftar Program</h3>

          
          <div class="toolbox">Search : <form class="searchbox"><input type="text" name=""></form></div>
          <h3 class="tbh ml-2"><a href="{{route('program.create')}}"><i class="la la-plus-circle"></i>Tambah Program</a></h3>
        </div>
        <div class="box-body pt-0 px-0 responsive">
          <table class="table table--bordered">
            <col width="7%">
            <col width="26%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
            <col width="7%">
            <thead>
              <tr>
                <th>Dipublish</th>
                <th>Judul Program</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Donasi Terkumpul</th>
                <th>Target Donasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($programs as $program)
              <tr>
                  @if ($program->isPublished == 0)
                    <td><i class="la la-times"></i></td> 
                  @else
                    <td><i class="la la-check"></i></td>
                  @endif
                
                <td>{{$program->title}}</td>
                <td>{{$program->start_time}}</td>
                <td>{{$program->time_is_up}}</td>
                <td>{{$program->donation_collected}}</td>
                <td>{{$program->donation_target}}</td>
                <td>
                <a class="btn btn-secondary" href="{{route('program.edit', $program->id)}}"><i class="lol la la-pencil"></i></a><br><br>
                <button type="submit" class="btn btn-secondary"><i class="la la-arrow-circle-up"></i></button><br><br>
                <form action="{{route('program.destroy', $program->id)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                <button class="btn btn-secondary"><i class="la la-trash"></i></button>
                </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

          <div class="pagination-wrapper clearfix">
                <div class="data-info float--left"><small class="helper-text">Showing <b>5 </b><span>data of </span><b>100</b></small></div>
                <ul class="pagination float--right">
                  <li class="pagination-item"> <a class="active">1</a></li>
                  <li class="pagination-item"> <a>2</a></li>
                  <li class="pagination-item"> <a>3</a></li>
                  <li class="pagination-item"> <a>Next</a></li>
                </ul>
              </div>

        </div>

      </div>

@endsection