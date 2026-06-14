@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Categories</h4>

            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                Add Category
            </a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="80">ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Is Active</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>

                            <td>
                                {{ $category->is_active ? 'Active' : 'In-Active' }}
                            </td>

                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}">
                                    Edit
                                </a>

                                |

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-link p-0"
                                        onclick="return confirm('Delete this category?')">
                                        Delete
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                No Data Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
