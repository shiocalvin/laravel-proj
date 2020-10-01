@extends('layouts.overall')


@section('content')



  
<div class="card-header">
    <h1> Memos</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead style="background-color: darkred">
        <tr style="color: white">
          <th>Content</th>
          <th>Written</th>
          <th>Updated</th>
          <th>Written_by</th>
          <th></th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach ($memos as $memo) 
        <tr>
        <td>{{$memo->content}}</td>
        <td>{{$memo->created_at->diffForHumans()}}</td>
        <td>{{$memo->updated_at->diffForHumans()}} </td>
        <td>{{$memo->user->name}}</td>
        <td><a href="{{route('memo.edit',$memo->id)}}" class="btn text-white" style="background-color: darkred">Edit</a></td>
        <td><a href="{{route('memo.destroy',$memo->id)}}" class="btn text-white" style="background-color: darkred">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
       
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

    
@endsection