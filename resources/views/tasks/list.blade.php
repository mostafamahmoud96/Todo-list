@extends('layouts.app')

@section('content')
    <div class="p-3">
        <a class="btn btn-primary float-right m-5" href="{{ route('user.task.create') }}">Create Task </a>
    </div>


    <table class="table table-bordered table-striped" >
        @if(count($tasks)>0)
        <tr  class="table-info">
            <th class="text-center" style="width: 180px">Name</th>
            <th class="text-center">Description</th>
            <th style="width: 130px">Status Of Task</th>

            <th style="width: 100px">Created</th>
            <th style="width: 90px">Change Status</th>
            <th width="100px">Action</th>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td class="text-center">{{ $task->description }}</td>
                <td class="font-weight-bold text-center " id="status_{{$task->id}}">{{ $task->is_active }}</td>
                <td>{{ (new Carbon\Carbon($task->created_at))->diffForHumans() }}</td>
                <td><input class="togglefunction" type="checkbox" @if ($task->getRawOriginal('is_active')) checked @endif
                        id="is_active" name="is_active" value="on" data-toggle="toggle" data-fid="{{ $task->id }}">
                </td>
                <td>

                    <a class="btn btn-primary" href="{{ route('user.task.edit', $task->id) }}">Edit</a>

                </td>

            </tr>
        @endforeach
        @else
        <h1 class="text-center">
            You Don't Tasks Yet...
        </h1>
@endif
    </table>
    <script>
        $('.togglefunction').on('change', function() {
            //send value by ajax to server
            let id = $(this).data('fid');
            $.ajax({
                url: '{{ route('user.change-status') }}',
                type: 'GET',
                data: {
                    id: id
                },
                success: function() {
                    let val = $('#status_'+id).html();

                    if (val == 'Pending') {
                        $('#status_'+id).html('Done');
                    } else {
                        $('#status_'+id).html('Pending');
                    }
                }
            }).done(function(response) {

            }).fail(function(error) {
                //failure
            })
        });
    </script>
@endsection
