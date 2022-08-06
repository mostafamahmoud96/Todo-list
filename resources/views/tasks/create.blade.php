@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form action="{{ route('user.task.store') }}" method="POST">
                            @csrf
                            <div class="card-header">{{ __('Create Task') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="task-name">{{ __('Name') }}</label>
                                            <input value="" class="form-control" name="name" type="text"
                                                id="task-name" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="task-textarea">{{ __('Description') }}</label>
                                            <textarea class="form-control" name="description" rows="5" id="task-textarea"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="task-textarea">{{ __('Note') }}</label>
                                            <textarea class="form-control" name="note" rows="5" id="task-textarea"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Task Group (Optional)</label>
                                            <select name="task_group_id" class="form-control">
                                                <option value=""> -- Select One --</option>
                                                @foreach ($task_groups as $task_group)
                                                    <option value="{{ $task_group->id }}">
                                                        {{ $task_group->name }}
                                                    </option>
                                                @endforeach
                                                        </select>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Task') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
