<form method="POST"
      action="/groups/{{ $group->id }}/members">

    @csrf

    <select
        name="user_id"
        class="form-control">

        @foreach($users as $user)

            <option value="{{ $user->id }}">
                {{ $user->name }}
            </option>

        @endforeach

    </select>

    <input
        type="date"
        name="joined_at"
        class="form-control mt-2">

    <button class="btn btn-success mt-2">

        Add Member

    </button>

</form>
<x-app-layout>

<div class="container mt-4">

    <h2>{{ $group->name }}</h2>

    <p>{{ $group->description }}</p>

    <hr>

    <h4>Add Member</h4>

    <form method="POST"
          action="/groups/{{ $group->id }}/members">

        @csrf

        <select
            name="user_id"
            class="form-control">

            @foreach($users as $user)

                <option value="{{ $user->id }}">
                    {{ $user->name }}
                </option>

            @endforeach

        </select>

        <input
            type="date"
            name="joined_at"
            class="form-control mt-2">

        <button
            class="btn btn-success mt-2">

            Add Member

        </button>

    </form>

    <hr>

    <h4>Members</h4>

    <table class="table">

        <thead>
            <tr>
                <th>Name</th>
                <th>Joined</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @foreach($group->members as $member)

            <tr>

                <td>
                    {{ $member->user->name }}
                </td>

                <td>
                    {{ $member->joined_at }}
                </td>

                <td>
                    {{ $member->status }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</x-app-layout>