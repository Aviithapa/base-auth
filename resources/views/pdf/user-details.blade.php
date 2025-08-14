<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Training Form PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f5f5f5;
        }

        img {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>

<body>
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
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($trainingForm->form_end_date)->format('d M Y') }}
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
                            <td class="px-4 py-2">{{ $formApplication->first_name ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Middle Name</th>
                            <td class="px-4 py-2">{{ $formApplication->middle_name ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Last Name</th>
                            <td class="px-4 py-2">{{ $formApplication->last_name ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Council Registration Number</th>
                            <td class="px-4 py-2">{{ $formApplication->registration_number ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Designation</th>
                            <td class="px-4 py-2">{{ $formApplication->designation ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Gender</th>
                            <td class="px-4 py-2">{{ $formApplication->gender ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Date of Birth</th>
                            <td class="px-4 py-2">{{ $formApplication->dob ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Citizenship Number</th>
                            <td class="px-4 py-2">{{ $formApplication->citizenship_number ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Issued District</th>
                            <td class="px-4 py-2">{{ $formApplication->issued_district ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Email</th>
                            <td class="px-4 py-2">{{ $formApplication->email ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Contact Number</th>
                            <td class="px-4 py-2">{{ $formApplication->contact_number ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Qualification</th>
                            <td class="px-4 py-2">{{ $formApplication->qualification ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Institution Attended</th>
                            <td class="px-4 py-2">{{ $formApplication->institution_attended ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Year of Graduation</th>
                            <td class="px-4 py-2">{{ $formApplication->graduation_year ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Current Workplace</th>
                            <td class="px-4 py-2">{{ $formApplication->workplace_name ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Workplace Address</th>
                            <td class="px-4 py-2">{{ $formApplication->workplace_address ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Position</th>
                            <td class="px-4 py-2">{{ $formApplication->position ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Employment Type</th>
                            <td class="px-4 py-2">{{ $formApplication->employment_type ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Major Roles and Responsibilities</th>
                            <td class="px-4 py-2">{{ $formApplication->roles ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Reason for attending</th>
                            <td class="px-4 py-2">{{ $formApplication->training_reason ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Declaration Date</th>
                            <td class="px-4 py-2">{{ $formApplication->declaration_date ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Declaration Place</th>
                            <td class="px-4 py-2">{{ $formApplication->declaration_place ?? '-' }}</td>
                        </tr>
                        <tr class="border border-gray-200">
                            <th class="px-4 py-2 font-medium">Photo</th>
                            <td class="px-4 py-2">
                                @if (isset($formApplication) && $formApplication->hasMedia('profile_photo'))
                                    <div class="mb-3">
                                        <img src="{{ public_path('storage/' . $formApplication->getFirstMedia('profile_photo')->id . '/' . $formApplication->getFirstMedia('profile_photo')->file_name) }}"
                                            alt="Profile" style="max-width:200px;">

                                    </div>
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>



        <div style="page-break-before: always; page-break-after: always;">
            <div class="px-4 py-2 font-medium">Certificate</div>
            <div class="px-4 py-2" style="text-align: center;">
                @if (isset($formApplication) && $formApplication->hasMedia('certificate_front'))
                    @php
                        $certificatePath = public_path(
                            'storage/' .
                                $formApplication->getFirstMedia('certificate_front')->id .
                                '/' .
                                $formApplication->getFirstMedia('certificate_front')->file_name,
                        );
                    @endphp
                    <img src="{{ $certificatePath }}" alt="Certificate" style="max-width: 100%; height: auto;">
                @else
                    -
                @endif
            </div>
        </div>

    </div>
</body>

</html>
