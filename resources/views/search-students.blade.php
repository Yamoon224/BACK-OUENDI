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

