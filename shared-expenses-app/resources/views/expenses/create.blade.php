<x-app-layout>

<div class="container mt-4">

    <h2>Add Expense</h2>

    <form method="POST"
          action="{{ route('expenses.store',$group->id) }}">

        @csrf

        <input
            type="text"
            name="title"
            class="form-control mb-3"
            placeholder="Expense Title">

        <textarea
            name="description"
            class="form-control mb-3"
            placeholder="Description">
        </textarea>

        <input
            type="number"
            step="0.01"
            name="amount"
            class="form-control mb-3"
            placeholder="Amount">

        <input
            type="date"
            name="expense_date"
            class="form-control mb-3">

        <select
            name="paid_by"
            class="form-control mb-3">

            @foreach($group->members as $member)

                <option
                    value="{{ $member->user->id }}">

                    {{ $member->user->name }}

                </option>

            @endforeach

        </select>

        <select
            name="split_type"
            class="form-control mb-3">

            <option value="equal">
                Equal
            </option>

            <option value="exact">
                Exact
            </option>

            <option value="percentage">
                Percentage
            </option>

        </select>

        <button
            class="btn btn-primary">

            Save Expense

        </button>

    </form>

</div>

</x-app-layout>