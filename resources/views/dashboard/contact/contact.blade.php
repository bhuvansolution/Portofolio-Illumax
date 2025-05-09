@extends('dashboard.layouts.app')
@section('container')
    <form action="/dashboard/contact/{{ $contact->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: contact Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Contact
                            </h2>
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
                                            <textarea name="textatas" id="textatas" rows="5" class="w-full form-control">{{ old('textatas', $contact->textatas) }}</textarea>
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
                                            <textarea name="engtextatas" id="engtextatas" rows="5" class="w-full form-control">{{ old('engtextatas', $contact->engtextatas) }}</textarea>
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
                                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>Information
                                </div>
                                <div class="mt-5">
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Phone</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <input id="phone" name="phone" type="number" class="form-control"
                                                placeholder="628123456789" maxlength="13"
                                                value="{{ old('phone', $contact->phone) }}">
                                            @error('phone')
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
                                                    <div class="font-medium">Whatsapp</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <input id="whatsapp" name="whatsapp" type="number" class="form-control"
                                                placeholder="628123456789" maxlength="13"
                                                value="{{ old('whatsapp', $contact->whatsapp) }}">
                                            @error('whatsapp')
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
                                                    <div class="font-medium">Email</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <input id="email" name="email" type="email" class="form-control"
                                                placeholder="example@gmail.com" value="{{ old('email', $contact->email) }}">
                                            @error('email')
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
                                                    <div class="font-medium">Office</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <textarea name="office" id="office" rows="5" class="w-full form-control">{{ old('office', $contact->office) }}</textarea>
                                            @error('office')
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
                                            <textarea name="textbawah" id="textbawah" rows="5" class="w-full form-control">{{ old('textbawah', $contact->textbawah) }}</textarea>
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
                                            <textarea name="engtextbawah" id="engtextbawah" rows="5" class="w-full form-control">{{ old('engtextbawah', $contact->engtextbawah) }}</textarea>
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
                    <!-- END: contact Report -->
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
                                        <label for="gambar-{{ $contact->id }}" class="form-label">Upload Image</label>
                                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                            <div class="flex flex-wrap px-4 cursor-pointer"
                                                id="preview-{{ $contact->id }}">
                                                <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                @if ($contact->gambar)
                                                    <div
                                                        class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                        <img class="rounded-md" alt="Preview Image"
                                                            src="/assets/images/contact/{{ $contact->gambar }}">
                                                        <div title="Remove this image?"
                                                            class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                            onclick="remove({{ $contact->id }}, 'preview')">
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
                                                <input id="gambar-input-{{ $contact->id }}" name="gambar"
                                                    type="file" accept="image/*"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                    onchange="preview(event, {{ $contact->id }})">
                                                <input type="hidden" name="hapus_gambar"
                                                    id="hapus-gambar-{{ $contact->id }}" value="0">
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
                                        <label for="gambar1-{{ $contact->id }}" class="form-label">Upload Image</label>
                                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                            <div class="flex flex-wrap px-4 cursor-pointer"
                                                id="preview1-{{ $contact->id }}">
                                                <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                @if ($contact->gambar1)
                                                    <div
                                                        class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                        <img class="rounded-md" alt="Preview Image"
                                                            src="/assets/images/contact/{{ $contact->gambar1 }}">
                                                        <div title="Remove this image?"
                                                            class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                            onclick="remove({{ $contact->id }}, 'preview1')">
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
                                                <input id="gambar1-input-{{ $contact->id }}" name="gambar1"
                                                    type="file" accept="image/*"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                    onchange="preview(event, {{ $contact->id }})">
                                                <input type="hidden" name="hapus_gambar1"
                                                    id="hapus-gambar1-{{ $contact->id }}" value="0">
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
