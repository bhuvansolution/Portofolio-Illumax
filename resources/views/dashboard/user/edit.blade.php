<!-- BEGIN: Modal Edit Content -->
@foreach ($users as $item)
    <div id="edit-{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Edit User</h2>
                    <div class="dropdown sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                            data-tw-toggle="dropdown">
                            <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                        </a>
                    </div>
                </div>
                <!-- END: Modal Header -->
                <form action="/dashboard/user-management/{{ $item->id }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="name" class="block text-sm font-medium text-gray-700 mt-2">Name</label>
                            <input id="name" name="name" type="text" class="form-control"
                                placeholder="Nama File" value="{{ old('name', $item->name) }}">
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-12"> <label for="title"
                                class="block text-sm font-medium text-gray-700 mt-2">Username
                            </label>
                            <input id="email" name="email" type="text" class="form-control"
                                value="{{ old('email', $item->email) }}" placeholder="Username">
                            @error('email')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-12"> <label for="roles"
                                class="block text-sm font-medium text-gray-700 mt-2">Roles
                            </label>
                            <select id="roles" name="roles" class="form-select">
                                @foreach ($roles as $role)
                                    @if (old('roles', $item->getRoleNames()->first()) == $role->name)
                                        <option value="{{ $role->name }}" selected>{{ $role->name }}</option>
                                    @else
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('roles')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-12"> <label for="title"
                                class="block text-sm font-medium text-gray-700 mt-2">Password
                            </label>
                            <input id="password" name="password" type="text" class="form-control"
                                value="{{ old('password') }}" placeholder="Password">
                            @error('password')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Send</button>
                    </div>
                    <!-- END: Modal Footer -->
                </form>
            </div>
        </div>
    </div>
@endforeach
<!-- END: Modal Content -->
