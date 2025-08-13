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

                    <div class="card w-full col-span-12 xxl:col-span-12 box-col-12 ord-xl-iii box-ord-3">
                        <div class="mb-3 mt-3 ml-5 text-end">
                            <a href="{{ route('training-form.export', $trainingForm->id) }}" class="btn btn-info">
                                Export to Excel
                            </a>
                        </div>

                        <div class="col-span-12 xxl:col-span-12 box-col-12 ord-xl-iii box-ord-3">
                            <div class="card heading-space">
                                <div class="card-header card-no-border">
                                    <div class="header-top" style="height: 20px;">

                                    </div>
                                </div>
                                <div class="card-body px-0 pt-0 training-applicant-form">
                                    <div class="training-applicant-form-table overflow-x-auto custom-scrollbar">
                                        <table class="table" id="training-applicant-form">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Actions</th>
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
                                                @foreach ($trainingForm->trainingFormApplication as $form)
                                                    @php $loopIndex = $loop->iteration; @endphp

                                                    <tr>
                                                        <td>{{ $loopIndex }}</td>
                                                        <td>
                                                            @if ($form->status === 'approved')
                                                                <a href="{{ route('training-forms.download', ['id' => $trainingForm->id, 'user_id' => $form->user_id]) }}"
                                                                    class="me-1" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="View">
                                                                    <i data-feather="download"></i>
                                                                </a>
                                                            @else
                                                                <form
                                                                    action="{{ route('training-form.approve', $form->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    <button class="btn btn-success btn-sm text-white"
                                                                        type="submit"
                                                                        onclick="return confirm('Approve this application?')">
                                                                        Approve
                                                                    </button>
                                                                </form>

                                                                <form
                                                                    action="{{ route('training-form.reject', $form->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm text-white"
                                                                        type="submit"
                                                                        onclick="return confirm('Reject this application?')">
                                                                        Reject
                                                                    </button>
                                                                </form>
                                                            @endif
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
    </div>
    <!-- footer start-->
@endsection
