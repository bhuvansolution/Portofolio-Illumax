@extends('dashboard.layouts.app')
@section('container')
    <!-- BEGIN:  -->
    <div class="col-span-12 lg:col-span-4">
        <div class="intro-y pr-1">
            <div class="box p-2">
                <ul class="nav nav-pills" role="tablist">
                    <li id="ticket-tab" class="nav-item flex-1" role="presentation">
                        <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#ticket"
                            type="button" role="tab" aria-controls="ticket" aria-selected="true"> Portfolio List
                        </button>
                    </li>
                    <li id="details-tab" class="nav-item flex-1" role="presentation">
                        <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#details" type="button"
                            role="tab" aria-controls="details" aria-selected="false"> Portfolio Page </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="ticket" class="tab-pane active" role="tabpanel" aria-labelledby="ticket-tab">
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                        <a href="/dashboard/our-portofolio/create" class="btn btn-primary shadow-md mr-2">Add New </a>
                        <div class="hidden md:block mx-auto text-slate-500"> Showing {{ $portofolio->firstItem() }} to
                            {{ $portofolio->lastItem() }} of {{ $portofolio->total() }} entries</div>
                        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <div class="w-56 relative text-slate-500">
                                <form action="{{ url()->current() }}" method="get">
                                    <input type="text" name="search" id="search" class="form-control w-56 box pr-10"
                                        placeholder="Search..." value="{{ old('search', request('search')) }}">
                                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">IMAGES</th>
                                    <th class="whitespace-nowrap">TITLE</th>
                                    <th class="whitespace-nowrap">DESCRIPTION</th>
                                    <th class="text-center whitespace-nowrap">STATUS</th>
                                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($portofolio as $item)
                                    <tr class="intro-x">
                                        <td class="w-20">
                                            <div class="flex">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    <img alt="{{ $item->title }}" data-action="zoom"
                                                        class="w-full tooltip rounded-full"
                                                        src="/assets/images/portofolio/{{ $item->gambar }}"
                                                        title="Uploaded at {{ $item->updated_at->format('d F Y') }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-start">{{ $item->title }}</td>
                                        <td class="text-start">{{ Str::limit(strip_tags($item->description), 50) }}</td>
                                        <td class="w-40">
                                            <a href="{{ route('portofolio.status', ['id' => $item->id, 'status' => $item->status === 'Publish' ? 'Draft' : 'Publish']) }}"
                                                class="flex items-center justify-center px-2 py-1 rounded transition
                                {{ $item->status === 'Publish' ? 'text-success bg-success/10 hover:bg-success/20' : 'text-warning' }}">
                                                <i data-lucide="{{ $item->status === 'Publish' ? 'check-circle' : 'clock' }}"
                                                    class="w-4 h-4 mr-2"></i>
                                                {{ $item->status }}
                                            </a>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3"
                                                    href="/dashboard/our-portofolio/{{ $item->id }}/edit">
                                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                                <a class="flex items-center text-danger" href="javascript:;"
                                                    data-tw-toggle="modal"
                                                    data-tw-target="#delete-modal-preview-{{ $item->id }}"> <i
                                                        data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-gray-500">No data available</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <!-- END: Data List -->
                    <!-- BEGIN: Pagination -->
                    <div class="intro-y col-span-12 flex justify-center items-center">
                        <nav class="w-full sm:w-auto"> <!-- Menambahkan flex dan justify-center -->
                            <ul class="pagination">
                                @if ($portofolio->onFirstPage())
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
                                        <a class="page-link" href="{{ $portofolio->url(1) }}">
                                            <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $portofolio->url($portofolio->currentPage() - 1) }}">
                                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                                        </a>
                                    </li>
                                @endif

                                <li class="page-item disabled"> <a class="page-link">...</a> </li>
                                @for ($i = 1; $i <= $portofolio->lastPage(); $i++)
                                    <li class="page-item {{ $i == $portofolio->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $portofolio->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item disabled"> <a class="page-link">...</a> </li>

                                @if ($portofolio->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $portofolio->url($portofolio->currentPage() + 1) }}">
                                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $portofolio->url($portofolio->lastPage()) }}">
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
                </div>
            </div>
            <div id="details" class="tab-pane" role="tabpanel" aria-labelledby="details-tab">
                <form action="/dashboard/portofolio-page/{{ $porto->id }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 2xl:col-span-9">
                            <div class="grid grid-cols-12 gap-6">
                                <!-- BEGIN: porto Report -->
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
                                                        <textarea name="textatas" id="textatas" rows="5" class="w-full form-control">{{ old('textatas', $porto->textatas) }}</textarea>
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
                                                        <textarea name="engtextatas" id="engtextatas" rows="5" class="w-full form-control">{{ old('engtextatas', $porto->engtextatas) }}</textarea>
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
                                    <div class="flex justify-center flex-col md:flex-row gap-2 mt-5">
                                        <button type="submit" name="action" value="save"
                                            class="btn py-3 btn-primary w-full md:w-52">Save</button>
                                    </div>
                                </div>
                                <!-- END: porto Report -->
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
                                                    <label for="gambar-{{ $porto->id }}" class="form-label">Upload
                                                        Image</label>
                                                    <div
                                                        class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                                        <div class="flex flex-wrap px-4 cursor-pointer"
                                                            id="preview-{{ $porto->id }}">
                                                            <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                            @if ($porto->gambar)
                                                                <div
                                                                    class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                                    <img class="rounded-md" alt="Preview Image"
                                                                        src="/assets/images/portopage/{{ $porto->gambar }}">
                                                                    <div title="Remove this image?"
                                                                        class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                                        onclick="remove({{ $porto->id }}, 'preview')">
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
                                                            <input id="gambar-input-{{ $porto->id }}" name="gambar"
                                                                type="file" accept="image/*"
                                                                class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                                onchange="preview(event, {{ $porto->id }})">
                                                            <input type="hidden" name="hapus_gambar"
                                                                id="hapus-gambar-{{ $porto->id }}" value="0">
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
                                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-0">
                                        <div class="intro-x flex items-center h-10">
                                            <h2 class="text-lg font-medium truncate mr-5">
                                                Banner Bawah
                                            </h2>
                                        </div>
                                        <div class="mt-5">
                                            <div class="intro-x box px-5 py-3 mb-3 flex items-center zoom-in">
                                                <div class="col-span-12 sm:col-span-12">
                                                    <label for="gambar1-{{ $porto->id }}" class="form-label">Upload
                                                        Image</label>
                                                    <div
                                                        class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                                        <div class="flex flex-wrap px-4 cursor-pointer"
                                                            id="preview1-{{ $porto->id }}">
                                                            <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                            @if ($porto->gambar1)
                                                                <div
                                                                    class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                                    <img class="rounded-md" alt="Preview Image"
                                                                        src="/assets/images/portopage/{{ $porto->gambar1 }}">
                                                                    <div title="Remove this image?"
                                                                        class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                                        onclick="remove({{ $porto->id }}, 'preview1')">
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
                                                            <input id="gambar1-input-{{ $porto->id }}" name="gambar1"
                                                                type="file" accept="image/*"
                                                                class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                                onchange="preview(event, {{ $porto->id }})">
                                                            <input type="hidden" name="hapus_gambar1"
                                                                id="hapus-gambar1-{{ $porto->id }}" value="0">
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

    <!-- END: Pagination -->

    <!-- BEGIN: Modal delete -->
    @foreach ($portofolio as $as)
        <div id="delete-modal-preview-{{ $as->id }}" class="modal" tabindex="-1" aria-hidden="true">
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

                            <form action="/dashboard/our-portofolio/{{ $as->id }}" method="post">
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
