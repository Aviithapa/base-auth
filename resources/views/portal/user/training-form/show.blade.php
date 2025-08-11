@extends('portal.layout.app')

@section('content')
    <div class="container w-full space-y-6">

        <!-- Training Form Details Card -->
        <div class="card">
            <div class="card-header">
                <h5>Training Form Details</h5>
            </div>
            <div class="card-body">
                <table class="table-auto w-full text-left border-collapse border border-gray-200">
                    <tbody>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Name</th>
                            <td class="px-4 py-2">{{ $trainingForm->name }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Training Start Date</th>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($trainingForm->training_start_date)->format('d M Y') }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Form End Date</th>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($trainingForm->form_end_date)->format('d M Y') }}
                            </td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Created At</th>
                            <td class="px-4 py-2">{{ $trainingForm->created_at->format('d M Y') }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Organized By</th>
                            <td class="px-4 py-2">Nepal Pharmacy Council</td>
                        </tr>
                        <!-- Add more training form details as needed -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Uploaded Documents Card -->
        <div class="card">
            <div class="card-header">
                <h5>Uploaded Documents</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($trainingForm->getMedia('training-documents') as $media)
                        @php
                            $ext = strtolower(pathinfo($media->file_name, PATHINFO_EXTENSION));
                        @endphp

                        <div class="col-3 mb-4">
                            <a href="{{ $media->getUrl() }}" target="_blank"
                                class="border rounded p-4 d-flex flex-column align-items-center text-center shadow-sm text-decoration-none text-reset hover-bg-light">
                                {{-- Show image preview if image --}}
                                @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']))
                                    <img src="{{ $media->getUrl() }}" alt="{{ $media->file_name }}"
                                        class="img-fluid rounded mb-2" style="max-height: 120px; object-fit: contain;" />
                                @elseif ($ext === 'pdf')
                                    {{-- PDF Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-2" width="64" height="64"
                                        fill="currentColor" viewBox="0 0 24 24" style="color: #dc3545;">
                                        <path
                                            d="M19 2H9a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7l-5-5zM9 20V4h7v5h5v11H9z" />
                                        <text x="7" y="18" font-size="8" fill="currentColor" font-weight="bold">PDF</text>
                                    </svg>
                                @else
                                    {{-- Generic file icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-2" width="64" height="64"
                                        fill="currentColor" viewBox="0 0 24 24" style="color: #6c757d;">
                                        <path
                                            d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM14 3.5L19.5 9H14z" />
                                    </svg>
                                @endif

                                <span class="text-break">{{ $media->file_name }}</span>
                            </a>
                        </div>
                    @endforeach

                    @if ($trainingForm->getMedia('training-documents')->isEmpty())
                        <p>No documents uploaded yet.</p>
                    @endif
                </div>
            </div>
        </div>




        <!-- User Profile Details Card -->
        <div class="card">
            <div class="card-header">
                <h5>User Profile Details</h5>
            </div>
            <div class="card-body">
                <table class="table-auto w-full text-left border-collapse border border-gray-200">
                    <tbody>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">First Name</th>
                            <td class="px-4 py-2">{{ $profile->first_name ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Middle Name</th>
                            <td class="px-4 py-2">{{ $profile->middle_name ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Last Name</th>
                            <td class="px-4 py-2">{{ $profile->last_name ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Council Registration Number</th>
                            <td class="px-4 py-2">{{ $profile->registration_number ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Designation</th>
                            <td class="px-4 py-2">{{ $profile->designation ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Gender</th>
                            <td class="px-4 py-2">{{ $profile->gender ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Date of Birth</th>
                            <td class="px-4 py-2">{{ $profile->dob ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Email</th>
                            <td class="px-4 py-2">{{ $profile->email ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Contact Number</th>
                            <td class="px-4 py-2">{{ $profile->contact_number ?? '-' }}</td>
                        </tr>
                        <!-- Add more profile fields as needed -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
