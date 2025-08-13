@extends('portal.layout.app')

@section('content')
    <div class="container">
        <div class="grid grid-cols-12 card-gap size-column">
            <div class="col-span-12">
                <div class="grid grid-cols-12 card-gap">
                    <div class="col-span-12">
                        <div class="card">
                            <div class="card-body main-title-box">
                                <div class="common-space gap-2">
                                    <h6 class="f-light">
                                        Welcome to the Nepal Pharmacy Council Training Form
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Left Column: User Info + Change Password -->
                    <div class="col-span-6 md:col-span-6 sm:col-span-12">
                        <!-- User Basic Info -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Edit User Details</h5>
                            </div>
                            <div class="card-body">

                                @if ($errors->hasBag('updateUser'))
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->updateUser->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('user.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                                            class="form-control @error('name', 'updateUser') is-invalid @enderror" required>
                                        @error('name', 'updateUser')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}"
                                            class="form-control @error('email', 'updateUser') is-invalid @enderror"
                                            required>
                                        @error('email', 'updateUser')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update User</button>
                                </form>
                            </div>
                        </div>

                        <!-- Change Password -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Change Password</h5>
                            </div>
                            <div class="card-body">

                                @if (session('changePassword'))
                                    <div class="alert alert-danger">
                                        {{ session('changePassword') }}
                                    </div>
                                @endif

                                <form action="{{ route('user.change.password') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" name="current_password"
                                            class="form-control @error('current_password', 'changePassword') is-invalid @enderror"
                                            required>
                                        @error('current_password', 'changePassword')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password', 'changePassword') is-invalid @enderror"
                                            required>
                                        @error('password', 'changePassword')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Confirm New Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-warning">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: User Profile -->
                    <div class="col-span-6 md:col-span-6 sm:col-span-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit User Profile</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.update.profile') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="first_name"
                                            value="{{ old('first_name', $profile->first_name ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Middle Name</label>
                                        <input type="text" name="middle_name"
                                            value="{{ old('middle_name', $profile->middle_name ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name"
                                            value="{{ old('last_name', $profile->last_name ?? '') }}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Registration Number</label>
                                        <input type="text" name="registration_number"
                                            value="{{ old('registration_number', $profile->registration_number ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Designation</label>
                                        <input type="text" name="designation"
                                            value="{{ old('designation', $profile->designation ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="">Select</option>
                                            <option value="male"
                                                {{ old('gender', $profile->gender ?? '') == 'male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="female"
                                                {{ old('gender', $profile->gender ?? '') == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" value="{{ old('dob', $profile->dob ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Citizenship Number</label>
                                        <input type="text" name="citizenship_number"
                                            value="{{ old('citizenship_number', $profile->citizenship_number ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Issued District</label>
                                        <input type="text" name="issued_district"
                                            value="{{ old('issued_district', $profile->issued_district ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Contact Number</label>
                                        <input type="text" name="contact_number"
                                            value="{{ old('contact_number', $profile->contact_number ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Qualification</label>
                                        <input type="text" name="qualification"
                                            value="{{ old('qualification', $profile->qualification ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Institution Attended</label>
                                        <input type="text" name="institution_attended"
                                            value="{{ old('institution_attended', $profile->institution_attended ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Graduation Year</label>
                                        <input type="text" name="graduation_year"
                                            value="{{ old('graduation_year', $profile->graduation_year ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Workplace Name</label>
                                        <input type="text" name="workplace_name"
                                            value="{{ old('workplace_name', $profile->workplace_name ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Workplace Address</label>
                                        <input type="text" name="workplace_address"
                                            value="{{ old('workplace_address', $profile->workplace_address ?? '') }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Position</label>
                                        <input type="text" name="position"
                                            value="{{ old('position', $profile->position ?? '') }}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Employment Type</label>
                                        <input type="text" name="employment_type"
                                            value="{{ old('employment_type', $profile->employment_type ?? '') }}"
                                            class="form-control">
                                    </div>


                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div> <!-- grid end -->
            </div>
        </div>
    </div>
@endsection
