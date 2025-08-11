@extends('portal.layout.app')

@section('content')
    <div class="container w-full">
        <div class="page-title">
            <div class="grid grid-cols-12 mx-2 items-center">
                <div class="col-span-6 sm:col-span-12">
                    <h3>Hi {{ Auth::user()->name }}</h3>
                </div>
                <div class="col-span-6 sm:col-span-12">
                    <ol class="breadcrumb flex gap-2">
                        <li class="breadcrumb-item">
                            <a href="index.html"><svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Training Participation Portal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container dashboard-2">
        <div class="grid grid-cols-12 card-gap size-column">
            <div class="col-span-12 xxl:col-span-12 box-col-12 grid-ed-12">
                <div class="grid grid-cols-12 card-gap">
                    <div class="col-span-12">
                        <div class="card">
                            <div class="card-body main-title-box">
                                <div class="common-space gap-2">
                                    <h6 class="f-light">
                                        Welcome to the Nepal Pharmacy Council Training Participation Portal
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xxl:col-span-12 md:col-span-12 box-col-7">
                        <div class="grid grid-cols-12 card-gap">
                            <div class="col-span-4 sm:col-span-12">
                                <div class="card small-widget">
                                    <div class="card-body primary">
                                        <span class="f-light">Total Training</span>
                                        <div class="flex items-end gap-1">
                                            <h4 class="counter" data-target="{{ $totalTraining }}">{{ $totalTraining }}</h4>
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="../assets/svg/icon-sprite.svg#new-order"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-4 sm:col-span-12">
                                <div class="card small-widget">
                                    <div class="card-body warning">
                                        <span class="f-light">New Users</span>
                                        <div class="flex items-end gap-1">
                                            <h4 class="counter" data-target="{{ $userCount }}">{{ $userCount }}</h4>

                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="../assets/svg/icon-sprite.svg#customers"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-4 sm:col-span-12">
                                <div class="card small-widget">
                                    <div class="card-body secondary">
                                        <span class="f-light">Unapproved Training Applications</span>
                                        <div class="flex items-end gap-1">
                                            <h4>
                                                <span class="counter"
                                                    data-target="{{ $applicationCount }}">{{ $applicationCount }}</span>
                                            </h4>

                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="../assets/svg/icon-sprite.svg#sale"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-4 sm:col-span-12">
                                <div class="card small-widget">
                                    <div class="card-body success">
                                        <span class="f-light">Approved Training Applications</span>
                                        <div class="flex items-end gap-1">
                                            <h4>
                                                <span class="counter"
                                                    data-target="{{ $applicationCountApproved }}">{{ $applicationCountApproved }}</span>
                                            </h4>

                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="../assets/svg/icon-sprite.svg#profit"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
