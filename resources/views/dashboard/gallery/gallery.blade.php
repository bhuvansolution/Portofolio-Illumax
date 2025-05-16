@extends('dashboard.layouts.app')
@section('container')
    <!-- BEGIN:  -->
    <div class="col-span-12 lg:col-span-4">
        <div class="intro-y pr-1">
            <div class="box p-2">
                <ul class="nav nav-pills" role="tablist">
                    <li id="ticket-tab" class="nav-item flex-1" role="presentation">
                        <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#ticket"
                            type="button" role="tab" aria-controls="ticket" aria-selected="true"> Gallery List
                        </button>
                    </li>
                    <li id="details-tab" class="nav-item flex-1" role="presentation">
                        <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#details" type="button"
                            role="tab" aria-controls="details" aria-selected="false"> Gallery Page </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="ticket" class="tab-pane active" role="tabpanel" aria-labelledby="ticket-tab">
                <div class="grid grid-cols-12 gap-6 mt-8">
                    <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
                        <!-- BEGIN: File Manager Menu -->
                        <div class="intro-y box p-5 mt-6">
                            <div class="border-t border-slate-200 dark:border-darkmode-400 mt-4 pt-4"></div>
                            <div class="mt-1">
                                <a href="/dashboard/gallery"
                                    class="flex items-center px-3 py-2 rounded-md {{ request('status') == null ? 'bg-primary text-white font-medium' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-images w-4 h-4 mr-2">
                                        <path d="M18 22H4a2 2 0 0 1-2-2V6" />
                                        <path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18" />
                                        <circle cx="12" cy="8" r="2" />
                                        <rect width="16" height="16" x="6" y="2" rx="2" />
                                    </svg> ALL </a>
                                <a href="/dashboard/gallery?status=Publish"
                                    class="flex items-center px-3 py-2 rounded-md {{ request('status') == 'Publish' ? 'bg-primary text-white font-medium' : '' }}">
                                    <i class="w-4 h-4 mr-2" data-lucide="check-circle"></i> Publish </a>
                                <a href="/dashboard/gallery?status=Draft"
                                    class="flex items-center px-3 py-2 mt-2 rounded-md {{ request('status') == 'Draft' ? 'bg-primary text-white font-medium' : '' }}">
                                    <i class="w-4 h-4 mr-2" data-lucide="clock"></i> Draft </a>
                            </div>
                            <div class="border-t border-slate-200 dark:border-darkmode-400 mt-4 pt-4"></div>
                        </div>
                        <!-- END: File Manager Menu -->
                    </div>

                    <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
                        <!-- BEGIN: File Manager Filter -->
                        <div class="intro-y flex flex-col-reverse sm:flex-row items-center">

                            <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                                <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-slate-500"
                                    data-lucide="search"></i>
                                <form action="{{ url()->current() }}" method="get">
                                    <input type="text" name="search" id="search"
                                        class="form-control w-full sm:w-64 box px-10" placeholder="Search Images"
                                        value="{{ old('search', request('search')) }}">
                                </form>
                            </div>

                            <div class="w-full sm:w-auto flex">
                                <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal"
                                    data-tw-target="#header-footer-modal-preview">Upload New Files</button>
                            </div>
                        </div>
                        <!-- END: File Manager Filter -->

                        <!-- BEGIN: Directory & Files -->
                        <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                            @forelse ($gallery as $item)
                                <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                                    <div
                                        class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in  {{ $item->status === 'Draft' ? 'bg-gray-100' : '' }}">
                                        <a class="w-3/5 file__icon file__icon--image mx-auto">
                                            <div class="file__icon--image__preview image-fit">
                                                <img alt="{{ $item->title }}"
                                                    src="/assets/images/gallery/{{ $item->gambar }}">
                                            </div>
                                        </a>
                                        <a class="block font-medium mt-4 text-center truncate">{{ $item->gambar }}</a>
                                        <div class="text-slate-500 text-xs text-center mt-0.5"></div>
                                        <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"
                                                aria-expanded="false" data-tw-toggle="dropdown"> <i
                                                    data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                                            <div class="dropdown-menu w-40">
                                                <ul class="dropdown-content">
                                                    <li>
                                                        <a href="javascript:;" data-tw-toggle="modal"
                                                            data-tw-target="#edit-{{ $item->id }}"
                                                            class="dropdown-item">
                                                            <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </a>
                                                    </li>
                                                    @if ($item->status === 'Draft')
                                                        {{-- jika sekarang Draft, tampilkan tombol Publish saja --}}
                                                        <li>
                                                            <a href="{{ route('gallery.status', ['id' => $item->id, 'status' => 'Publish']) }}"
                                                                class="dropdown-item text-success">
                                                                <i data-lucide="check-circle"
                                                                    class="w-4 h-4 mr-2 text-success"></i>
                                                                Publish
                                                            </a>
                                                        </li>
                                                    @elseif($item->status === 'Publish')
                                                        {{-- jika sekarang Publish, tampilkan tombol Draft saja --}}
                                                        <li>
                                                            <a href="{{ route('gallery.status', ['id' => $item->id, 'status' => 'Draft']) }}"
                                                                class="dropdown-item text-warning">
                                                                <i data-lucide="clock"
                                                                    class="w-4 h-4 mr-2 text-warning"></i>
                                                                Draft
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a href="javascript:;" data-tw-toggle="modal"
                                                            data-tw-target="#delete-modal-preview-{{ $item->id }}"
                                                            class="dropdown-item text-danger">
                                                            <i data-lucide="trash" class="w-4 h-4 mr-2 text-danger"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="intro-y col-span-12">
                                    <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative text-center">
                                        <p class="text-slate-500">Tidak ada file yang tersedia.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <!-- END: Directory & Files -->
                        <!-- BEGIN: Pagination -->
                        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
                            <nav class="w-full sm:w-auto sm:mr-auto items-center">
                                <ul class="pagination">
                                    @if ($gallery->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link">
                                                <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item disabled">
                                            <a class="page-link">
                                                <i class="w-4 h-4" data-lucide="chevron-left"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $gallery->url(1) }}">
                                                <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $gallery->url($gallery->currentPage() - 1) }}">
                                                <i class="w-4 h-4" data-lucide="chevron-left"></i>
                                            </a>
                                        </li>
                                    @endif

                                    <li class="page-item disabled"> <a class="page-link">...</a> </li>
                                    @for ($i = 1; $i <= $gallery->lastPage(); $i++)
                                        <li class="page-item {{ $i == $gallery->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $gallery->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item disabled"> <a class="page-link">...</a> </li>

                                    <!-- Cek jika ada halaman berikutnya -->
                                    @if ($gallery->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $gallery->url($gallery->currentPage() + 1) }}">
                                                <i class="w-4 h-4" data-lucide="chevron-right"></i>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $gallery->url($gallery->lastPage()) }}">
                                                <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link">
                                                <i class="w-4 h-4" data-lucide="chevron-right"></i>
                                            </a>
                                        </li>
                                        <li class="page-item disabled">
                                            <a class="page-link">
                                                <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <!-- END: Pagination -->
                    </div>
                </div>
            </div>
            <div id="details" class="tab-pane" role="tabpanel" aria-labelledby="details-tab">
                <form action="/dashboard/gallerypage/{{ $gallerys->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 2xl:col-span-9">
                            <div class="grid grid-cols-12 gap-6">
                                <!-- BEGIN: gallery Report -->
                                <div class="col-span-12 mt-8">
                                    <div class="intro-y flex items-center h-10">
                                    </div>
                                    <div class="intro-y box p-5 mt-5">
                                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div
                                                class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                                <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>Text Banner Atas
                                            </div>
                                            <div class="mt-5">
                                                <div
                                                    class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label xl:w-64 xl:!mr-10">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Teks (Indonesia)</div>
                                                                <div
                                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                    Required</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                                        <textarea name="textatas" id="textatas" rows="5" class="w-full form-control">{{ old('textatas', $gallerys->textatas) }}</textarea>
                                                        @error('textatas')
                                                            <div class="text-danger form-help text-left">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label xl:w-64 xl:!mr-10">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Text (Inggris)</div>
                                                                <div
                                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                    Required</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                                        <textarea name="engtextatas" id="engtextatas" rows="5" class="w-full form-control">{{ old('engtextatas', $gallerys->engtextatas) }}</textarea>
                                                        @error('engtextatas')
                                                            <div class="text-danger form-help text-left">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="intro-y box p-5 mt-5">
                                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div
                                                class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                                <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>Quote
                                            </div>
                                            <div class="mt-5">
                                                <div
                                                    class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label xl:w-64 xl:!mr-10">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Quote (Indonesia)</div>
                                                                <div
                                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                    Required</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-32 mt-3 xl:mt-0 flex-1">
                                                        <textarea name="quote" id="quote" rows="5" class="editor">{{ old('quote', $gallerys->quote) }}</textarea>

                                                        @error('quote')
                                                            <div class="text-danger form-help text-left">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label xl:w-64 xl:!mr-10">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Quote (Inggris)</div>
                                                                <div
                                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                    Required</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-32 mt-3 xl:mt-0 flex-1">
                                                        <textarea name="engquote" id="engquote" rows="5" class="editor">{{ old('engquote', $gallerys->engquote) }}</textarea>
                                                        @error('engquote')
                                                            <div class="text-danger form-help text-left">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="intro-y box p-5 mt-5">
                                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div
                                                class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                                <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>Text Banner Bawah
                                            </div>
                                            <div class="mt-5">
                                                <div
                                                    class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label xl:w-64 xl:!mr-10">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Teks (Indonesia)</div>
                                                                <div
                                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                    Required</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                                        <textarea name="textbawah" id="textbawah" rows="5" class="w-full form-control">{{ old('textbawah', $gallerys->textbawah) }}</textarea>
                                                        @error('textbawah')
                                                            <div class="text-danger form-help text-left">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label xl:w-64 xl:!mr-10">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Text (Inggris)</div>
                                                                <div
                                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                    Required</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                                        <textarea name="engtextbawah" id="engtextbawah" rows="5" class="w-full form-control">{{ old('engtextbawah', $gallerys->engtextbawah) }}</textarea>
                                                        @error('engtextbawah')
                                                            <div class="text-danger form-help text-left">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-center flex-col md:flex-row gap-2 mt-5">
                                        <button type="submit" name="action" value="save"
                                            class="btn py-3 btn-primary w-full md:w-52">Save</button>
                                    </div>
                                </div>
                                <!-- END: gallery Report -->
                            </div>
                        </div>
                        <div class="col-span-12 2xl:col-span-3">
                            <div class="2xl:border-l -mb-10 pb-10">
                                <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                                    <!-- BEGIN: Transactions -->
                                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                                        <div class="intro-x flex items-center h-10">
                                            <h2 class="text-lg font-medium truncate mr-5">
                                                Banner Atas
                                            </h2>
                                        </div>
                                        <div class="mt-5">
                                            <div class="intro-x box px-5 py-3 mb-3 flex items-center zoom-in">
                                                <div class="col-span-12 sm:col-span-12">
                                                    <label for="gambar-{{ $gallerys->id }}" class="form-label">Upload
                                                        Image</label>
                                                    <div
                                                        class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                                        <div class="flex flex-wrap px-4 cursor-pointer"
                                                            id="preview-{{ $gallerys->id }}">
                                                            <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                            @if ($gallerys->gambar)
                                                                <div
                                                                    class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                                    <img class="rounded-md" alt="Preview Image"
                                                                        src="/assets/images/gallerypage/{{ $gallerys->gambar }}">
                                                                    <div title="Remove this image?"
                                                                        class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                                        onclick="remove({{ $gallerys->id }}, 'preview')">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="w-4 h-4 cursor-pointer"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <line x1="18" y1="6"
                                                                                x2="6" y2="18">
                                                                            </line>
                                                                            <line x1="6" y1="6"
                                                                                x2="18" y2="18">
                                                                            </line>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="px-4 pb-4 flex items-center relative cursor-pointer">
                                                            <i data-lucide="image"
                                                                class="w-4 h-4 mr-2 cursor-pointer"></i>
                                                            <span class="text-primary mr-1 cursor-pointer">Upload a
                                                                file</span>
                                                            or drag and drop
                                                            <input id="gambar-input-{{ $gallerys->id }}" name="gambar"
                                                                type="file" accept="image/*"
                                                                class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                                onchange="preview(event, {{ $gallerys->id }})">
                                                            <input type="hidden" name="hapus_gambar"
                                                                id="hapus-gambar-{{ $gallerys->id }}" value="0">
                                                        </div>
                                                    </div>
                                                    @error('gambar')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                                        <div class="intro-x flex items-center h-10">
                                            <h2 class="text-lg font-medium truncate mr-5">
                                                Banner Bawah
                                            </h2>
                                        </div>
                                        <div class="mt-5">
                                            <div class="intro-x box px-5 py-3 mb-3 flex items-center zoom-in">
                                                <div class="col-span-12 sm:col-span-12">
                                                    <label for="gambar1-{{ $gallerys->id }}" class="form-label">Upload
                                                        Image</label>
                                                    <div
                                                        class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                                        <div class="flex flex-wrap px-4 cursor-pointer"
                                                            id="preview1-{{ $gallerys->id }}">
                                                            <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                            @if ($gallerys->gambar1)
                                                                <div
                                                                    class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                                    <img class="rounded-md" alt="Preview Image"
                                                                        src="/assets/images/gallerypage/{{ $gallerys->gambar1 }}">
                                                                    <div title="Remove this image?"
                                                                        class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                                        onclick="remove({{ $gallerys->id }}, 'preview1')">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="w-4 h-4 cursor-pointer"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <line x1="18" y1="6"
                                                                                x2="6" y2="18">
                                                                            </line>
                                                                            <line x1="6" y1="6"
                                                                                x2="18" y2="18">
                                                                            </line>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="px-4 pb-4 flex items-center relative cursor-pointer">
                                                            <i data-lucide="image"
                                                                class="w-4 h-4 mr-2 cursor-pointer"></i>
                                                            <span class="text-primary mr-1 cursor-pointer">Upload a
                                                                file</span>
                                                            or drag and drop
                                                            <input id="gambar1-input-{{ $gallerys->id }}" name="gambar1"
                                                                type="file" accept="image/*"
                                                                class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                                onchange="preview(event, {{ $gallerys->id }})">
                                                            <input type="hidden" name="hapus_gambar1"
                                                                id="hapus-gambar1-{{ $gallerys->id }}" value="0">
                                                        </div>
                                                    </div>
                                                    @error('gambar1')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: Transactions -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END:  -->

    @include('dashboard.gallery.add')
    @include('dashboard.gallery.edit')
    <!-- BEGIN: Modal delete -->
    @foreach ($gallery as $gall)
        <div id="delete-modal-preview-{{ $gall->id }}" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Apa Kamu Yakin?</div>
                            <div class="text-slate-500 mt-2">
                                Benar-benar ingin menghapusnya?<br>Proses ini
                                tidak dapat dibatalkan.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">

                            <form action="/dashboard/gallery/{{ $gall->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" data-tw-dismiss="modal"
                                    class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                <button type="submit" class="btn btn-danger w-24">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- END: Modal Content -->
@endsection
@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi pratinjau untuk semua jenis gambar
            function initializePreview(selectorPrefix, previewPrefix) {
                document.querySelectorAll(`[id^="${selectorPrefix}-input-"]`).forEach((inputFile) => {
                    const fileId = inputFile.id.split('-')[2]; // Ambil ID file dari ID input file
                    const previewContainer = document.getElementById(`${previewPrefix}-${fileId}`);

                    // Menambahkan event listener untuk onchange input file
                    inputFile.addEventListener('change', (event) => {
                        preview(event, fileId,
                            previewPrefix
                        ); // Panggil fungsi preview dengan fileId dan prefix yang sesuai
                    });
                });
            }

            // Fungsi untuk menampilkan pratinjau gambar
            function preview(event, fileId, previewPrefix) {
                const previewContainer = document.getElementById(previewPrefix + '-' + fileId);
                previewContainer.innerHTML = ""; // Bersihkan pratinjau sebelumnya

                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imagePreview = document.createElement("div");
                        imagePreview.className =
                            "w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";
                        imagePreview.innerHTML = `
                        <img class="rounded-md" alt="Preview Image" src="${e.target.result}">
                        <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="remove(${fileId}, '${previewPrefix}')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    `;
                        previewContainer.appendChild(imagePreview); // Menambahkan pratinjau gambar
                    };

                    reader.readAsDataURL(file); // Mengubah file gambar menjadi data URL untuk preview
                }
            }

            window.remove = function(fileId, previewPrefix) {
                const previewContainer = document.getElementById(previewPrefix + "-" + fileId);
                previewContainer.innerHTML = "";

                const fileInput = document.getElementById(previewPrefix + "-input-" + fileId);
                if (fileInput) fileInput.value = "";

                // Tentukan nama kolom berdasarkan previewPrefix
                let kolom = '';
                if (previewPrefix === 'preview') kolom = 'gambar';
                if (previewPrefix === 'preview1') kolom = 'gambar1';

                const hiddenInput = document.getElementById("hapus-" + kolom + "-" + fileId);
                if (hiddenInput) hiddenInput.value = "1";
            }

            // Inisialisasi preview gambar umum, visi, dan misi
            initializePreview('gambar', 'preview');
            initializePreview('gambar1', 'preview1');

            // Inisialisasi ikon lucide
            lucide.createIcons();
        });
    </script>
@endpush
