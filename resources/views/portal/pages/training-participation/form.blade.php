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
                                action="{{ route('npc-training-form.store') }}" method="post" novalidate="">
                                @csrf
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip01">First
                                        Name</label><input class="form-control" id="validationTooltip01" type="text"
                                        placeholder="Mark" name="first_name" value="{{ old('first_name') }}" required />
                                    @error('first_name')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip02">Middle
                                        Name</label><input class="form-control" id="validationTooltip02" type="text"
                                        placeholder="Otto" name="middle_name" value="{{ old('middle_name') }}" required />
                                    @error('middle_name')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip02">Last
                                        Name</label><input class="form-control" id="validationTooltip02" type="text"
                                        placeholder="Otto" name="last_name" value="{{ old('last_name') }}" required />
                                    @error('last_name')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip03">Council Registration
                                        Number (NPC No.)</label><input class="form-control" id="validationTooltip03"
                                        type="text" name="registration_number" required="" />
                                    @error('registration_number')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-3 md:col-span-12 position-relative">
                                    <label for="designation" class="form-label">Designation</label>
                                    <select id="designation" name="designation"
                                        class="form-select @error('designation') is-invalid @enderror" required>
                                        <option value="">Select designation</option>
                                        <option value="Pharmacist"
                                            {{ old('designation') == 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                                        <option value="Pharmacy Assistant"
                                            {{ old('designation') == 'Pharmacy Assistant' ? 'selected' : '' }}>Pharmacy
                                            Assistant</option>
                                    </select>
                                    @error('designation')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-3 md:col-span-12 position-relative">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select id="gender" name="gender"
                                        class="form-select @error('gender') is-invalid @enderror" required>
                                        <option value="">Select gender</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Date of
                                        birth</label><input class="form-control" id="validationTooltip05" type="text"
                                        name="dob" required="" />
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Citizenship
                                        Number</label><input class="form-control" id="validationTooltip05" type="text"
                                        name="citizenship_number" required="" />
                                    @error('citizenship_number')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Issued
                                        District</label><input class="form-control" id="validationTooltip05"
                                        type="text" name="issued_district" required="" />
                                    @error('issued_district')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Email</label><input
                                        class="form-control" id="validationTooltip05" type="text" name="email"
                                        required="" />
                                    @error('email')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Contact
                                        Number</label><input class="form-control" id="validationTooltip05" type="text"
                                        required="" name="contact_number" />
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
                                        <option value="Degree" {{ old('qualification') == 'Degree' ? 'selected' : '' }}>
                                            Degree</option>
                                        <option value="Diploma" {{ old('qualification') == 'Diploma' ? 'selected' : '' }}>
                                            Diploma</option>
                                    </select>
                                    @error('qualification')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Institution
                                        Attended</label><input class="form-control" id="validationTooltip05"
                                        type="text" required="" name="institution_attended" />
                                    @error('institution_attended')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-span-4 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Year of
                                        Graduation</label><input class="form-control" id="validationTooltip05"
                                        type="text" required="" name="year_of_graduation" />
                                    @error('year_of_graduation')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-12">
                                    <h5>Current Professional Activity </h5>
                                </div>
                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Current Workplace
                                        Name</label><input class="form-control" id="validationTooltip05" type="text"
                                        required="" name="workplace_name" />
                                    @error('workplace_name')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Workplace
                                        Address</label><input class="form-control" id="validationTooltip05"
                                        type="text" required="" name="workplace_address" />
                                    @error('workplace_address')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label class="form-label" for="validationTooltip05">Position/Designation</label><input
                                        class="form-control" id="validationTooltip05" type="text" required=""
                                        name="position" />
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
                                            {{ old('employment_type') == 'Full time' ? 'selected' : '' }}>Full time
                                        </option>
                                        <option value="Part time"
                                            {{ old('employment_type') == 'Part time' ? 'selected' : '' }}>Part time
                                        </option>
                                        <option value="Volunteer"
                                            {{ old('employment_type') == 'Volunteer' ? 'selected' : '' }}>Volunteer
                                        </option>
                                    </select>
                                    @error('employment_type')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-12 md:col-span-12 position-relative">
                                    <label for="major_roles_and_responsibility" class="form-label">Major Roles and
                                        Responsibility</label>
                                    <textarea id="major_roles_and_responsibility" name="major_roles_and_responsibility" rows="4"
                                        class="form-control @error('major_roles_and_responsibility') is-invalid @enderror" required>{{ old('major_roles_and_responsibility') }}</textarea>
                                    @error('major_roles_and_responsibility')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-12 position-relative">
                                    <h4>Reason for Attending the GPP Training</h4>

                                    <label class="form-label" for="validationTooltip05"> Please explain briefly why you
                                        are participating in the GPP
                                        training.</label>
                                    <textarea id="reason_for_attending" name="reason_for_attending" rows="4"
                                        class="form-control @error('reason_for_attending') is-invalid @enderror" required>{{ old('reason_for_attending') }}</textarea>
                                    @error('reason_for_attending')
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
                                        value="{{ old('declaration_date') }}" required />
                                    @error('declaration_date')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div><br />
                                <div class="col-span-6 md:col-span-12 position-relative">
                                    <label for="declaration_place" class="form-label">Declaration Place</label>
                                    <input id="declaration_place" name="declaration_place" type="text"
                                        placeholder="Place"
                                        class="form-control @error('declaration_place') is-invalid @enderror"
                                        value="{{ old('declaration_place') }}" required />
                                    @error('declaration_place')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-12">
                                    <button class="btn btn-primary text-white" type="submit">
                                        Submit form
                                    </button>
                                </div>
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
