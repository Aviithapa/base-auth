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
                                        Welcome to the Nepal Pharmacy Council Training Application Forms
                                    </h6>
                                    <div class="e-common-button flex flex-wrap">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Upload Supporting Document</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('training-form.document.upload', $trainingForm->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="document" class="form-label">Select Document (PDF, DOCX)</label>
                                        <input type="file" name="document" id="document"
                                            class="form-control @error('document') is-invalid @enderror" required>
                                        @error('document')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-info">Upload</button>
                                </form>

                                <hr class="my-4">

                                <h6 class="mt-4">Uploaded Documents:</h6>
                                <ul class="list-group">
                                    @foreach ($trainingForm->getMedia('training-documents') as $media)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->file_name }}</a>
                                            <form action="{{ route('training-form.document.delete', $media->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this document?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger text-white">Delete</button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 xxl:col-span-12 box-col-12 ord-xl-iii box-ord-3">

                        <div class="grid grid-cols-12 card-gap heading-space">
                            <div class="col-span-4 sm:col-span-12">
                                <a
                                    href="{{ route('training-form.show', ['training_form' => $trainingForm->id, 'status' => 'pending']) }}">
                                    <div class="card small-widget cursor-pointer">
                                        <div class="card-body warning">
                                            <span class="f-light">New Applications</span>
                                            <div class="flex items-end gap-1">
                                                <h4 class="counter">{{ $counts['pending'] }}</h4>
                                            </div>
                                            <div class="bg-gradient">
                                                <svg class="stroke-icon svg-fill">
                                                    <use href="../assets/svg/icon-sprite.svg#customers"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-span-4 sm:col-span-12">
                                <a
                                    href="{{ route('training-form.show', ['training_form' => $trainingForm->id, 'status' => 'approved']) }}">
                                    <div class="card small-widget cursor-pointer">
                                        <div class="card-body secondary">
                                            <span class="f-light">Approved Applications</span>
                                            <div class="flex items-end gap-1">
                                                <h4 class="counter">{{ $counts['approved'] }}</h4>
                                            </div>
                                            <div class="bg-gradient">
                                                <svg class="stroke-icon svg-fill">
                                                    <use href="../assets/svg/icon-sprite.svg#sale"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-span-4 sm:col-span-12">
                                <a
                                    href="{{ route('training-form.show', ['training_form' => $trainingForm->id, 'status' => 'rejected']) }}">
                                    <div class="card small-widget cursor-pointer">
                                        <div class="card-body success">
                                            <span class="f-light">Rejected Applications</span>
                                            <div class="flex items-end gap-1">
                                                <h4 class="counter">{{ $counts['rejected'] }}</h4>
                                            </div>
                                            <div class="bg-gradient">
                                                <svg class="stroke-icon svg-fill">
                                                    <use href="../assets/svg/icon-sprite.svg#profit"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-span-12 xxl:col-span-12 box-col-12 ord-xl-iii box-ord-3">
                        <div class="card heading-space">
                            <div class="card-header card-no-border">
                                <div class="mb-3 mt-3 ml-5 text-end">
                                    <a href="{{ route('training-form.export', $trainingForm->id) }}" class="btn btn-info">
                                        Export to Excel
                                    </a>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0 training-applicant-form">
                                <div class="training-applicant-form-table overflow-x-auto custom-scrollbar">
                                    <table class="table table-auto whitespace-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Actions</th>
                                                <th>Generate Certificate</th>
                                                <th>Full Name</th>
                                                <th>Registration Number</th>
                                                <th>Designation</th>
                                                <th>Gender</th>
                                                <th>Date of Birth</th>
                                                <th>Citizenship No.</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Position</th>
                                                <th>Status</th>
                                                <th>Applied At</th>
                                                <th>Training Form</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($applications as $form)
                                                @php $loopIndex = $loop->iteration; @endphp

                                                <tr>
                                                    <td>{{ $loopIndex }}</td>
                                                    <td class="flex gap-4 items-center">
                                                        <a href="{{ route('training-forms.download', ['id' => $trainingForm->id, 'user_id' => $form->user_id]) }}"
                                                            title="Download">
                                                            <i data-feather="download" class="text-blue-500"></i>
                                                        </a>


                                                        <i data-feather="check" style="color: green;" data-bs-toggle="modal"
                                                            data-bs-target="#approveModal{{ $form->id }}"></i>



                                                        {{-- Approve Modal --}}
                                                        <div class="modal fade" id="approveModal{{ $form->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="approveModalLabel{{ $form->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <form
                                                                    action="{{ route('training-form.approve', $form->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="approveModalLabel{{ $form->id }}">
                                                                                Approve Application,
                                                                                {{ $form->name }}</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p class="mb-2">Are you sure you want to
                                                                                approve this application?</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary text-white"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger text-white">Approve</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <i data-feather="x-circle" class="text-red-500"
                                                            style="color: red;" data-bs-toggle="modal"
                                                            data-bs-target="#rejectModal{{ $form->id }}"></i>


                                                        {{-- Reject Modal --}}
                                                        <div class="modal fade" id="rejectModal{{ $form->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="rejectModalLabel{{ $form->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <form
                                                                    action="{{ route('training-form.reject', $form->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="rejectModalLabel{{ $form->id }}">
                                                                                Reject Application</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <label for="remarks{{ $form->id }}"
                                                                                class="form-label">Remarks</label>
                                                                            <textarea name="remarks" id="remarks{{ $form->id }}" class="form-control" rows="3"
                                                                                placeholder="Enter reason for rejection" required></textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Reject</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <a href="{{ route('training-forms.certificate', ['id' => $trainingForm->id, 'user_id' => $form->user_id]) }}"
                                                            title="Download" class="btn btn-primary text-white">
                                                            Generate Certificate
                                                        </a>
                                                    </td>

                                                    <td>{{ $form->first_name, ' ', $form->middle_name, ' ', $form->last_name }}
                                                    </td>
                                                    <td>{{ $form->registration_number ?? 'N/A' }}</td>
                                                    <td>{{ $form->designation }}</td>
                                                    <td>{{ $form->gender }}</td>

                                                    <td>{{ $form->dob }}</td>
                                                    <td>{{ $form->citizenship_number }}</td>
                                                    <td>{{ $form->contact_number }}</td>
                                                    <td>{{ $form->email }}</td>
                                                    <td>{{ $form->position }}</td>
                                                    <td>
                                                        @if ($form->status === 'approved')
                                                            <span class="badge bg-success">Approved</span>
                                                        @elseif ($form->status === 'rejected')
                                                            <span class="badge bg-danger">Rejected</span>
                                                        @else
                                                            <span class="badge bg-warning">Pending</span>
                                                        @endif
                                                    </td>

                                                    <td>{{ $form->created_at->format('d M Y') }}</td>
                                                    <td>{{ $form->npcTrainingForm->name ?? 'N/A' }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- footer start-->
@endsection
