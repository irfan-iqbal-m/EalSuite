<div class="mb-3">
    <label class="form-label">Customer <span class="text-danger">*</span></label>
    <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror" required>
        <option value="">Select Customer</option>
        @foreach ($customers as $customer)
            <option value="{{ $customer->id }}"
                {{ old('customer_id', $invoice->customer_id ?? '') == $customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
        @endforeach
    </select>
    @error('customer_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Date</label>
    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
        value="{{ old('date', $invoice->date ?? now()->toDateString()) }}">
    @error('date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Amount</label>
    <input type="number" step="0.01" name="amount" class="form-control @error('amount') is-invalid @enderror"
        value="{{ old('amount', $invoice->amount ?? '') }}">
    @error('amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select @error('status') is-invalid @enderror">
        @foreach (['Unpaid', 'Paid', 'Cancelled'] as $status)
            <option value="{{ $status }}"
                {{ old('status', $invoice->status ?? 'Unpaid') == $status ? 'selected' : '' }}>
                {{ $status }}
            </option>
        @endforeach
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
