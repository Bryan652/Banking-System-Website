<div>
    @foreach ($account as $acc)
        <div>
            {{ $acc->user_id }}
            {{ $acc->account_number }}
            {{ $acc->account_type }}
            {{ $acc->balance }}
            {{ $acc->status }}
        </div>
    @endforeach
</div>
