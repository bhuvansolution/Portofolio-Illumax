@extends('dashboard.layouts.app')
@section('container')
    <form action="/dashboard/why-choose/{{ $whychoose->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-10 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: contact Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                {{ $title }}
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="font-medium text-base flex items-center  dark:border-darkmode-400 pb-5">
                                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>{{ $title }}
                                </div>
                                <div id="formContainer" class="mt-5 form-group">
                                    @forelse ($whychoose->gambar as $key => $gambar)
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
                                                                src="{{ asset('assets/images/whychoose/' . $gambar) }}">
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
                                                        <input type="file" name="gambar[]" accept="image/*"
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
                                                    <input id="title" name="title[]" type="text" class="form-control"
                                                        placeholder="Title" value="{{ $whychoose->title[$key] }}">
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
                                                    <textarea name="description[]" id="description" rows="5" class="w-full form-control">{{ $whychoose->description[$key] }}</textarea>
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
                                                        value="{{ $whychoose->engtitle[$key] }}">
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
                                                    <textarea name="engdescription[]" id="engdescription" rows="5" class="w-full form-control">{{ $whychoose->engdescription[$key] }}</textarea>
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
                                                    <input type="file" name="gambar[]" accept="image/*"
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

                </div>
            </div>
        </div>
    </form>
@endsection

@push('script')
    <script>
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
        document.getElementById('tambahBtn').addEventListener('click', function() {
            const formContainer = document.getElementById('formContainer');

            const newForm = document.createElement('div');
            newForm.classList.add('form-group', 'mt-5', 'pt-5', 'border-t', 'border-slate-200/60',
                'dark:border-darkmode-400', 'pb-5');
            newForm.innerHTML = `
            <div class="form-inline items-start flex-col xl:flex-row mt-10">
                <div class="form-label w-full xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Gambar</div>
                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">Required</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed rounded-md pt-4">
                    <div class="grid grid-cols-10 gap-5 pl-4 pr-5 preview-thumbnail"></div>
                    <div class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                        <i data-lucide="image" class="w-4 h-4 mr-2"></i>
                        <span class="text-primary mr-1">Upload a file</span> or drag and drop
                        <input type="file" name="gambar[]" accept="image/*" class="thumbnail-input w-full h-full top-0 left-0 absolute opacity-0" onchange="previewImagethumbnail(event)">
                    </div>
                </div>
            </div>
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                <div class="form-label xl:w-64 xl:!mr-10"><div class="text-left"><div class="font-medium">Title (Indonesia)</div></div></div>
                <div class="w-full mt-3 xl:mt-0 flex-1"><input type="text" name="title[]" class="form-control" placeholder="Title"></div>
            </div>
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                <div class="form-label xl:w-64 xl:!mr-10"><div class="text-left"><div class="font-medium">Description (Indonesia)</div></div></div>
                <div class="w-full mt-3 xl:mt-0 flex-1"><textarea name="description[]" class="form-control" rows="5"></textarea></div>
            </div>
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                <div class="form-label xl:w-64 xl:!mr-10"><div class="text-left"><div class="font-medium">Title (Inggris)</div></div></div>
                <div class="w-full mt-3 xl:mt-0 flex-1"><input type="text" name="engtitle[]" class="form-control" placeholder="Title (English)"></div>
            </div>
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                <div class="form-label xl:w-64 xl:!mr-10"><div class="text-left"><div class="font-medium">Description (Inggris)</div></div></div>
                <div class="w-full mt-3 xl:mt-0 flex-1"><textarea name="engdescription[]" class="form-control" rows="5"></textarea></div>
            </div>
            <div class="flex justify-end mt-3">
                <button type="button" class="removeBtn px-4 py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition">
                    Hapus
                </button>
            </div>
        `;
            formContainer.appendChild(newForm);
        });

        // Event delegation for remove button
        document.getElementById('formContainer').addEventListener('click', function(e) {
            if (e.target.closest('.removeBtn')) {
                e.target.closest('.form-group').remove();
            }
        });
    </script>
@endpush
