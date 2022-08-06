@extends('layouts.app')

@section('content')
    <div class="p-3">
        <a class="btn btn-primary" href="{{ route('user.task.create') }}">Create Task </a>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Status Of Task</th>

            <th>Created</th>
            <th width="200px">Action</th>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->is_active }}</td>
                <td>{{ (new Carbon\Carbon($task->created_at))->diffForHumans() }}</td>
                <td>

                    <a class="btn btn-primary" href="{{ route('user.task.edit', $task->id) }}">Edit</a>

                </td>
                <td><input class="togglefunction" type="checkbox" @if ($task->is_active) checked @endif
                        id="is_active" name="is_active" value="on" data-toggle="toggle" data-fid="{{ $task->id }}">
                </td>

            </tr>
        @endforeach

    </table>
    <!-- Modal -->
     <!-- Modal -->
 <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel"> API CODE </h4>
       </div>
       <div class="modal-body" id="getCode" style="overflow-x: scroll;">
          //ajax success content here.
       </div>
    </div>
   </div>
 </div>

    <script>
        $('.togglefunction').on('change', function() {
            //send value by ajax to server
            $.ajax({
                url: '{{ route('user.change-status') }}',
                type: 'GET',
                data: {
                    id: $(this).data('fid')
                },
                success: function() {
                    console.log("Sssssssssssssssss");
                    $("#getCodeModal").modal("show");
                }
            }).done(function(response) {

            }).fail(function(error) {
                //failure
            })
        });
    </script>
@endsection
