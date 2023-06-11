<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Edit Portfolio') }}
                </h2>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.index') }}">Portfolio</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="card-header">
                <h5 class="card-title">Edit Portfolio</h5>
                <div class="card-tools">
                </div>
            </div>
            <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $portfolio->name)" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $portfolio->email)" autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                :value="old('address', $portfolio->address)" autofocus autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="phone" :value="__('phone')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="old('phone', $portfolio->phone)" autofocus autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="cv" :value="__('CV')" />
                            <x-text-input id="cv" class="block mt-1 w-full" type="file" name="cv_file"
                                autocomplete="cv" accept=".doc, .pdf, .docx" />
                            @if ($portfolio->cv)
                                <a href="{{ $portfolio->cv }}" target="_blank">Download</a>
                            @endif
                            <x-input-error :messages="$errors->get('cv_file')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="cover_letter" :value="__('cover_letter')" />
                            <x-text-input id="cover_letter" class="block mt-1 w-full" type="file"
                                name="cover_letter_file" autocomplete="cover_letter" accept=".doc, .pdf, .docx" />
                            @if ($portfolio->cover_letter)
                                <a href="{{ $portfolio->cover_letter }}" target="_blank">Download</a>
                            @endif
                            <x-input-error :messages="$errors->get('cover_letter_file')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="facebook" :value="__('Facebook Profile')" />
                            <x-text-input id="facebook" class="block mt-1 w-full" type="text" name="facebook"
                                :value="old('facebook', $portfolio->facebook)" autofocus autocomplete="facebook" />
                            <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="linkedin" :value="__('Linkedin Profile')" />
                            <x-text-input id="linkedin" class="block mt-1 w-full" type="text" name="linkedin"
                                :value="old('linkedin', $portfolio->linkedin)" autofocus autocomplete="linkedin" />
                            <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="youtube" :value="__('Youtube Profile')" />
                            <x-text-input id="youtube" class="block mt-1 w-full" type="text" name="youtube"
                                :value="old('youtube', $portfolio->youtube)" autofocus autocomplete="youtube" />
                            <x-input-error :messages="$errors->get('youtube')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="bio" :value="__('Bio')" />
                            <textarea name="bio" id="bio" class="form-control" rows="5">{{ $portfolio->bio }}</textarea>
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" id="status" class="block mt-1 w-full">
                                <option value="0">No</option>
                                <option value="1" @if (old('status', $portfolio->status) == 1) selected @endif>Yes</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
