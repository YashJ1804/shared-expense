<x-app-layout>

<div class="container mt-4">

    <h2>Create Group</h2>

    <form action="{{ route('groups.store') }}" method="POST">

        @csrf

        <input
            type="text"
            name="name"
            placeholder="Group Name"
            class="form-control mb-3">

        <textarea
            name="description"
            class="form-control mb-3"
            placeholder="Description">
        </textarea>

        <button class="btn btn-primary">
            Create Group
        </button>

    </form>

</div>

</x-app-layout>