<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Setting') }}
                </h2>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.setting.index') }}">Setting</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="card-header">
                <h5 class="card-title">Edit Setting</h5>
            </div>
            <form action="{{ route('admin.setting.update', $setting->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $setting->name)" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $setting->email)" autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                :value="old('address', $setting->address)" autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="phone" :value="__('phone')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="old('phone', $setting->phone)" autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="logo" :value="__('logo')" />
                            <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo"
                                :value="old('logo')" autocomplete="logo" />
                            @if ($setting->logo)
                                <img src="{{ $setting->logo }}" alt="" style="width:100px;">
                            @endif
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="favicon" :value="__('favicon')" />
                            <x-text-input id="favicon" class="block mt-1 w-full" type="file" name="favicon"
                                :value="old('favicon')" autocomplete="favicon" />
                            @if ($setting->favicon)
                                <img src="{{ $setting->favicon }}" alt="" style="width:100px;">
                            @endif
                            <x-input-error :messages="$errors->get('favicon')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="meta_title" :value="__('Meta Title')" />
                            <x-text-input id="meta_title" class="block mt-1 w-full" type="text" name="meta_title"
                                :value="old('meta_title', $setting->meta_title)" autocomplete="meta_title" />
                            <x-input-error :messages="$errors->get('meta_title')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="meta_keyword" :value="__('Meta Keyword')" />
                            <x-text-input id="meta_keyword" class="block mt-1 w-full" type="text" name="meta_keyword"
                                :value="old('meta_keyword', $setting->meta_keyword)" autocomplete="meta_keyword" />
                            <x-input-error :messages="$errors->get('meta_keyword')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="meta_description" :value="__('Meta Description')" />
                            <textarea name="meta_description" id="meta_description" class="form-control" rows="5">{{ old('meta_description', $setting->meta_description) }}</textarea>
                            <x-input-error :messages="$errors->get('meta_description')" class="mt-2" />
                        </div>
                        <div class="col-md-6 form-group">
                            <x-input-label for="google_analytics" :value="__('Google Analytics')" />
                            <textarea name="google_analytics" id="google_analytics" class="form-control" rows="5">{{ old('google_analytics', $setting->google_analytics) }}</textarea>
                            <x-input-error :messages="$errors->get('google_analytics')" class="mt-2" />
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
