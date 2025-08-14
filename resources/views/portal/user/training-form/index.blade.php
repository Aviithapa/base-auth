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
                                        <div class="card-header {{ $form->latestApplication() ? ($form->isRejected() ? 'bg-danger' : 'bg-success') : 'bg-info' }}"
                                            <h5 class="txt-light">{{ $form->name }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-sm text-gray-600 space-y-1">
                                                <p><span class="font-medium">Training Start:</span>
                                                    {{ $form->training_start_date }}</p>
                                                <p><span class="font-medium">Form End:</span>
                                                    {{ $form->form_end_date }}</p>
                                                <p><span class="font-medium">Created At:</span>
                                                    {{ $form->created_at->format('d M Y') }}</p>
                                                <p><span class="font-medium">Organized By:</span> Nepal Pharmacy Council</p>
                                            </div>

                                            @if ($form->isRejected())
                                                <p class="text-white p-2 flex items-center gap-1 bg-danger mt-5">
                                                    Application is rejected due to: {{ $form->remarks() }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="card-footer">
                                            <div class="e-common-button flex justify-between items-center">
                                                @if ($form->isApproved())
                                                    <p class="text-green-600 flex items-center gap-1">✅ Approved.</p>
                                                @else
                                                    <a class="btn {{ $form->latestApplication() ? 'btn-success' : 'btn-info' }} text-white"
                                                        href="{{ route('user.training-form.apply', ['training_form' => $form->id]) }}">
                                                        {{ $form->isRejected() ? 'Reapply' : ($form->isPending() ? 'Continue' : 'Apply') }}
                                                    </a>
                                                @endif

                                                @if ($form->latestApplication())
                                                    <a class="btn {{ $form->latestApplication() ? 'btn-success' : 'btn-info' }} text-white"
                                                        href="{{ route('user.training-form.show', ['training_form' => $form->id]) }}">
                                                        Show
                                                    </a>
                                                @endif
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
