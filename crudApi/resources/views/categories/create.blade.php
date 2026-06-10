@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Status</label>

                    <select name="is_active" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                </div>

                <button class="btn btn-success">
                    Save
                </button>

                <a href="{{url('categories.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>
    </div>
@endsection
