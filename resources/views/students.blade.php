<x-app-layout>
    @push('links')
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/libs/@form-validation/form-validation.css') }}" />
    @endpush

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6 mb-6">

            <!-- Total Students -->
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">@lang('locale.total_students')</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-2">{{ $totalStudents }}</h4>
                                    <p class="text-success mb-1">(+{{ $growthStudents }}%)</p>
                                </div>
                                <small class="mb-0">@lang('locale.total_students_account')</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded-3">
                                    <div class="icon-base ri ri-group-line icon-26px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Paid Students -->
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">@lang('locale.paid_students')</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-1">{{ $paidStudents }}</h4>
                                    <p class="text-success mb-1">(+{{ $growthPaid }}%)</p>
                                </div>
                                <small class="mb-0">@lang('locale.last_week_analytics')</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-danger rounded">
                                    <div class="icon-base ri ri-user-add-line icon-26px scaleX-n1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Active Students -->
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">@lang('locale.active_students')</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-1">{{ $activeStudents }}</h4>
                                    <p class="text-danger mb-1">(-{{ $growthActive }}%)</p>
                                </div>
                                <small class="mb-0">@lang('locale.last_week_analytics')</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded-3">
                                    <div class="icon-base ri ri-user-follow-line icon-26px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Pending Students -->
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">@lang('locale.pending_students')</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-1">{{ $pendingStudents }}</h4>
                                    <p class="text-success mb-1">(+{{ $growthPending }}%)</p>
                                </div>
                                <small class="mb-0">@lang('locale.last_week_analytics')</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded-3">
                                    <div class="icon-base ri ri-user-search-line icon-26px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users List Table -->

        <div class="card mb-6">
            <div class="card-header d-flex flex-wrap justify-content-between gap-4">
                <div class="card-title mb-0 me-1">
                    <h5 class="mb-0">@lang('locale.student', ['suffix'=>'s'])</h5>
                    {{-- <p class="mb-0 text-body" id="students-count">@lang('locale.total'): {{ $students->count() }} @lang('locale.student', ['suffix'=>'(s)'])</p> --}}
                </div>
                <div class="d-flex justify-content-md-end align-items-center gap-6 flex-wrap">
                    <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                        <input type="search" name="keyword" placeholder="@lang('locale.find_student_by_keyword')..." class="form-control form-control-sm me-4" />
                    </div>

                    <a class="btn btn-primary text-white" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                        <i class="ri ri-user-line"></i> @lang('locale.add', ['param'=>''])
                    </a>
                </div>
            </div>
            <div class="card-body mt-1" id="search-student-keyword">
                <div class="row">
                    <div class="col-8 mx-auto">
                        @if (!$errors->isEmpty())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ implode(', ', $errors->all()) }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row gy-6 mb-6">
                    @foreach ($students as $item)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card p-2 h-100 shadow-none border rounded-3">                            
                            <!-- IMAGE -->
                            <div class="rounded-4 text-center mb-5">
                                <a href="#">
                                    <img class="img-fluid rounded-3"
                                         src="{{ asset($item->photo ?? 'images/pages/app-academy-tutor-1.png') }}" style="width: 290px; height: 180px"
                                         alt="tutor photo" />
                                </a>
                            </div>
                    
                            <div class="card-body p-3 pt-0">                    
                                <!-- UNIVERSITY -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <span class="badge rounded-pill bg-label-primary">
                                        {{ $item->university }}
                                    </span>
                                </div>
                    
                                <!-- NAME -->
                                <a href="#" class="h5 d-block mb-2">
                                    {{ $item->first_name.' '.$item->last_name }}
                                </a>
                    
                                <!-- PHONE -->
                                <p class="d-flex align-items-center mb-1">
                                    <i class="icon-base ri ri-phone-line icon-20px me-1"></i>
                                    {{ $item->phone }}
                                </p>
                    
                                <!-- EMAIL (corrigé) -->
                                <p class="d-flex align-items-center mb-1">
                                    <i class="icon-base ri ri-mail-line icon-20px me-1"></i>
                                    {{ strtolower($item->email) }}
                                </p>
                    
                                <!-- LEVEL CLASS (ajouté) -->
                                <p class="d-flex align-items-center mb-3">
                                    <i class="icon-base ri ri-graduation-cap-line icon-20px me-1"></i>
                                    {{ $item->level_class ?? 'Non défini' }}
                                </p>
                    
                                <!-- ACTION BUTTONS -->
                                <div class="d-flex gap-2 flex-wrap">
                    
                                    <!-- Edit -->
                                    <a  href="javascript:;" class="btn btn-sm btn-primary btn-edit-student"
                                        data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasEditStudent"
                                        data-student='@json($item)'>
                                        <i class="ri ri-edit-line me-1"></i> @lang('locale.edit', ['param'=>''])
                                    </a>
                    
                                    <!-- Delete -->
                                    <form action="{{ route('users.destroy', $item->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Supprimer cet utilisateur ?')"
                                          class="d-flex">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger d-flex align-items-center">
                                            <i class="ri ri-delete-bin-line me-1"></i> @lang('locale.delete', ['param'=>''])
                                        </button>
                                    </form>
                    
                                    <!-- Disable account -->
                                    <form action=""
                                          method="POST"
                                          class="d-flex">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-warning d-flex align-items-center">
                                            <i class="ri ri-user-unfollow-line me-1"></i>
                                        </button>
                                    </form>
                                </div>                    
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if ($students->hasPages())
                <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                    <ul class="pagination mb-0">

                        {{-- FIRST PAGE --}}
                        <li class="page-item {{ $students->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $students->url(1) }}">
                                <i class="icon-base ri ri-skip-back-mini-line icon-22px"></i>
                            </a>
                        </li>

                        {{-- PREVIOUS --}}
                        <li class="page-item {{ $students->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $students->previousPageUrl() }}">
                                <i class="icon-base ri ri-arrow-left-s-line icon-22px"></i>
                            </a>
                        </li>

                        {{-- PAGE NUMBERS --}}
                        @foreach ($students->toArray()['links'] as $link)
                            @if(is_numeric($link['label']))
                                <li class="page-item {{ $link['active'] ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- NEXT --}}
                        <li class="page-item {{ !$students->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $students->nextPageUrl() }}">
                                <i class="icon-base ri ri-arrow-right-s-line icon-22px"></i>
                            </a>
                        </li>

                        {{-- LAST PAGE --}}
                        <li class="page-item {{ !$students->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $students->url($students->lastPage()) }}">
                                <i class="icon-base ri ri-skip-forward-mini-line icon-22px"></i>
                            </a>
                        </li>

                    </ul>
                </nav>
                @endif
            </div>
        </div>

        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header border-bottom">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">
                    <i class="menu-icon icon-base ri ri-user-line"></i>
                    @lang('locale.add', ['param' => __('locale.student', ['suffix' => ''])])
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                <form class="add-new-user pt-0" action="{{ route('users.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Last Name -->
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            placeholder="Keita">
                        <label for="last_name">@lang('locale.name')</label>
                    </div>

                    <!-- First Name -->
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="Yamoussa">
                        <label for="first_name">@lang('locale.first_name')</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="exemple@mail.com">
                        <label for="email">@lang('locale.email')</label>
                    </div>

                    <!-- Phone -->
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control phone-mask" id="phone" name="phone"
                            placeholder="+224 620 00 00 00" required>
                        <label for="phone">@lang('locale.phone') <span class="text-danger">*</span></label>
                    </div>

                    <!-- Password -->
                    <div class="form-password-toggle mb-5 form-control-validation">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <x-app-input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required />
                                <x-app-label for="password">@lang('locale.password')</x-app-label>
                            </div>
                            <span class="input-group-text cursor-pointer"><i
                                    class="icon-base ri ri-eye-off-line icon-20px"></i></span>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-floating form-floating-outline mb-5">
                        <select id="status" name="status" class="form-select">
                            <option value="ENABLE">ENABLE</option>
                            <option value="DISABLE" selected>DISABLE</option>
                        </select>
                        <label for="status">@lang('locale.status') <span class="text-danger">*</span></label>
                    </div>

                    <input type="hidden" value="student" name="role">

                    <div class="form-floating form-floating-outline mb-5">
                        <select id="level_class" name="level_class" class="form-select">
                            <option value="">-- @lang('locale.select') --</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level }}">{{ $level }}</option>
                            @endforeach
                        </select>
                        <label for="level_class">@lang('locale.level')</label>
                    </div>

                    <!-- University -->
                    <div class="form-floating form-floating-outline mb-5">
                        <input type="text" id="university" name="university" class="form-control"
                            placeholder="Université...">
                        <label for="university">@lang('locale.university')</label>
                    </div>

                    <!-- CNI Upload -->
                    <div class="form-floating form-floating-outline mb-5">
                        <input type="file" id="cni_path" name="cni_path" class="form-control">
                        <label for="cni_path">@lang('locale.cni')</label>
                    </div>

                    <!-- Student Card Upload -->
                    <div class="form-floating form-floating-outline mb-5">
                        <input type="file" id="student_card_path" name="student_card_path" class="form-control">
                        <label for="student_card_path">@lang('locale.student_card')</label>
                    </div>

                    <!-- Student Card Upload -->
                    <div class="form-floating form-floating-outline mb-5">
                        <input type="file" id="photo" name="photo" class="form-control">
                        <label for="photo">@lang('locale.photo')</label>
                    </div>

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('locale.submit')</button>
                    <button type="reset" class="btn btn-outline-danger"
                        data-bs-dismiss="offcanvas">@lang('locale.cancel')</button>
                </form>
            </div>
        </div>


        <!-- Offcanvas Edit Student -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditStudent" aria-labelledby="offcanvasEditStudentLabel">
            <div class="offcanvas-header border-bottom">
                <h5 id="offcanvasEditStudentLabel" class="offcanvas-title">
                    <i class="menu-icon icon-base ri ri-user-line"></i>
                    @lang('locale.edit', ['param' => __('locale.student', ['suffix' => ''])])
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                <form class="edit-student-form pt-0" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Last Name -->
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control" id="edit_last_name" name="last_name" placeholder="Keita">
                        <label for="edit_last_name">@lang('locale.name')</label>
                    </div>

                    <!-- First Name -->
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control" id="edit_first_name" name="first_name" placeholder="Yamoussa">
                        <label for="edit_first_name">@lang('locale.first_name')</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="email" class="form-control" id="edit_email" name="email" placeholder="exemple@mail.com">
                        <label for="edit_email">@lang('locale.email')</label>
                    </div>

                    <!-- Phone -->
                    <div class="form-floating form-floating-outline mb-5 form-control-validation">
                        <input type="text" class="form-control phone-mask" id="edit_phone" name="phone"
                            placeholder="+224 620 00 00 00" required>
                        <label for="edit_phone">@lang('locale.phone') <span class="text-danger">*</span></label>
                    </div>

                    <!-- Status -->
                    <div class="form-floating form-floating-outline mb-5">
                        <select id="edit_status" name="status" class="form-select">
                            <option value="ENABLE">ENABLE</option>
                            <option value="DISABLE">DISABLE</option>
                        </select>
                        <label for="edit_status">@lang('locale.status') <span class="text-danger">*</span></label>
                    </div>

                    <input type="hidden" value="student" name="role">

                    <!-- Level -->
                    <div class="form-floating form-floating-outline mb-5">
                        <select id="edit_level_class" name="level_class" class="form-select">
                            <option value="">-- @lang('locale.select') --</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level }}">{{ $level }}</option>
                            @endforeach
                        </select>
                        <label for="edit_level_class">@lang('locale.level')</label>
                    </div>

                    <!-- University -->
                    <div class="form-floating form-floating-outline mb-5">
                        <input type="text" id="edit_university" name="university" class="form-control"
                            placeholder="Université...">
                        <label for="edit_university">@lang('locale.university')</label>
                    </div>

                    <!-- CNI Upload -->
                    <div class="form-floating form-floating-outline mb-5">
                        <input type="file" id="edit_cni_path" name="cni_path" class="form-control">
                        <label for="edit_cni_path">@lang('locale.cni')</label>
                    </div>

                    <!-- Student Card Upload -->
                    <div class="form-floating form-floating-outline mb-5">
                        <input type="file" id="edit_student_card_path" name="student_card_path" class="form-control">
                        <label for="edit_student_card_path">@lang('locale.student_card')</label>
                    </div>

                    <!-- Photo Upload -->
                    <div class="form-floating form-floating-outline mb-5">
                        <input type="file" id="edit_photo" name="photo" class="form-control">
                        <label for="edit_photo">@lang('locale.photo')</label>
                    </div>

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('locale.update')</button>
                    <button type="reset" class="btn btn-outline-danger"
                        data-bs-dismiss="offcanvas">@lang('locale.cancel')</button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
        <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
        <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>
        <script src="{{ asset('vendor/libs/@form-validation/popular.js') }}"></script>
        <script src="{{ asset('vendor/libs/@form-validation/bootstrap5.js') }}"></script>
        <script src="{{ asset('vendor/libs/@form-validation/auto-focus.js') }}"></script>
        <script src="{{ asset('vendor/libs/cleave-zen/cleave-zen.js') }}"></script>
        <!-- Page JS -->

        <script>
            const appUrl = $('meta[name="app-url"]').attr('content');

            $('.btn-edit-student').on('click', function () {
                const student = $(this).data('student');  
                const form = $('#offcanvasEditStudent form');

                // Route dynamique
                form.attr('action', `${appUrl}/students/${student.id}`);

                // Remplir les champs
                form.find('#edit_last_name').val(student.last_name);
                form.find('#edit_first_name').val(student.first_name);
                form.find('#edit_email').val(student.email);
                form.find('#edit_phone').val(student.phone);
                form.find('#edit_status').val(student.status);
                form.find('#edit_level_class').val(student.level_class);
                form.find('#edit_university').val(student.university);
            });

            $('input[name="keyword"]').on('keyup', function () {
                let keyword = $(this).val();

                $('#search-student-keyword').load("{{ route('students.search') }}", {
                    'keyword':keyword, 
                    '_method':'GET',
                    '_token': $('meta[name="csrf-token"]').prop('content')
                });
            })
        </script>
    @endpush
</x-app-layout>
