<x-app-layout>

<div class="container mt-4">

    <h2>Record Settlement</h2>

    <form method="POST"
          action="{{ route('settlements.store',$group->id) }}">

        @csrf

        <label>Payer</label>

        <select
            name="payer_id"
            class="form-control mb-3">

            @foreach($group->members as $member)

                <option value="{{ $member->user->id }}">
                    {{ $member->user->name }}
                </option>

            @endforeach

        </select>

        <label>Receiver</label>

        <select
            name="receiver_id"
            class="form-control mb-3">

            @foreach($group->members as $member)

                <option value="{{ $member->user->id }}">
                    {{ $member->user->name }}
                </option>

            @endforeach

        </select>

        <input
            type="number"
            step="0.01"
            name="amount"
            placeholder="Amount"
            class="form-control mb-3">

        <textarea
            name="notes"
            class="form-control mb-3"
            placeholder="Notes">
        </textarea>

        <button
            class="btn btn-success">

            Save Settlement

        </button>

    </form>

</div>

</x-app-layout>