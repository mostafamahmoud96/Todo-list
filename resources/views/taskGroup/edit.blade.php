@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form
                            action="{{route('user.taskGroup.update', $task_group) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">{{ __('Edit Category') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="task-name">{{ __('Name') }}</label>
                                            <input value="{{$task_group->name}}" class="form-control" name="name" type="text" id="task-name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Category') }}</button>
                            </div>
                        </form>
                    </div>

                    <form action="{{ route('user.taskGroup.destroy', $task_group) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('{{ __('Are you sure?') }}')"> {{ __('Delete This Task Group') }}</button>
                    </form>

                       <hr/>

                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i> {{ __('List of Tasks') }}</div>
                       <div class="card">
                        <form action="{{ route('user.task.store',$task_group) }}" method="POST">
                            @csrf
                            <div class="card-header">{{ __('New Task') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="task-name">{{ __('Name') }}</label>
                                            <input  class="form-control" name="name" type="text" id="task-name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="task-textarea">{{ __('Description') }}</label>
                                            <textarea class="form-control" name="description" rows="5" id="task-textarea"></textarea>
                                        </div>   <div class="form-group">
                                            <label for="task-textarea">{{ __('Note') }}</label>
                                            <textarea class="form-control" name="note" rows="5" id="task-textarea"></textarea>
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
    </div>

@endsection

@section('scripts')
@endsection

