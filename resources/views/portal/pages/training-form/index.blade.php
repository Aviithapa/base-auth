@extends('portal.layout.app')

@section('content')
    <div class="container dashboard-2">
        <div class="grid grid-cols-12 card-gap size-column">
            <div class="col-span-12 xxl:col-span-12 box-col-12 grid-ed-12">
                <div class="grid grid-cols-12 card-gap">
                    <div class="col-span-12">
                        <div class="card">
                            <div class="card-body main-title-box">
                                <div class="common-space gap-2">
                                    <h6 class="f-light">
                                        Welcome to the Nepal Pharmacy Council Training Form
                                    </h6>
                                    <div class="e-common-button flex flex-wrap">
                                        <a class="btn btn-primary text-white flex"
                                            href="{{ route('training-form.create') }}"><i data-feather="plus"></i>Create
                                            New Form</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xxl:col-span-12 box-col-12 ord-xl-iii box-ord-3">
                        <div class="grid grid-cols-12 card-gap heading-space">

                            @forelse ($forms as $form)
                                <div class="col-span-4 xl:col-span-6 sm:col-span-12">
                                    <div class="card">
                                        <div
                                            class="card-header {{ $form->trainingFormApplication->isNotEmpty() ? 'bg-success' : 'bg-info' }}">
                                            <h5 class="txt-light">
                                                {{ $form->name }}

                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0 c-light">
                                            <div class="text-sm text-gray-600 space-y-1">
                                                <p>
                                                    <span class="font-medium text-gray-700">Training Start:</span>
                                                    {{ \Carbon\Carbon::parse($form->training_start_date)->format('d M Y') }}
                                                </p>
                                                <p>
                                                    <span class="font-medium text-gray-700">Form End:</span>
                                                    {{ \Carbon\Carbon::parse($form->form_end_date)->format('d M Y') }}
                                                </p>
                                                <p>
                                                    <span class="font-medium text-gray-700">Created At:</span>
                                                    {{ $form->created_at->format('d M Y') }}
                                                </p>
                                                <p>
                                                    <span class="font-medium text-gray-700">Organized By:</span>
                                                    Nepal Pharmacy Council
                                                </p>
                                                <p class="card-text mb-2"><strong>Filled Applications:</strong>
                                                    {{ $form->training_form_application_count }}</p>

                                            </div>
                                            </p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between align-items-center"
                                            style="display: flex; justify-content: space-between; align-items: center;">
                                            <a href="{{ route('training-form.show', $form->id) }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="View">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <a href="{{ route('training-form.edit', $form->id) }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <form action="{{ route('training-form.destroy', $form->id) }}" method="POST"
                                                style="display:inline-block;"
                                                onsubmit="return confirm('Are you sure you want to delete this form?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <div class="col-span-12 text-center text-gray-500 py-10">
                                    No training forms available.
                                </div>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- footer start-->
@endsection
