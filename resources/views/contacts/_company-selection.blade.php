<select class="form-select" id="drp_company" name="company_id" onchange="this.form.submit()">
    <option value="" selected>
        All Companies
    </option>
    @foreach ($companies as $key => $company)
        <option value="{{ $key }}" @if ($key == request()->query('company_id')) selected @endif>
            {{ $company }}
        </option>
    @endforeach
</select>
