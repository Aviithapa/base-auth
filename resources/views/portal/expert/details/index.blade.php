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

                    <!-- Expert Profile Form -->
                    <div class="col-span-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ $expert ? 'Edit Expert Profile' : 'Create Expert Profile' }}</h5>
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ $expert ? route('expert.expert.update', $expert->id) : route('expert.expert.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if ($expert)
                                        @method('PUT')
                                    @endif

                                    <div class="grid grid-cols-12 gap-4">
                                        <!-- Name of Expert -->
                                        <div class="col-span-6 mb-3">
                                            <label>Name of Expert</label>
                                            <input type="text" name="name_of_expert"
                                                value="{{ old('name_of_expert', $expert->name_of_expert ?? '') }}"
                                                class="form-control @error('name_of_expert') is-invalid @enderror">
                                            @error('name_of_expert')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Qualification -->
                                        <div class="col-span-6 mb-3">
                                            <label>Qualification</label>
                                            <input type="text" name="qualification"
                                                value="{{ old('qualification', $expert->qualification ?? '') }}"
                                                class="form-control @error('qualification') is-invalid @enderror">
                                            @error('qualification')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Affiliation -->
                                        <div class="col-span-6 mb-3">
                                            <label>Affiliation</label>
                                            <input type="text" name="affiliation"
                                                value="{{ old('affiliation', $expert->affiliation ?? '') }}"
                                                class="form-control @error('affiliation') is-invalid @enderror">
                                            @error('affiliation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Experience -->
                                        <div class="col-span-6 mb-3">
                                            <label>Experience (Years)</label>
                                            <input type="number" name="experience"
                                                value="{{ old('experience', $expert->experience ?? '') }}"
                                                class="form-control @error('experience') is-invalid @enderror">
                                            @error('experience')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Key Expertise -->
                                        <div class="col-span-12 mb-3">
                                            <label>Key Expertise</label>
                                            <textarea name="key_expertise" class="form-control @error('key_expertise') is-invalid @enderror" rows="2">{{ old('key_expertise', $expert->key_expertise ?? '') }}</textarea>
                                            @error('key_expertise')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Trainings Attended -->
                                        <div class="col-span-6 mb-3">
                                            <label>Trainings Attended</label>
                                            <textarea name="trainings_attended" class="form-control @error('trainings_attended') is-invalid @enderror"
                                                rows="2">{{ old('trainings_attended', $expert->trainings_attended ?? '') }}</textarea>
                                            @error('trainings_attended')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Trainings Delivered -->
                                        <div class="col-span-6 mb-3">
                                            <label>Trainings Delivered</label>
                                            <textarea name="trainings_delivered" class="form-control @error('trainings_delivered') is-invalid @enderror"
                                                rows="2">{{ old('trainings_delivered', $expert->trainings_delivered ?? '') }}</textarea>
                                            @error('trainings_delivered')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Training Materials (files) -->
                                        <div class="col-span-12 mb-3">
                                            <label>Sample Training Materials</label>
                                            <input type="file" name="training_materials[]" class="form-control" multiple>
                                            @if (!empty($expert->training_materials))
                                                <div class="mt-2">
                                                    <small class="text-muted">Existing Files:</small>
                                                    <ul>
                                                        @foreach ($expert->training_materials as $file)
                                                            <li><a href="{{ asset('storage/' . $file) }}"
                                                                    target="_blank">{{ basename($file) }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Availability -->
                                        <div class="col-span-6 mb-3">
                                            <label>Availability</label>
                                            <select name="availability"
                                                class="form-control @error('availability') is-invalid @enderror">
                                                <option value="1"
                                                    {{ old('availability', $expert->availability ?? '') == 1 ? 'selected' : '' }}>
                                                    Yes</option>
                                                <option value="0"
                                                    {{ old('availability', $expert->availability ?? '') == 0 ? 'selected' : '' }}>
                                                    No</option>
                                            </select>
                                            @error('availability')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Expected Compensation -->
                                        <div class="col-span-6 mb-3">
                                            <label>Expected Compensation</label>
                                            <input type="text" name="expected_compensation"
                                                value="{{ old('expected_compensation', $expert->expected_compensation ?? '') }}"
                                                class="form-control @error('expected_compensation') is-invalid @enderror">
                                            @error('expected_compensation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Letter of Motivation -->
                                        <div class="col-span-12 mb-3">
                                            <label>Letter of Motivation</label>
                                            <textarea name="letter_of_motivation" class="form-control @error('letter_of_motivation') is-invalid @enderror"
                                                rows="4">{{ old('letter_of_motivation', $expert->letter_of_motivation ?? '') }}</textarea>
                                            @error('letter_of_motivation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Preferred Area of Engagement -->
                                        <div class="col-span-12 mb-3">
                                            <label>Preferred Area of Engagement with NPC</label>
                                            <input type="text" name="preferred_area_of_engagement"
                                                value="{{ old('preferred_area_of_engagement', $expert->preferred_area_of_engagement ?? '') }}"
                                                class="form-control @error('preferred_area_of_engagement') is-invalid @enderror">
                                            @error('preferred_area_of_engagement')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success">
                                        {{ $expert ? 'Update Expert Profile' : 'Create Expert Profile' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div> <!-- grid end -->
            </div>
        </div>
    </div>
@endsection
