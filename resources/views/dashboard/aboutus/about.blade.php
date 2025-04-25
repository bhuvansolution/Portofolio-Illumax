@extends('dashboard.layouts.app')
@section('container')
    <form action="/dashboard/aboutus/{{ $aboutus->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: aboutus Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                About Us
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div
                                    class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>About US
                                </div>
                                <div class="mt-5">
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Description</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <textarea name="description" id="description" rows="5" class="w-full form-control">{{ old('description', $aboutus->description) }}</textarea>
                                            @error('description')
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
                                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>Visi Misi
                                </div>
                                <div class="mt-5">
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Visi</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <textarea name="visi" id="visi" rows="5" class="w-full form-control">{{ old('visi', $aboutus->visi) }}</textarea>
                                            @error('visi')
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
                                                    <div class="font-medium">Misi</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <textarea name="misi" id="misi" rows="5" class="w-full form-control">{{ old('misi', $aboutus->misi) }}</textarea>
                                            @error('misi')
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
                                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>Vision and mission
                                </div>
                                <div class="mt-5">
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Vision</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <textarea name="vision" id="vision" rows="5" class="w-full form-control">{{ old('vision', $aboutus->vision) }}</textarea>
                                            @error('vision')
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
                                                    <div class="font-medium">Mission</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <textarea name="mission" id="mission" rows="5" class="w-full form-control">{{ old('mission', $aboutus->mission) }}</textarea>
                                            @error('mission')
                                                <div class="text-danger form-help text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y flex justify-center flex-col md:flex-row gap-2 mt-5">
                            <button type="submit" name="action" value="save"
                                class="btn py-3 btn-primary w-full md:w-52">Save</button>
                        </div>
                    </div>
                    <!-- END: contact Report -->
                </div>
            </div>
            <div class="col-span-12 2xl:col-span-3">
                <div class="2xl:border-l -mb-10 pb-10">
                    <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                        <!-- BEGIN: about us -->
                        <div class="intro-x col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                            <div class="intro-x flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Gambar About Us
                                </h2>
                            </div>
                            <div class="mt-5">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="col-span-12 sm:col-span-12">
                                        <label for="gambar-{{ $aboutus->id }}" class="form-label">Upload Image</label>
                                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                            <div class="flex flex-wrap px-4 cursor-pointer"
                                                id="preview-{{ $aboutus->id }}">
                                                <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                @if ($aboutus->gambar)
                                                    <div
                                                        class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                        <img class="rounded-md" alt="Preview Image"
                                                            src="/assets/images/aboutus/{{ $aboutus->gambar }}">
                                                        <div title="Remove this image?"
                                                            class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                            onclick="remove({{ $aboutus->id }}, 'preview')">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <line x1="18" y1="6" x2="6"
                                                                    y2="18">
                                                                </line>
                                                                <line x1="6" y1="6" x2="18"
                                                                    y2="18">
                                                                </line>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="px-4 pb-4 flex items-center relative cursor-pointer">
                                                <i data-lucide="image" class="w-4 h-4 mr-2 cursor-pointer"></i>
                                                <span class="text-primary mr-1 cursor-pointer">Upload a file</span>
                                                or drag and drop
                                                <input id="gambar-input-{{ $aboutus->id }}" name="gambar"
                                                    type="file" accept="image/*"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                    onchange="preview(event, {{ $aboutus->id }})">
                                                <input type="hidden" name="hapus_gambar"
                                                    id="hapus-gambar-{{ $aboutus->id }}" value="0">
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
                        <!-- END: about us -->
                        <!-- BEGIN: visi -->
                        <div class="intro-x col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-1">
                            <div class="intro-x flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Gambar Visi
                                </h2>
                            </div>
                            <div class="mt-5">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="col-span-12 sm:col-span-12">
                                        <label for="vgambar-{{ $aboutus->id }}" class="form-label">Upload Image</label>
                                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                            <div class="flex flex-wrap px-4 cursor-pointer"
                                                id="vpreview-{{ $aboutus->id }}">
                                                <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                @if ($aboutus->vgambar)
                                                    <div
                                                        class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                        <img class="rounded-md" alt="Preview Image"
                                                            src="/assets/images/aboutus/{{ $aboutus->vgambar }}">
                                                        <div title="Remove this image?"
                                                            class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                            onclick="remove({{ $aboutus->id }}, 'vpreview')">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <line x1="18" y1="6" x2="6"
                                                                    y2="18">
                                                                </line>
                                                                <line x1="6" y1="6" x2="18"
                                                                    y2="18">
                                                                </line>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="px-4 pb-4 flex items-center relative cursor-pointer">
                                                <i data-lucide="image" class="w-4 h-4 mr-2 cursor-pointer"></i>
                                                <span class="text-primary mr-1 cursor-pointer">Upload a file</span>
                                                or drag and drop
                                                <input id="vgambar-input-{{ $aboutus->id }}" name="vgambar"
                                                    type="file" accept="image/*"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                    onchange="preview(event, {{ $aboutus->id }})">
                                                <input type="hidden" name="hapus_vgambar"
                                                    id="hapus-vgambar-{{ $aboutus->id }}" value="0">
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
                        <!-- END: visi -->
                        <!-- BEGIN: Misi -->
                        <div class="intro-x col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                            <div class="intro-x flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Gambar Misi
                                </h2>
                            </div>
                            <div class="mt-5">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="col-span-12 sm:col-span-12">
                                        <label for="mgambar-{{ $aboutus->id }}" class="form-label">Upload Image</label>
                                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                            <div class="flex flex-wrap px-4 cursor-pointer"
                                                id="mpreview-{{ $aboutus->id }}">
                                                <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                @if ($aboutus->mgambar)
                                                    <div
                                                        class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                        <img class="rounded-md" alt="Preview Image"
                                                            src="/assets/images/aboutus/{{ $aboutus->mgambar }}">
                                                        <div title="Remove this image?"
                                                            class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                            onclick="remove({{ $aboutus->id }}, 'mpreview')">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <line x1="18" y1="6" x2="6"
                                                                    y2="18">
                                                                </line>
                                                                <line x1="6" y1="6" x2="18"
                                                                    y2="18">
                                                                </line>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="px-4 pb-4 flex items-center relative cursor-pointer">
                                                <i data-lucide="image" class="w-4 h-4 mr-2 cursor-pointer"></i>
                                                <span class="text-primary mr-1 cursor-pointer">Upload a file</span>
                                                or drag and drop
                                                <input id="mgambar-input-{{ $aboutus->id }}" name="mgambar"
                                                    type="file" accept="image/*"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                    onchange="preview(event, {{ $aboutus->id }})">
                                                <input type="hidden" name="hapus_mgambar"
                                                    id="hapus-mgambar-{{ $aboutus->id }}" value="0">
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
                        <!-- END: Misi -->
                    </div>
                </div>
            </div>
        </div>
    </form>
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
                if (previewPrefix === 'mpreview') kolom = 'mgambar';
                if (previewPrefix === 'vpreview') kolom = 'vgambar';
                if (previewPrefix === 'preview') kolom = 'gambar';

                const hiddenInput = document.getElementById("hapus-" + kolom + "-" + fileId);
                if (hiddenInput) hiddenInput.value = "1";
            }

            // Inisialisasi preview gambar umum, visi, dan misi
            initializePreview('gambar', 'preview');
            initializePreview('vgambar', 'vpreview');
            initializePreview('mgambar', 'mpreview');

            // Inisialisasi ikon lucide
            lucide.createIcons();
        });
    </script>
@endpush
