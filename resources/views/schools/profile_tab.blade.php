<div class="row">
    <div class="col-12 col-sm-12 col-md-12 mb-2">
        <form method="POST" action="{{ route('school.manage') }}" enctype="multipart/form-data" autocomplete="off">
            @csrf

            <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4">
                <img src="{{ InitS::getImage($school->logo, 'logo') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload Logo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input type="file" name="logo" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <div>Allowed JPG, JPEG or PNG. Max size of 2MB</div>
                </div>
            </div>

            <div class="row g-6">
                <div class="col-md-6">
                    <label class="form-label" for="name">School Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $school->name ?? '' }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="email">School Email <small><i>(Official)</i></small></label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $school->email ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="phone">School Phone <span class="text-danger">*</span></label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $school->phone ?? '' }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="district">District</label>
                    <input type="text" id="district" name="district" class="form-control" value="{{ $school->district ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="city">City</label>
                    <input type="text" id="city" name="city" class="form-control" value="{{ $school->city ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $school->address ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="website">Website</label>
                    <input type="text" id="website" name="website" class="form-control" value="{{ $school->website ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="registeration_year">Registeration Year</label>
                    <input type="text" id="registeration_year" class="form-control" value="{{ $school->established_year ?? '' }}" disabled>
                </div>

                <div class="d-flex align-item-start gap-2">
                    <a href="{{ route('schools.index') }}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
