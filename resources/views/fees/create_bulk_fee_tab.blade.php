<div class="row">
    <div class="col-12 col-sm-12 col-md-12 mb-4">
        <div class="row g-6">
            <div class="alert alert-primary" role="alert">It will create the fee challen for the {{ InitS::getFeeMonth() }}!</div>
        </div>
        <form method="POST" action="{{ route('fees.store') }}" autocomplete="off">
            @csrf
            <div class="row g-6">
                <div class="col-md-6">
                    <label for="language" class="form-label">Select Fee Type</label>
                    <select name="fee_type_id" id="fee_type_id" class="form-control" required>
                        <option value="">Select One</option>
                        @foreach ($feetypes as $feetype)
                            <option value="{{ $feetype->id }}">{{ $feetype->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="language" class="form-label">Select Class</label>
                    <select name="klass_id" id="klass_id" class="form-control" required>
                        <option value="">Select One</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="language" class="form-label">Select Class</label>
                    {{-- <select name="section_id[]" id="section_id" class="form-control multiple-select" multiple required> --}}
                    <select name="section_id" id="section_id" class="form-control" required>
                        <option value="">Select One</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Due Date</label>
                    <input type="date" class="form-control" name="due_date" name="due_date" required>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="btn btn-primary me-3">Generate</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>
