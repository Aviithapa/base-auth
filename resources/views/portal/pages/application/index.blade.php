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
                    <div class="col-span-12 xxl:col-span-12 box-col-12 ord-xl-iii box-ord-3">
                        <div class="card heading-space">
                            <div class="card-header card-no-border">
                                <div class="header-top" style="height: 20px;">
                                    <h5></h5>
                                    <div class="card-header-right-icon">
                                        <div class="dropdown icon-dropdown">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0 training-applicant-form">
                                <div class="training-applicant-form-table overflow-x-auto custom-scrollbar">
                                    <table class="table" id="training-applicant-form">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Registration Number</th>
                                                <th>Designation</th>
                                                <th>Gender</th>
                                                <th>Date of Birth</th>
                                                <th>Citizenship No.</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Position</th>
                                                <th>Applied At</th>
                                                <th>Created By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($forms as $form)
                                                @php $loopIndex = $loop->iteration; @endphp

                                                <tr>
                                                    <td>{{ $loopIndex }}</td>
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

                                                    <td>{{ $form->created_at->format('d M Y') }}</td>
                                                    <td>{{ $form->creator->name ?? 'N/A' }}</td>
                                                    <td>
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('application.edit', $form->id) }}" class="me-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                            <i data-feather="edit"></i>
                                                        </a>

                                                        <!-- Delete Button -->
                                                        <form action="{{ route('application.destroy', $form->id) }}"
                                                            method="POST" style="display:inline-block;"
                                                            onsubmit="return confirm('Are you sure you want to delete this form?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Delete">
                                                                <i data-feather="trash-2"></i>
                                                            </button>
                                                        </form>
                                                    </td>
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
