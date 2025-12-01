<x-app-layout>
    @push('links')
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    @endpush

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>@lang('locale.user', ['suffix'=>'s'])</h5>
                <!-- Bouton Add User -->
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                    <i class="ri ri-add-line"></i> @lang('locale.add', ['param'=>''])
                </button>
            </div>

            <div class="card-datatable p-4">
                <div class="row">
                    @if (!$errors->isEmpty())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ implode(', ', $errors->all()) }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="datatables-users table table-sm table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('locale.first_name') & @lang('locale.name')</th>
                                        <th>@lang('locale.email')</th>
                                        <th>@lang('locale.phone')</th>
                                        <th>@lang('locale.role')</th>
                                        <th>@lang('locale.status')</th>
                                        <th>@lang('locale.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ ucfirst($user->role) }}</td>
                                        <td><span class="badge {{ $user->status === 'ENABLE' ? 'bg-label-success' : 'bg-label-danger' }}">{{ $user->status }}</span></td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                <a href="javascript:;" class="btn btn-sm btn-primary btn-edit-user"
                                                    data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasEditUser"
                                                    data-user='@json($user)'>
                                                    <i class="ri ri-edit-2-line"></i>
                                                </a>

                                        
                                                <!-- Delete -->
                                                <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('@lang('locale.confirm_delete')');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" title="@lang('locale.delete')">
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
    </div>

    <!-- Offcanvas Add User -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasAddUserLabel" class="offcanvas-title">
                <i class="menu-icon icon-base ri ri-user-line"></i>
                @lang('locale.add', ['param'=>__('locale.user', ['suffix'=>''])])
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0 h-100">
            <form class="add-new-user pt-0" action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <!-- Last Name -->
                <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Keita">
                    <label for="last_name">@lang('locale.name')</label>
                </div>
            
                <!-- First Name -->
                <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Yamoussa">
                    <label for="first_name">@lang('locale.first_name')</label>
                </div>
            
                <!-- Email -->
                <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="email" class="form-control" id="email" name="email" placeholder="exemple@mail.com">
                    <label for="email">@lang('locale.email')</label>
                </div>
            
                <!-- Phone -->
                <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="text" class="form-control phone-mask" id="phone" name="phone" placeholder="+224 620 00 00 00" required>
                    <label for="phone">@lang('locale.phone') <span class="text-danger">*</span></label>
                </div>
            
                <!-- Password -->
                <div class="form-password-toggle mb-5 form-control-validation">
                    <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                            <x-app-input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required/>
                            <x-app-label for="password">@lang('locale.password')</x-app-label>
                        </div>
                        <span class="input-group-text cursor-pointer"><i class="icon-base ri ri-eye-off-line icon-20px"></i></span>
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
            
                <!-- Role -->
                <div class="form-floating form-floating-outline mb-5">
                    <select id="role" name="role" class="form-select">
                        <option value="student">@lang('locale.student', ['suffix'=>''])</option>
                        <option value="admin">@lang('locale.admin')</option>
                    </select>
                    <label for="role">@lang('locale.role') <span class="text-danger">*</span></label>
                </div>

                <div class="form-floating form-floating-outline mb-5">
                    <select id="level_class" name="level_class" class="form-select">
                        <option value="">-- @lang('locale.select') --</option>
                        @foreach($levels as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
                        @endforeach
                    </select>
                    <label for="level_class">@lang('locale.level')</label>
                </div>

            
                <!-- University -->
                <div class="form-floating form-floating-outline mb-5">
                    <input type="text" id="university" name="university" class="form-control" placeholder="Université...">
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
                <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="offcanvas">@lang('locale.cancel')</button>                    
            </form>                    
        </div>
    </div>

    <!-- Offcanvas Edit User -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasEditUserLabel" class="offcanvas-title">
                <i class="menu-icon icon-base ri ri-user-line"></i>
                @lang('locale.edit', ['param'=>__('locale.student', ['suffix'=>''])])
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0 h-100">
            <form class="edit-user-form pt-0" method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="form-control phone-mask" id="edit_phone" name="phone" placeholder="+224 620 00 00 00" required>
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

                <!-- Role -->
                <div class="form-floating form-floating-outline mb-5">
                    <select id="edit_role" name="role" class="form-select">
                        <option value="student">@lang('locale.student', ['suffix'=>''])</option>
                        <option value="admin">@lang('locale.admin')</option>
                    </select>
                    <label for="edit_role">@lang('locale.role') <span class="text-danger">*</span></label>
                </div>

                <!-- Level -->
                <div class="form-floating form-floating-outline mb-5">
                    <select id="edit_level_class" name="level_class" class="form-select">
                        <option value="">-- @lang('locale.select') --</option>
                        @foreach($levels as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
                        @endforeach
                    </select>
                    <label for="edit_level_class">@lang('locale.level')</label>
                </div>

                <!-- University -->
                <div class="form-floating form-floating-outline mb-5">
                    <input type="text" id="edit_university" name="university" class="form-control" placeholder="Université...">
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

                <!-- Student Card Upload -->
                <div class="form-floating form-floating-outline mb-5">
                    <input type="file" id="edit_photo" name="photo" class="form-control">
                    <label for="edit_photo">@lang('locale.photo')</label>
                </div>

                <!-- Buttons -->
                <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('locale.update')</button>
                <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="offcanvas">@lang('locale.cancel')</button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
        <script src="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.datatables-users').DataTable(); // initialisation basique
            });

            const appUrl = $('meta[name="app-url"]').attr('content');

            $('.btn-edit-user').on('click', function() {
                const user = $(this).data('user'); // l'objet user JSON depuis data-user
                const form = $('#offcanvasEditUser form');
                
                form.attr('action', `${appUrl}/users/${user.id}`);
                form.find('#edit_last_name').val(user.last_name);
                form.find('#edit_first_name').val(user.first_name);
                form.find('#edit_email').val(user.email);
                form.find('#edit_phone').val(user.phone);
                form.find('#edit_status').val(user.status);
                form.find('#edit_role').val(user.role);
                form.find('#edit_level_class').val(user.level_class);
                form.find('#edit_university').val(user.university);
            });
        </script>
        
    @endpush
</x-app-layout>
