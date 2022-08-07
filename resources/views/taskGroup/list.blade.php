@extends('layouts.app')

@section('content')
<div class="p-3">

    <a class="btn btn-primary float-right m-5" href="{{route('user.taskGroup.create')}}">Create New Task Group</a>
</div>


    <table class="table table-bordered table-striped ">
        @if (count($task_groups)>0)

        <tr class="table-info">
            <th class="text-center" style="width: 100px">Name</th>
            <th  class="text-center"width="100px">Action</th>
        </tr>
        @foreach ($task_groups as $product)
            <tr>
                <td class="text-center">{{ $product->name }}</td>
                <td class="d-flex justify-content-center">
                    <form action="{{ route('user.taskGroup.destroy', $product->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{route('user.taskGroup.edit',$product->id)}}">Edit</a>
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @else
          <h1 class="text-center">
            You Don't Task Groups Yet...
        </h1>
        @endif
    </table>
@endsection
