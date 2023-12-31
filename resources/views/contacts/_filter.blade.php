<form>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    @includeUnless(empty($companies), 'contacts._company-selection')

                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search" id="txt_search"
                            value="{{ request()->query('search') }}" aria-label="Search..."
                            aria-describedby="button-addon2">
                        <div class="input-group-append">

                            @if (request()->filled('search') || request()->filled('company_id'))
                                <button class="btn btn-outline-secondary mx-0" type="button"
                                    onclick="document.getElementById('txt_search').value = '', document.getElementById('drp_company').selectedIndex = '', this.form.submit()">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </button>
                            @endif

                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                <i class="bi bi-search-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
