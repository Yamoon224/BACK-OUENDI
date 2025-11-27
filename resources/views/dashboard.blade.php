<x-app-layout>
    @push('links')
        <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    @endpush

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Card Border Shadow -->
        <div class="row g-6">
            <div class="row g-6">
                <!-- Total Users -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded-3 bg-label-primary">
                                        <i class="icon-base ri ri-group-line icon-24px"></i>
                                    </span>
                                </div>
                                <h4 class="mb-0">{{ $totalUsers }}</h4>
                            </div>
                            <h6 class="mb-0 fw-normal">@lang('locale.total_users')</h6>
                            <p class="mb-0">
                                <span class="me-1 fw-medium">+{{ $growthUsers }}%</span>
                                <small class="text-body-secondary">@lang('locale.last_week_analytics')</small>
                            </p>
                        </div>
                    </div>
                </div>
            
                <!-- Active Students -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-border-shadow-success h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded-3 bg-label-success">
                                        <i class="icon-base ri ri-user-follow-line icon-24px"></i>
                                    </span>
                                </div>
                                <h4 class="mb-0">{{ $activeStudents }}</h4>
                            </div>
                            <h6 class="mb-0 fw-normal">@lang('locale.active_students')</h6>
                            <p class="mb-0">
                                <span class="me-1 fw-medium">+{{ $growthActive }}%</span>
                                <small class="text-body-secondary">@lang('locale.last_week_analytics')</small>
                            </p>
                        </div>
                    </div>
                </div>
            
                <!-- Pending Credits -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-border-shadow-warning h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded-3 bg-label-warning">
                                        <i class="icon-base ri ri-time-line icon-24px"></i>
                                    </span>
                                </div>
                                <h4 class="mb-0">{{ $pendingCredits }}</h4>
                            </div>
                            <h6 class="mb-0 fw-normal">@lang('locale.pending_credits')</h6>
                            <p class="mb-0">
                                <span class="me-1 fw-medium">+{{ $growthPending }}%</span>
                                <small class="text-body-secondary">@lang('locale.last_week_analytics')</small>
                            </p>
                        </div>
                    </div>
                </div>
            
                <!-- Approved Credits -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-border-shadow-info h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded-3 bg-label-info">
                                        <i class="icon-base ri ri-checkbox-circle-line icon-24px"></i>
                                    </span>
                                </div>
                                <h4 class="mb-0">{{ $approvedCredits }}</h4>
                            </div>
                            <h6 class="mb-0 fw-normal">@lang('locale.approved_credits')</h6>
                            <p class="mb-0">
                                <span class="me-1 fw-medium">+{{ $growthApproved }}%</span>
                                <small class="text-body-secondary">@lang('locale.last_week_analytics')</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--/ Card Border Shadow -->

            <!-- Shipment statistics-->
            <div class="col-lg-6 col-xxl-6 order-3 order-xxl-1">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2 mb-1">Shipment statistics</h5>
                            <p class="card-subtitle mb-0">Total number of deliveries 23.8k</p>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary">January</button>
                            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">January</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">February</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">March</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">April</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">May</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">June</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">July</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">August</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">September</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">October</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">November</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">December</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="shipmentStatisticsChart"></div>
                    </div>
                </div>
            </div>
            <!--/ Shipment statistics -->

            <!-- Delivery Performance -->
            <div class="col-lg-6 col-xxl-4 order-2 order-xxl-2">
                <div class="card overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-truncate">@lang('locale.user', ['suffix'=>''])</th>
                                    <th class="text-truncate">@lang('locale.email')</th>
                                    <th class="text-truncate">@lang('locale.role')</th>
                                    <th class="text-truncate">@lang('locale.status')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{  asset($user->photo ? $user->photo : 'images/avatars/default.png') }}"
                                                     alt="Avatar" class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">{{ $user->first_name }} {{ $user->last_name }}</h6>
                                                <small class="text-truncate">{{ $user->phone }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">{{ $user->email }}</td>
                                    <td class="text-truncate text-capitalize">{{ $user->role }}</td>
                                    <td>
                                        @php
                                            $statusClasses = [
                                                'ENABLE' => 'bg-label-success',
                                                'DISABLE' => 'bg-label-warning',
                                            ];
                                        @endphp
                                        <span class="badge {{ $statusClasses[$user->status] ?? 'bg-label-secondary' }} rounded-pill">
                                            {{ $user->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/ Delivery Performance -->

            <!-- Reasons for delivery exceptions -->
            <div class="col-md-6 col-xxl-4 order-1 order-xxl-3">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Reasons for delivery exceptions</h5>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-1"
                                type="button" id="deliveryExceptionsReasons" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon-base ri ri-more-2-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="deliveryExceptionsReasons">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="deliveryExceptionsChart"></div>
                    </div>
                </div>
            </div>
            <!--/ Reasons for delivery exceptions -->

            <!-- Orders by Countries -->
            <div class="col-md-6 col-xxl-4 order-0 order-xxl-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Orders by Countries</h5>
                            <span class="text-body mb-0">62 deliveries in progress</span>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-1"
                                type="button" id="ordersCountries" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="icon-base ri ri-more-2-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="ordersCountries">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="nav-align-top">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab"
                                        data-bs-toggle="tab" data-bs-target="#navs-justified-new"
                                        aria-controls="navs-justified-new" aria-selected="true">New</button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-link-preparing"
                                        aria-controls="navs-justified-link-preparing"
                                        aria-selected="false">Preparing</button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-link-shipping"
                                        aria-controls="navs-justified-link-shipping"
                                        aria-selected="false">Shipping</button>
                                </li>
                            </ul>
                            <div class="tab-content border-0 pb-0 px-6 mx-1">
                                <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                                    <ul class="timeline mb-0">
                                        <li class="timeline-item ps-6 border-dashed">
                                            <span class="timeline-indicator-advanced border-0 shadow-none">
                                                <i class="icon-base ri ri-checkbox-circle-line text-success"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-success text-uppercase">sender</small>
                                                </div>
                                                <h6 class="my-50">Myrtle Ullrich</h6>
                                                <p class="mb-0 small">101 Boulder, California(CA), 95959</p>
                                            </div>
                                        </li>
                                        <li class="timeline-item ps-6 border-transparent">
                                            <span
                                                class="timeline-indicator-advanced text-primary border-0 shadow-none">
                                                <i class="icon-base ri ri-map-pin-line"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-primary text-uppercase">Receiver</small>
                                                </div>
                                                <h6 class="my-50">Barry Schowalter</h6>
                                                <p class="mb-0 small">939 Orange, California(CA), 92118</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="border-1 border-light border-dashed mb-2"></div>
                                    <ul class="timeline mb-0">
                                        <li class="timeline-item ps-6 border-dashed">
                                            <span class="timeline-indicator-advanced border-0 shadow-none">
                                                <i class="icon-base ri ri-checkbox-circle-line text-success"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-success text-uppercase">sender</small>
                                                </div>
                                                <h6 class="my-50">Veronica Herman</h6>
                                                <p class="mb-0 small">162 Windsor, California(CA), 95492</p>
                                            </div>
                                        </li>
                                        <li class="timeline-item ps-6 border-transparent">
                                            <span
                                                class="timeline-indicator-advanced text-primary border-0 shadow-none">
                                                <i class="icon-base ri ri-map-pin-line"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-primary text-uppercase">Receiver</small>
                                                </div>
                                                <h6 class="my-50">Helen Jacobs</h6>
                                                <p class="mb-0 small">487 Sunset, California(CA), 94043</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="navs-justified-link-preparing" role="tabpanel">
                                    <ul class="timeline mb-0">
                                        <li class="timeline-item ps-6 border-dashed">
                                            <span class="timeline-indicator-advanced border-0 shadow-none">
                                                <i class="icon-base ri ri-checkbox-circle-line text-success"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-success text-uppercase">sender</small>
                                                </div>
                                                <h6 class="my-50">Barry Schowalter</h6>
                                                <p class="mb-0 small">939 Orange, California(CA), 92118</p>
                                            </div>
                                        </li>
                                        <li class="timeline-item ps-6 border-transparent border-dashed">
                                            <span
                                                class="timeline-indicator-advanced text-primary border-0 shadow-none">
                                                <i class="icon-base ri ri-map-pin-line"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-primary text-uppercase">Receiver</small>
                                                </div>
                                                <h6 class="my-50">Myrtle Ullrich</h6>
                                                <p class="mb-0 small">101 Boulder, California(CA), 95959</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="border-1 border-light border-dashed mb-2 "></div>
                                    <ul class="timeline mb-0">
                                        <li class="timeline-item ps-6 border-dashed">
                                            <span class="timeline-indicator-advanced border-0 shadow-none">
                                                <i class="icon-base ri ri-checkbox-circle-line text-success"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-success text-uppercase">sender</small>
                                                </div>
                                                <h6 class="my-50">Veronica Herman</h6>
                                                <p class="mb-0 small">162 Windsor, California(CA), 95492</p>
                                            </div>
                                        </li>
                                        <li class="timeline-item ps-6 border-transparent">
                                            <span
                                                class="timeline-indicator-advanced text-primary border-0 shadow-none">
                                                <i class="icon-base ri ri-map-pin-line"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-primary text-uppercase">Receiver</small>
                                                </div>
                                                <h6 class="my-50">Helen Jacobs</h6>
                                                <p class="mb-0 small">487 Sunset, California(CA), 94043</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="navs-justified-link-shipping" role="tabpanel">
                                    <ul class="timeline mb-0">
                                        <li class="timeline-item ps-6 border-dashed">
                                            <span class="timeline-indicator-advanced border-0 shadow-none">
                                                <i class="icon-base ri ri-checkbox-circle-line text-success"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-success text-uppercase">sender</small>
                                                </div>
                                                <h6 class="my-50">Veronica Herman</h6>
                                                <p class="mb-0 small">101 Boulder, California(CA), 95959</p>
                                            </div>
                                        </li>
                                        <li class="timeline-item ps-6 border-transparent">
                                            <span
                                                class="timeline-indicator-advanced text-primary border-0 shadow-none">
                                                <i class="icon-base ri ri-map-pin-line"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-primary text-uppercase">Receiver</small>
                                                </div>
                                                <h6 class="my-50">Barry Schowalter</h6>
                                                <p class="mb-0 small">939 Orange, California(CA), 92118</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="border-1 border-light border-dashed mb-2 "></div>
                                    <ul class="timeline mb-0">
                                        <li class="timeline-item ps-6 border-dashed">
                                            <span class="timeline-indicator-advanced border-0 shadow-none">
                                                <i class="icon-base ri ri-checkbox-circle-line text-success"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-success text-uppercase">sender</small>
                                                </div>
                                                <h6 class="my-50">Myrtle Ullrich</h6>
                                                <p class="mb-0 small">162 Windsor, California(CA), 95492</p>
                                            </div>
                                        </li>
                                        <li class="timeline-item ps-6 border-transparent">
                                            <span
                                                class="timeline-indicator-advanced text-primary border-0 shadow-none">
                                                <i class="icon-base ri ri-map-pin-line"></i>
                                            </span>
                                            <div class="timeline-event ps-1">
                                                <div class="timeline-header">
                                                    <small class="text-primary text-uppercase">Receiver</small>
                                                </div>
                                                <h6 class="my-50">Helen Jacobs</h6>
                                                <p class="mb-0 small">487 Sunset, California(CA), 94043</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Orders by Countries -->                        
        </div>
        <!--/ On route vehicles Table -->
    </div>

    @push('scripts')
        <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
        <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('js/app-logistics-dashboard.js') }}"></script>
    @endpush
</x-app-layout>
