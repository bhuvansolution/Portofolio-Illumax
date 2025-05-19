@extends('dashboard.layouts.app')
@section('container')
    <form action="/dashboard/our-service/{{ $service->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: contact Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Our Service
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
                                            <textarea name="textatas" id="textatas" rows="5" class="w-full form-control">{{ old('textatas', $service->textatas) }}</textarea>
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
                                            <textarea name="engtextatas" id="engtextatas" rows="5" class="w-full form-control">{{ old('engtextatas', $service->engtextatas) }}</textarea>
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
                                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>Service Brand
                                </div>
                                <div id="formContainer1" class="mt-5 form-group">
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Text Brand (Indonesia)</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <textarea name="brand" id="brand" rows="5" class="w-full form-control">{{ old('brand', $service->brand) }}</textarea>
                                            @error('brand')
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
                                                    <div class="font-medium">Text Brand (Inggris)</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <textarea name="engbrand" id="engbrand" rows="5" class="w-full form-control">{{ old('engbrand', $service->engbrand) }}</textarea>
                                            @error('engbrand')
                                                <div class="text-danger form-help text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @foreach ($service->icon as $key => $icon)
                                        <div
                                            class="form-group mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400 pb-5">
                                            <div class="form-inline items-start flex-col xl:flex-row mt-10">
                                                <div class="form-label w-full xl:w-64 xl:!mr-10">
                                                    <div class="text-left">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Gambar</div>
                                                            <div
                                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                Required</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                                    <div class="grid grid-cols-10 gap-5 pl-4 pr-5 preview-thumbnail">
                                                        <div
                                                            class="w-40 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                            <img class="rounded-md" alt="Preview Image"
                                                                src="{{ asset('assets/images/service/' . $icon) }}">
                                                            <div title="Remove this image?"
                                                                class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2 remove-thumbnail">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <line x1="18" y1="6" x2="6"
                                                                        y2="18"></line>
                                                                    <line x1="6" y1="6" x2="18"
                                                                        y2="18"></line>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                                                        <i data-lucide="image" class="w-4 h-4 mr-2"></i>
                                                        <span class="text-primary mr-1">Upload a file</span> or drag and
                                                        drop
                                                        <input type="file" name="icon[]" accept="image/*"
                                                            class="thumbnail-input w-full h-full top-0 left-0 absolute opacity-0"
                                                            onchange="previewImagethumbnail(event)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                <div class="form-label xl:w-64 xl:!mr-10">
                                                    <div class="text-left">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Service (Indonesia)</div>
                                                            <div
                                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                Required</div>
                                                        </div>
                                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    <input id="text" name="text[]" type="text"
                                                        class="form-control" placeholder="text"
                                                        value="{{ $service->text[$key] }}">
                                                    @error('text')
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
                                                            <div class="font-medium">Service (Inggris)</div>
                                                            <div
                                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                Required</div>
                                                        </div>
                                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    <input id="engtext" name="engtext[]" type="text"
                                                        class="form-control" placeholder="engtext"
                                                        value="{{ $service->engtext[$key] }}">
                                                    @error('engtext')
                                                        <div class="text-danger form-help text-left">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex justify-end mt-3">
                                                <button type="button"
                                                    class="removeBtn1 px-4 py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition">
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Tombol Tambah -->
                            <div class="flex justify-center w-full mt-5">
                                <button href="#" class="btn py-2 px-4 btn-outline-secondary w-full md:w-24 text-xs"
                                    id="tambahBtn1" type="button"><i data-lucide="plus"></i></button>
                            </div>
                        </div>

                        <div class="intro-y box p-5 mt-5">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div
                                    class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>Our Service
                                </div>
                                <div id="formContainer" class="mt-5 form-group">
                                    @forelse ($service->description as $key => $description)
                                        <div
                                            class="form-group mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400 pb-5">
                                            <div
                                                class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                <div class="form-label xl:w-64 xl:!mr-10">
                                                    <div class="text-left">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Title (Indonesia)</div>
                                                            <div
                                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                Required</div>
                                                        </div>
                                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    <input id="title" name="title[]" type="text"
                                                        class="form-control" placeholder="Title"
                                                        value="{{ $service->title[$key] }}">
                                                    @error('title')
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
                                                            <div class="font-medium">Description (Indonesia)</div>
                                                            <div
                                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                Required</div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    <textarea name="description[]" id="description" rows="5" class="w-full form-control">{{ $description }}</textarea>
                                                    @error('description')
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
                                                            <div class="font-medium">Title (Inggris)</div>
                                                            <div
                                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                Required</div>
                                                        </div>
                                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    <input id="engtitle" name="engtitle[]" type="text"
                                                        class="form-control" placeholder="engTitle"
                                                        value="{{ $service->engtitle[$key] }}">
                                                    @error('engtitle')
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
                                                            <div class="font-medium">Description (Inggris)</div>
                                                            <div
                                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                Required</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    <textarea name="engdescription[]" id="engdescription" rows="5" class="w-full form-control">{{ $service->engdescription[$key] }}</textarea>
                                                    @error('engdescription')
                                                        <div class="text-danger form-help text-left">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex justify-end mt-3">
                                                <button type="button"
                                                    class="removeBtn px-4 py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition">
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    @empty
                                        <div
                                            class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label xl:w-64 xl:!mr-10">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Title</div>
                                                        <div
                                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required</div>
                                                    </div>
                                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <input id="title" name="title[]" type="text" class="form-control"
                                                    placeholder="Title" value="{{ old('title.0') }}">
                                                @error('title')
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
                                                        <div class="font-medium">Description</div>
                                                        <div
                                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required</div>
                                                    </div>
                                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                                        <div>Enter a description in English</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <textarea name="description[]" id="description" rows="5" class="w-full form-control">{{ old('description.0') }}</textarea>
                                                @error('description')
                                                    <div class="text-danger form-help text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <!-- Tombol Tambah -->
                            <div class="flex justify-center w-full mt-5">
                                <button href="#" class="btn py-2 px-4 btn-outline-secondary w-full md:w-24 text-xs"
                                    id="tambahBtn" type="button"><i data-lucide="plus"></i></button>
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
                                        <label for="gambar-{{ $service->id }}" class="form-label">Upload Image</label>
                                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                            <div class="flex flex-wrap px-4 cursor-pointer"
                                                id="preview-{{ $service->id }}">
                                                <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                @if ($service->gambar)
                                                    <div
                                                        class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                        <img class="rounded-md" alt="Preview Image"
                                                            src="/assets/images/service/{{ $service->gambar }}">
                                                        <div title="Remove this image?"
                                                            class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                            onclick="remove({{ $service->id }}, 'preview')">
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
                                                <input id="gambar-input-{{ $service->id }}" name="gambar"
                                                    type="file" accept="image/*"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                    onchange="preview(event, {{ $service->id }})">
                                                <input type="hidden" name="hapus_gambar"
                                                    id="hapus-gambar-{{ $service->id }}" value="0">
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
        document.getElementById('tambahBtn').addEventListener('click', function() {
            // Mendapatkan container form
            var formContainer = document.getElementById('formContainer');
            var index = formContainer.children.length; // Mendapatkan jumlah form yang sudah ada

            // Membuat elemen baru untuk ditambahkan
            var newForm = `
                        <div class="form-group mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Title (Indonesia)</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="title" name="title[]" type="text" class="form-control" placeholder="Title"
                                        value="{{ old('title') }}">
                                    @error('title')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Description (Indonesia)</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                            <div>Enter a description in English</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <textarea name="description[]" id="description" rows="5" class="w-full form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                              <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Title (Inggris)</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="engtitle" name="engtitle[]" type="text" class="form-control" placeholder="Title"
                                        value="{{ old('engtitle') }}">
                                    @error('engtitle')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Description (Inggris)</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <textarea name="engdescription[]" id="engdescription" rows="5" class="w-full form-control">{{ old('engdescription') }}</textarea>
                                    @error('engdescription')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-end mt-3">
                                <button type="button"
                                    class="removeBtn px-4 py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition">
                                    Hapus
                                </button>
                            </div>
                        </div>
                        `;

            // Menyisipkan form baru ke dalam container
            formContainer.insertAdjacentHTML('beforeend', newForm);

            // Tambahkan event listener untuk tombol hapus
            updateRemoveEvent();
        });
        // Fungsi untuk update event listener pada tombol hapus
        function updateRemoveEvent() {
            document.querySelectorAll('.removeBtn').forEach(button => {
                button.addEventListener('click', function() {
                    // Menghapus elemen pembungkus utama yang berisi semua field input
                    this.closest('.form-group').remove();
                });
            });
        }

        updateRemoveEvent(); // Panggil pertama kali agar event listener bekerja di elemen awal
        function previewImagethumbnail(event) {
            const input = event.target;
            const previewContainer = input.closest('.form-group').querySelector('.preview-thumbnail');
            previewContainer.innerHTML = '';
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewContainer.innerHTML = `
                    <div class="w-40 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                        <img class="rounded-md" src="${e.target.result}" alt="Preview Image">
                        <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2 remove-thumbnail">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                `;
                };
                reader.readAsDataURL(file);
            }
        }

        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.remove-thumbnail'); // cek apakah yang diklik adalah tombol remove
            if (btn) {
                const wrapper = btn.closest('.image-fit'); // bungkus <div> gambar
                if (wrapper) wrapper.remove(); // hapus dari tampilan
            }
        });
        document.getElementById('tambahBtn1').addEventListener('click', function() {
            const formContainer1 = document.getElementById('formContainer1');

            const newForm = document.createElement('div');
            newForm.classList.add('form-group', 'mt-5', 'pt-5', 'border-t', 'border-slate-200/60',
                'dark:border-darkmode-400', 'pb-5');
            newForm.innerHTML = `
            <div class="form-inline items-start flex-col xl:flex-row mt-10">
                <div class="form-label w-full xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Gambar</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                    </div>
                </div>

                <div
                    class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                    <div class="grid grid-cols-10 gap-5 pl-4 pr-5 preview-thumbnail">
                     
                    </div>
                    <div
                        class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                        <i data-lucide="image" class="w-4 h-4 mr-2"></i>
                        <span class="text-primary mr-1">Upload a file</span> or drag and
                        drop
                        <input type="file" name="icon[]" accept="image/*"
                            class="thumbnail-input w-full h-full top-0 left-0 absolute opacity-0"
                            onchange="previewImagethumbnail(event)">
                    </div>
                </div>
            </div>
            <div
                class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Service (Indonesia)</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="text" name="text[]" type="text"
                        class="form-control" placeholder="text"
                        >
                    @error('text')
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
                            <div class="font-medium">Service (Inggris)</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="engtext" name="engtext[]" type="text"
                        class="form-control" placeholder="engtext"
                        >
                    @error('engtext')
                        <div class="text-danger form-help text-left">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end mt-3">
                <button type="button"
                    class="removeBtn1 px-4 py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition">
                    Hapus
                </button>
            </div>
        `;
            formContainer1.appendChild(newForm);
        });

        // Event delegation for remove button
        document.getElementById('formContainer1').addEventListener('click', function(e) {
            if (e.target.closest('.removeBtn1')) {
                e.target.closest('.form-group').remove();
            }
        });
    </script>
@endpush
