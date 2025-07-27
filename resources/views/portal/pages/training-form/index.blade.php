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
                            <div class="card-body px-0 pt-0 recent-transaction">
                                <div class="recent-table overflow-x-auto custom-scrollbar">
                                    <table class="table" id="recent-transaction">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Form Name</th>
                                                <th>Training Start Date</th>
                                                <th>Form End Date</th>
                                                <th>Created At</th>
                                                <th>Created By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($forms as $index => $form)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $form->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($form->training_start_date)->format('d M Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($form->form_end_date)->format('d M Y') }}
                                                    </td>
                                                    <td>{{ $form->created_at->format('d M Y') }}</td>
                                                    <td>{{ $form->creator->name ?? 'N/A' }}</td>
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
