@extends('portal.layout.app')

@section('content')
    <div class="container w-full">
        <div class="page-title">
            <div class="grid grid-cols-12 mx-2 items-center">
                <div class="col-span-6 sm:col-span-12">
                    <h3>Edit Training Participation Form</h3>
                </div>
                <div class="col-span-6 sm:col-span-12">
                    <ol class="breadcrumb flex gap-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}"><svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Edit Training Participation Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="validation-forms">
        <div class="container-fluid">
            <div class="grid grid-cols-12 card-gap">
                <div class="col-span-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Form Details</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('training-form.update', $trainingForm->id) }}" method="POST"
                                class="grid grid-cols-12 gap-4">
                                @csrf
                                @method('PUT') {{-- Laravel requires this for PUT requests --}}

                                <div class="col-span-6">
                                    <label for="name" class="form-label">Form Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $trainingForm->name) }}" required>
                                    @error('name')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="training_start_date" class="form-label">Training Start Date</label>
                                    <input type="date" name="training_start_date" id="training_start_date"
                                        class="form-control @error('training_start_date') is-invalid @enderror"
                                        value="{{ old('training_start_date', $trainingForm->training_start_date) }}">
                                    @error('training_start_date')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="form_end_date" class="form-label">Form End Date</label>
                                    <input type="date" name="form_end_date" id="form_end_date"
                                        class="form-control @error('form_end_date') is-invalid @enderror"
                                        value="{{ old('form_end_date', $trainingForm->form_end_date) }}">
                                    @error('form_end_date')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-12">
                                    <label for="description" class="form-label">Description (Optional)</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $trainingForm->description) }}</textarea>
                                    @error('description')
                                        <div class="text-red-600 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-12">
                                    <button type="submit" class="btn btn-primary text-white">Update Form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
