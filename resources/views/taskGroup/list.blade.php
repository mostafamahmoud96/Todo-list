@extends('layouts.app')

@section('content')
<div class="p-3">

    <a class="btn btn-primary" href="{{route('user.taskGroup.create')}}">Create New Task Group</a>
</div>


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($task_groups as $product)
            <tr>
                <?php $i = 1; ?>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <form action="{{ route('user.taskGroup.destroy', $product->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{route('user.taskGroup.edit',$product->id)}}">Edit</a>
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
