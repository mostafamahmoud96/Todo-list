@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('user.taskGroup.update', $task_group) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">{{ __('Edit Category') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="task-name">{{ __('Name') }}</label>
                                            <input value="{{ $task_group->name }}" class="form-control" name="name"
                                                type="text" id="task-name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save ') }}</button>
                            </div>
                        </form>
                    </div>

                    <form action="{{ route('user.taskGroup.destroy', $task_group) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('{{ __('Are you sure?') }}')">
                            {{ __('Delete This Task Group') }}</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
