<x-app-layout>
    @push('links')
        <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    @endpush

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Card Border Shadow -->
        <div class="row g-6">
            <div class="col-sm-6 col-lg-3">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded-3 bg-label-primary"><i
                                        class="icon-base ri ri-car-line icon-24px"></i></span>
                            </div>
                            <h4 class="mb-0">42</h4>
                        </div>
                        <h6 class="mb-0 fw-normal">On route vehicles</h6>
                        <p class="mb-0">
                            <span class="me-1 fw-medium">+18.2%</span>
                            <small class="text-body-secondary">than last week</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded-3 bg-label-warning"><i
                                        class="icon-base ri ri-alert-line icon-24px"></i></span>
                            </div>
                            <h4 class="mb-0">8</h4>
                        </div>
                        <h6 class="mb-0 fw-normal">Vehicles with errors</h6>
                        <p class="mb-0">
                            <span class="me-1 fw-medium">-8.7%</span>
                            <small class="text-body-secondary">than last week</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded-3 bg-label-danger"><i
                                        class="icon-base ri ri-route-line icon-24px"></i></span>
                            </div>
                            <h4 class="mb-0">27</h4>
                        </div>
                        <h6 class="mb-0 fw-normal">Deviated from route</h6>
                        <p class="mb-0">
                            <span class="me-1 fw-medium">+4.3%</span>
                            <small class="text-body-secondary">than last week</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded-3 bg-label-info"><i
                                        class="icon-base ri ri-time-line icon-24px"></i></span>
                            </div>
                            <h4 class="mb-0">13</h4>
                        </div>
                        <h6 class="mb-0 fw-normal">Late vehicles</h6>
                        <p class="mb-0">
                            <span class="me-1 fw-medium">-2.5%</span>
                            <small class="text-body-secondary">than last week</small>
                        </p>
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
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">Delivery Performance</h5>
                            <p class="card-subtitle mb-0">12% increase in this month</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-1"
                                type="button" id="deliveryPerformance" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon-base ri ri-more-2-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="deliveryPerformance">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-6 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-3 bg-label-primary"><i
                                            class="icon-base ri ri-gift-line icon-24px"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0 fw-normal">Packages in transit</h6>
                                        <small class="text-success fw-normal d-block">
                                            <i class="icon-base ri ri-arrow-up-s-line icon-24px"></i>
                                            25.8%
                                        </small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0">10k</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-6 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-3 bg-label-info"><i
                                            class="icon-base ri ri-car-line icon-24px"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0 fw-normal">Packages out for delivery</h6>
                                        <small class="text-success fw-normal d-block">
                                            <i class="icon-base ri ri-arrow-up-s-line icon-24px"></i>
                                            4.3%
                                        </small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0">5k</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-6 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-3 bg-label-success"><i
                                            class="icon-base ri ri-check-line text-success icon-24px"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0 fw-normal">Packages delivered</h6>
                                        <small class="text-danger fw-normal d-block">
                                            <i class="icon-base ri ri-arrow-down-s-line icon-24px"></i>
                                            12.5
                                        </small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0">15k</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-6 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-3 bg-label-warning"><i
                                            class="icon-base ri ri-home-line icon-24px"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0 fw-normal">Delivery success rate</h6>
                                        <small class="text-success fw-normal d-block">
                                            <i class="icon-base ri ri-arrow-up-s-line icon-24px"></i>
                                            35.6%
                                        </small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0">95%</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-6 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-3 bg-label-secondary"><i
                                            class="icon-base ri ri-timer-line icon-24px"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0 fw-normal">Average delivery time</h6>
                                        <small class="text-danger fw-normal d-block">
                                            <i class="icon-base ri ri-arrow-down-s-line icon-24px"></i>
                                            2.15
                                        </small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0">2.5 Days</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-3 bg-label-danger"><i
                                            class="icon-base ri ri-user-line icon-24px"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0 fw-normal">Customer satisfaction</h6>
                                        <small class="text-success fw-normal d-block">
                                            <i class="icon-base ri ri-arrow-up-s-line icon-24px"></i>
                                            5.7%
                                        </small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0">4.5/5</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
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

            <div class="col-12 order-5">
                <div class="card overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-truncate">User</th>
                                    <th class="text-truncate">Email</th>
                                    <th class="text-truncate">Role</th>
                                    <th class="text-truncate">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('images/avatars/1.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Jordan Stevenson</h6>
                                                <small class="text-truncate">@amiccoo</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">susanna.Lind57@gmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-vip-crown-line icon-22px text-primary me-2"></i>
                                            <span>Admin</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('images/avatars/3.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Benedetto Rossiter</h6>
                                                <small class="text-truncate">@brossiter15</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">estelle.Bailey10@gmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-edit-box-line text-warning icon-22px me-2"></i>
                                            <span>Editor</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('images/avatars/2.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Bentlee Emblin</h6>
                                                <small class="text-truncate">@bemblinf</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">milo86@hotmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-computer-line text-danger icon-22px me-2"></i>
                                            <span>Author</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('images/avatars/5.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Bertha Biner</h6>
                                                <small class="text-truncate">@bbinerh</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">lonnie35@hotmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-edit-box-line text-warning icon-22px me-2"></i>
                                            <span>Editor</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('images/avatars/4.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Beverlie Krabbe</h6>
                                                <small class="text-truncate">@bkrabbe1d</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">ahmad_Collins@yahoo.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-pie-chart-2-line icon-22px text-info me-2"></i>
                                            <span>Maintainer</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('images/avatars/7.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Bradan Rosebotham</h6>
                                                <small class="text-truncate">@brosebothamz</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">tillman.Gleason68@hotmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-edit-box-line text-warning icon-22px me-2"></i>
                                            <span>Editor</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('images/avatars/6.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Bree Kilday</h6>
                                                <small class="text-truncate">@bkildayr</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">otho21@gmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-user-3-line icon-22px text-success me-2"></i>
                                            <span>Subscriber</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
