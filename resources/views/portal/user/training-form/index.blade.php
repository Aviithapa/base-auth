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

                                            </div>
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="e-common-button flex justify-between items-center">
                                                @if ($form->trainingFormApplication->isNotEmpty() && $form->trainingFormApplication->first()->status === 'approved')
                                                    <p class="text-green-600 flex items-center gap-1">
                                                        ✅ Approved.
                                                    </p>
                                                @else
                                                    <a class="btn {{ $form->trainingFormApplication->isNotEmpty() ? 'btn-success' : 'btn-info' }} text-white"
                                                        href="{{ route('user.training-form.apply', ['training_form' => $form->id]) }}">
                                                        Apply
                                                    </a>
                                                @endif

                                                <a class="btn {{ $form->trainingFormApplication->isNotEmpty() ? 'btn-success' : 'btn-info' }} text-white"
                                                    href="{{ route('user.training-form.show', ['training_form' => $form->id]) }}">
                                                    Show
                                                </a>
                                            </div>
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
