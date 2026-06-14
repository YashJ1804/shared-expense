<x-app-layout>

    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Groups</h2>

            <a href="{{ route('groups.create') }}"
               class="btn btn-success">
                Create Group
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created By</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($groups as $group)

                    <tr>
                        <td>{{ $group->id }}</td>

                        <td>{{ $group->name }}</td>

                        <td>{{ $group->description }}</td>

                        <td>{{ $group->created_by }}</td>

                        <td>

                            <a href="{{ route('groups.show', $group->id) }}"
                               class="btn btn-info btn-sm">
                                View
                            </a>

                            <a href="{{ route('groups.edit', $group->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('groups.destroy', $group->id) }}"
                                  method="POST"
                                  style="display:inline-block">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>

                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            No Groups Found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>