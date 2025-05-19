@extends('dashboard.layouts.app')
@section('container')
    <div class="mt-8 mb-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2 mb-8">
                {{ $title }}
            </h2>
        </div>
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Inbox Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-slate-500" data-lucide="search"></i>
                    <input type="text" class="form-control w-full sm:w-64 box px-10" placeholder="Search mail">
                </div>
            </div>
            <!-- END: Inbox Filter -->

            <!-- BEGIN: Inbox Content -->
            <div class="intro-y inbox box mt-5">
                <div class="p-5 flex flex-col-reverse sm:flex-row text-slate-500 border-b border-slate-200/60">
                    <div
                        class="flex items-center mt-3 sm:mt-0 border-t sm:border-0 border-slate-200/60 pt-5 sm:pt-0 mt-5 sm:mt-0 -mx-5 sm:mx-0 px-5 sm:px-0">
                        <input id="checkbox-all" class="form-check-input" type="checkbox">
                        <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center" data-tw-toggle="modal"
                            data-tw-target="#delete-modal-preview">
                            <i class="w-4 h-4" data-lucide="trash-2"></i>
                        </a>
                    </div>
                    <div class="flex items-center sm:ml-auto">
                        <div class="">1 - 50 of 5,238</div>
                        <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                        <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center">
                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto sm:overflow-x-visible">
                    <form id="delete-form" action="{{ route('pesan.delete.selected') }}" method="post">
                        @csrf
                        @method('DELETE')
                        @forelse ($pesans as $pesan)
                            <div class="intro-y">
                                <label for="checkbox-{{ $pesan->id }}"
                                    class="cursor-pointer inbox__item inbox__item--active inline-block sm:block text-slate-600 dark:text-slate-500 bg-slate-100 dark:bg-darkmode-400/70 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <div class="flex px-5 py-3">
                                        <div class="w-72 flex-none flex items-center mr-5">
                                            <input id="checkbox-{{ $pesan->id }}" name="ids[]"
                                                class="form-check-input flex-none checkbox-item" type="checkbox"
                                                value="{{ $pesan->id }}">
                                            <div class="inbox__item--sender truncate ml-3">{{ $pesan->email }}</div>
                                        </div>
                                        <div class="w-64 sm:w-auto truncate">
                                            <span class="inbox__item--highlight">
                                                {{ Str::limit(strip_tags($pesan->message), 150) }}
                                            </span>
                                        </div>
                                        <div class="inbox__item--time whitespace-nowrap ml-auto pl-10">
                                            {{ $pesan->created_at->format('H:i') }}
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @empty
                            <div class="intro-y text-center mt-5">
                                <p class="text-gray-500">Tidak ada pesan yang ditemukan.</p>
                            </div>
                        @endforelse
                    </form> {{-- ✅ Form ditutup di sini --}}

                    <!-- BEGIN: Modal Delete -->
                    <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="p-5 text-center">
                                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">Apa Kamu Yakin?</div>
                                        <div class="text-slate-500 mt-2">
                                            Benar-benar ingin menghapusnya?<br>Proses ini tidak dapat dibatalkan.
                                        </div>
                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                        <button type="button" data-tw-dismiss="modal"
                                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                        <button type="button" id="confirm-delete"
                                            class="btn btn-danger w-24">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Modal Delete -->

                </div>
                <div class="p-5 flex flex-col sm:flex-row items-center text-center sm:text-left text-slate-500">
                    <!-- Footer info if needed -->
                </div>
            </div>
            <!-- END: Inbox Content -->
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Pilih semua checkbox
        document.getElementById('checkbox-all').addEventListener('change', function() {
            document.querySelectorAll('.checkbox-item').forEach(cb => {
                cb.checked = this.checked;
            });
        });

        // Submit form ketika klik tombol delete
        document.getElementById('confirm-delete').addEventListener('click', function() {
            document.getElementById('delete-form').submit();
        });
    </script>
@endpush
