@extends('dashboard.layouts.app')
@section('container')
    <form action="/dashboard/why-choose/{{ $whychoose->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-12 gap-6">
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
                                <div
                                    class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>{{ $title }}
                                </div>
                                <div id="formContainer" class="mt-5 form-group">
                                    @forelse ($whychoose->description as $key => $description)
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
    </script>
@endpush
