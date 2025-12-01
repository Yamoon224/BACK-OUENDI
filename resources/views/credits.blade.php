<x-app-layout>

    @push('links')
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    @endpush

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6 mb-6">

            <!-- Total Credits -->
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">@lang('locale.total_credits')</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-2">{{ $totalCredits }}</h4>
                                    <p class="text-success mb-1">(+{{ $growthTotal }}%)</p>
                                </div>
                                <small class="mb-0">@lang('locale.total_requests')</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded-3">
                                    <div class="icon-base ri ri-wallet-line icon-26px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Pending Credits -->
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">@lang('locale.pending_credits')</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-2">{{ $pendingCredits }}</h4>
                                    <p class="text-warning mb-1">(+{{ $growthPending }}%)</p>
                                </div>
                                <small class="mb-0">@lang('locale.last_week_analytics')</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded-3">
                                    <div class="icon-base ri ri-time-line icon-26px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Approved Credits -->
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">@lang('locale.approved_credits')</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-2">{{ $approvedCredits }}</h4>
                                    <p class="text-success mb-1">(+{{ $growthApproved }}%)</p>
                                </div>
                                <small class="mb-0">@lang('locale.last_week_analytics')</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded-3">
                                    <div class="icon-base ri ri-check-line icon-26px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Rejected Credits -->
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">@lang('locale.rejected_credits')</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-2">{{ $rejectedCredits }}</h4>
                                    <p class="text-danger mb-1">(-{{ $growthRejected }}%)</p>
                                </div>
                                <small class="mb-0">@lang('locale.last_week_analytics')</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-danger rounded-3">
                                    <div class="icon-base ri ri-close-line icon-26px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>@lang('locale.credit_requests')</h5>

                <button class="btn btn-primary" 
                        data-bs-toggle="offcanvas" 
                        data-bs-target="#offcanvasAddCredit">
                    <i class="ri ri-add-line"></i> @lang('locale.add', ['param'=>''])
                </button>
            </div>

            <div class="card-body px-4">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm datatables-credits">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('locale.student', ['suffix'=>''])</th>
                                    <th>@lang('locale.amount')</th>
                                    <th>@lang('locale.request_status')</th>
                                    <th>@lang('locale.request_date')</th>
                                    <th>@lang('locale.actions')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($credits as $credit)
                                <tr>
                                    <td>{{ $credit->id }}</td>
                                    <td>{{ $credit->user->first_name }} {{ $credit->user->last_name }}</td>
                                    <td>{{ number_format($credit->amount,2) }} GNF</td>

                                    <td>
                                        <span class="badge 
                                            @if($credit->status=='pending') bg-label-warning
                                            @elseif($credit->status=='approved') bg-label-success
                                            @else bg-label-danger
                                            @endif">
                                            {{ ucfirst($credit->status) }}
                                        </span>
                                    </td>

                                    <td>{{ $credit->request_at?->format('d/m/Y H:i:s') }}</td>

                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">

                                            <!-- EDIT -->
                                            <button class="btn btn-sm btn-primary btn-edit-credit"
                                                    data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasEditCredit"
                                                    data-credit='@json($credit)'>
                                                <i class="ri ri-edit-2-line"></i>
                                            </button>

                                            <!-- DELETE -->
                                            <form action="{{ route('credits.destroy',$credit->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('@lang('locale.confirm_delete')');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="ri ri-delete-bin-line"></i>
                                                </button>
                                            </form>

                                        </div>
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

    <!-- ADD CREDIT OFFCANVAS -->
    <div class="offcanvas offcanvas-end" id="offcanvasAddCredit">

        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">
                <i class="ri ri-money-dollar-circle-line"></i> @lang('locale.add', ['param'=>__('locale.credit', ['suffix'=>''])])
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('credits.store') }}" method="POST">
                @csrf

                <!-- USER -->
                <div class="form-floating form-floating-outline mb-4">
                    <select class="form-select" name="user_id">
                        @foreach ($students as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->first_name }} {{ $item->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <label>@lang('locale.student', ['suffix'=>''])</label>
                </div>

                <!-- AMOUNT -->
                <div class="form-floating form-floating-outline mb-4">
                    <input type="number" step="0.01" name="amount" class="form-control">
                    <label>@lang('locale.amount')</label>
                </div>

                <!-- STATUS -->
                <div class="form-floating form-floating-outline mb-4">
                    <select name="status" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                    <label>@lang('locale.status')</label>
                </div>

                <button class="btn btn-primary w-100">@lang('locale.submit')</button>
            </form>
        </div>

    </div>


    <!-- EDIT CREDIT OFFCANVAS -->
    <div class="offcanvas offcanvas-end" id="offcanvasEditCredit">

        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">
                <i class="ri ri-edit-line"></i> @lang('locale.edit', ['param'=>__('locale.credit', ['suffix'=>''])])
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
            <form method="POST" class="edit-credit-form">
                @csrf
                @method('PUT')

                <!-- USER (readonly) -->
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" id="edit_user" class="form-control" disabled>
                    <label>@lang('locale.student', ['suffix'=>''])</label>
                </div>

                <!-- AMOUNT -->
                <div class="form-floating form-floating-outline mb-4">
                    <input type="number" step="0.01" id="edit_amount" name="amount" class="form-control">
                    <label>@lang('locale.amount')</label>
                </div>

                <!-- STATUS -->
                <div class="form-floating form-floating-outline mb-4">
                    <select id="edit_status" name="status" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                    <label>@lang('locale.status')</label>
                </div>

                <button class="btn btn-primary">@lang('locale.update')</button>
            </form>
        </div>

    </div>

    @push('scripts')
        <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

        <script>
            $('.datatables-credits').DataTable();

            const appUrl = $('meta[name="app-url"]').attr('content');

            $('.btn-edit-credit').on('click', function () {
                const credit = $(this).data('credit');
                const form = $('.edit-credit-form');

                form.attr('action', `${appUrl}/credits/${credit.id}`);

                $('#edit_user').val(credit.user.first_name + ' ' + credit.user.last_name);
                $('#edit_amount').val(credit.amount);
                $('#edit_status').val(credit.status);
            });
        </script>
    @endpush

</x-app-layout>
