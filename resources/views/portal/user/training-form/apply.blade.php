@extends('portal.layout.app')

@section('content')
    <div class="container w-full">
        <div class="page-title">
            <div class="grid grid-cols-12 mx-2 items-center">
                <div class="col-span-6 sm:col-span-12">
                    <h3>Nepal Pharmacy Council Training Participation Form</h3>
                </div>
                <div class="col-span-6 sm:col-span-12">
                    <ol class="breadcrumb flex gap-2">
                        <li class="breadcrumb-item">
                            <a href="index.html"><svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Training Participation Portal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="validation-forms">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="grid grid-cols-12 card-gap">
                <div class="col-span-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Personal Details</h5>
                        </div>
                        <div class="card-body">
                            <form class="grid grid-cols-12 gap-3 needs-validation custom-input"
                                action="{{ isset($formApplication) ? route('user.training-form.update', $formApplication->id) : route('user.training-form.store') }}"
                                method="POST" novalidate enctype="multipart/form-data">
                                @csrf

                                {{-- If updating, spoof the PUT method --}}
                                @if (isset($formApplication))
                                    @method('PUT')
                                @endif

                                <input type="hidden" name="npc_training_form_id" value="{{ $trainingForm->id }}">

                                <div class="col-span-12 md:col-span-12 position-relative">



                                    <h5>Profile Photo</h5>
                                    @if (isset($formApplication) && $formApplication->hasMedia('profile_photo'))
                                        <div class="mb-3">
                                            <img src="{{ $formApplication->getFirstMediaUrl('profile_photo') }}"
                                                alt="Profile Photo" class="img-thumbnail" style="max-width: 200px;">
                                        </div>
                                    @endif
                                    <input type="file" name="profile_photo" class="form-control"
                                        {{ isset($formApplication) ? '' : 'required' }}>
                                    @error('profile_photo')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip01">First
                                        Name</label><input class="form-control" id="validationTooltip01" type="text"
                                        placeholder="Mark" name="first_name"
                                        value="{{ old('first_name', $profile->first_name ?? '') }}" required />
                                    @error('first_name')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip02">Middle
                                        Name</label><input class="form-control" id="validationTooltip02" type="text"
                                        placeholder="Otto" name="middle_name"
                                        value="{{ old('middle_name', $profile->middle_name ?? '') }}" required />
                                    @error('middle_name')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip02">Last
                                        Name</label><input class="form-control" id="validationTooltip02" type="text"
                                        placeholder="Otto" name="last_name"
                                        value="{{ old('last_name', $profile->last_name ?? '') }}" required />
                                    @error('last_name')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip03">Council Registration
                                        Number (NPC No.)</label><input class="form-control" id="validationTooltip03"
                                        type="text" name="registration_number"
                                        value="{{ old('registration_number', $profile->registration_number ?? '') }}"
                                        required="" />
                                    @error('registration_number')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                @php
                                    $selectedDesignation =
                                        old('designation') ?? (auth()->user()->profile->designation ?? '');
                                @endphp

                                <div class="col-span-3 md:col-span-12 position-relative">
                                    <label for="designation" class="form-label">Designation</label>
                                    <select id="designation" name="designation"
                                        class="form-select @error('designation') is-invalid @enderror" required>
                                        <option value="">Select designation</option>
                                        <option value="Pharmacist"
                                            {{ $selectedDesignation == 'Pharmacist' ? 'selected' : '' }}>
                                            Pharmacist
                                        </option>
                                        <option value="Pharmacy Assistant"
                                            {{ $selectedDesignation == 'Pharmacy Assistant' ? 'selected' : '' }}>Pharmacy
                                            Assistant</option>
                                    </select>
                                    @error('designation')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                @php
                                    $selectedGender = old('gender') ?? (auth()->user()->profile->gender ?? '');
                                @endphp

                                <div class="col-span-3 md:col-span-12 position-relative">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select id="gender" name="gender"
                                        class="form-select @error('gender') is-invalid @enderror" required>
                                        <option value="">Select gender</option>
                                        <option value="Male" {{ $selectedGender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ $selectedGender == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="Other" {{ $selectedGender == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="dob">Date of birth</label>
                                    <input class="form-control" id="dob" type="text" name="dob" required
                                        value="{{ old('dob') ?? ($profile->dob ?? '') }}" />
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="citizenship_number">Citizenship Number</label>
                                    <input class="form-control" id="citizenship_number" type="text"
                                        name="citizenship_number" required
                                        value="{{ old('citizenship_number') ?? ($profile->citizenship_number ?? '') }}" />
                                    @error('citizenship_number')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="issued_district">Issued District</label>
                                    <input class="form-control" id="issued_district" type="text"
                                        name="issued_district" required
                                        value="{{ old('issued_district') ?? ($profile->issued_district ?? '') }}" />
                                    @error('issued_district')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Email</label><input
                                        class="form-control" id="validationTooltip05" type="text" name="email"
                                        required="" value="{{ old('email') ?? ($profile->email ?? '') }}" />
                                    @error('email')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="contact_number">Contact Number</label>
                                    <input class="form-control" id="contact_number" type="text" name="contact_number"
                                        required
                                        value="{{ old('contact_number') ?? ($profile->contact_number ?? '') }}" />
                                    @error('contact_number')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-12">
                                    <h5>Educational Qualification </h5>
                                </div>

                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label for="qualification" class="form-label">Qualification</label>
                                    <select id="qualification" name="qualification"
                                        class="form-select @error('qualification') is-invalid @enderror" required>
                                        <option value="">Select qualification</option>
                                        <option value="Degree"
                                            {{ (old('qualification') ?? ($profile->qualification ?? '')) == 'Degree' ? 'selected' : '' }}>
                                            Degree</option>
                                        <option value="Diploma"
                                            {{ (old('qualification') ?? ($profile->qualification ?? '')) == 'Diploma' ? 'selected' : '' }}>
                                            Diploma</option>
                                    </select>
                                    @error('qualification')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="institution_attended">Institution Attended</label>
                                    <input class="form-control" id="institution_attended" type="text"
                                        name="institution_attended" required
                                        value="{{ old('institution_attended') ?? ($profile->institution_attended ?? '') }}" />
                                    @error('institution_attended')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="graduation_year">Year of Graduation</label>
                                    <input class="form-control" id="graduation_year" type="text"
                                        name="graduation_year" required
                                        value="{{ old('graduation_year') ?? ($profile->graduation_year ?? '') }}" />
                                    @error('graduation_year')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-12">
                                    <h5>Current Professional Activity</h5>
                                </div>

                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="workplace_name">Current Workplace Name</label>
                                    <input class="form-control" id="workplace_name" type="text" name="workplace_name"
                                        required
                                        value="{{ old('workplace_name') ?? ($profile->workplace_name ?? '') }}" />
                                    @error('workplace_name')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="workplace_address">Workplace Address</label>
                                    <input class="form-control" id="workplace_address" type="text"
                                        name="workplace_address" required
                                        value="{{ old('workplace_address') ?? ($profile->workplace_address ?? '') }}" />
                                    @error('workplace_address')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="position">Position/Designation</label>
                                    <input class="form-control" id="position" type="text" name="position" required
                                        value="{{ old('position') ?? ($profile->position ?? '') }}" />
                                    @error('position')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label for="employment_type" class="form-label">Employment Type</label>
                                    <select id="employment_type" name="employment_type"
                                        class="form-select @error('employment_type') is-invalid @enderror" required>
                                        <option value="">Select employment type</option>
                                        <option value="Full time"
                                            {{ (old('employment_type') ?? ($profile->employment_type ?? '')) == 'Full time' ? 'selected' : '' }}>
                                            Full time</option>
                                        <option value="Part time"
                                            {{ (old('employment_type') ?? ($profile->employment_type ?? '')) == 'Part time' ? 'selected' : '' }}>
                                            Part time</option>
                                        <option value="Volunteer"
                                            {{ (old('employment_type') ?? ($profile->employment_type ?? '')) == 'Volunteer' ? 'selected' : '' }}>
                                            Volunteer</option>
                                    </select>
                                    @error('employment_type')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-12 position-relative">
                                    <label for="major_roles_and_responsibility" class="form-label">Major Roles and
                                        Responsibility</label>
                                    <textarea id="roles" name="roles" rows="4" required
                                        class="form-control @error('roles') is-invalid @enderror">{{ old('roles') ?? ($profile->roles ?? '') }}</textarea>
                                    @error('roles')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-12 position-relative">
                                    <h4>Reason for Attending the GPP Training</h4>

                                    <label class="form-label" for="reason_for_attending">
                                        Please explain briefly why you are participating in the GPP training.
                                    </label>
                                    <textarea id="reason_for_attending" name="training_reason" rows="4" required
                                        class="form-control @error('training_reason') is-invalid @enderror">{{ old('training_reason') ?? ($profile->training_reason ?? '') }}</textarea>
                                    @error('training_reason')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-span-12">
                                    <h5>Declaration</h5>
                                    I hereby declare that the information provided above is true, complete, and
                                    correct to the best of my knowledge. I am aware that any false or misleading
                                    information may result in disqualification from the training or future
                                    regulatory actions by the Nepal Pharmacy Council. <br />

                                    I am participating in this training to enhance my professional competency
                                    and
                                    improve the quality of pharmacy services I provide in line with Good
                                    Pharmacy
                                    Practice standards. <br />


                                </div>
                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label for="declaration_date" class="form-label">Declaration Date</label>
                                    <input id="declaration_date" name="declaration_date" type="date"
                                        class="form-control @error('declaration_date') is-invalid @enderror"
                                        value="{{ old('declaration_date', $formApplication->declaration_date ?? '') }}"
                                        required />
                                    @error('declaration_date')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div><br />
                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label for="declaration_place" class="form-label">Declaration Place</label>
                                    <input id="declaration_place" name="declaration_place" type="text"
                                        placeholder="Place"
                                        class="form-control @error('declaration_place') is-invalid @enderror"
                                        value="{{ old('declaration_place', $formApplication->declaration_place ?? '') }}"
                                        required />
                                    @error('declaration_place')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="col-span-12 md:col-span-12 position-relative">
                                    <h5>Certificate (Front)</h5>

                                    @if (isset($formApplication) && $formApplication->hasMedia('certificate_front'))
                                        <div class="mb-3">
                                            <img src="{{ $formApplication->getFirstMediaUrl('certificate_front') }}"
                                                alt="Certificate Front" class="img-thumbnail" style="max-width: 200px;">
                                        </div>
                                    @endif
                                    <input type="file" name="certificate_front" class="form-control"
                                        {{ isset($formApplication) ? '' : 'required' }}>
                                    @error('certificate_front')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror

                                </div>



                                @if (isset($formApplication) && $formApplication->status === 'approved')
                                    <h5>Your application has been approved</h5>
                                @else
                                    <div class="col-span-12">
                                        <button class="btn btn-primary text-white" type="submit">
                                            {{ isset($formApplication) ? 'Update form' : 'Submit form' }}
                                        </button>
                                    </div>
                                @endif

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
@endsection
