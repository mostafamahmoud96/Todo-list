@extends('layouts.app')

@section('content')
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
                    <form action="{{route('taskGroup.delete',$product->id)}}" method="POST">

                        <a class="btn btn-primary" href="">Edit</a>
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
