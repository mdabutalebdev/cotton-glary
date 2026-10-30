@extends('layouts.admin')

@section('title', 'Owner / Founder')

@section('content')
    <p class="text-slate-500 text-sm mb-6">The "Meet the Owner" profile shown on the About Us page.</p>

    <form method="POST" action="{{ route('admin.owner.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 space-y-4">
                    <h3 class="text-sm font-bold text-slate-900 mb-2 flex items-center gap-2"><i class="fa-solid fa-user-tie text-emerald-600"></i> Profile</h3>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Eyebrow / small label</label>
                        <input type="text" name="eyebrow" value="{{ old('eyebrow', $owner->eyebrow) }}"
                               placeholder="e.g. Meet the Owner"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $owner->name) }}" required
                                   placeholder="e.g. Md. Abdul Karim"
                                   class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Designation</label>
                            <input type="text" name="designation" value="{{ old('designation', $owner->designation) }}"
                                   placeholder="e.g. Proprietor & CEO, Cotton Galary"
                                   class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Paragraph 1</label>
                        <textarea name="paragraph_1" rows="3"
                                  class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ old('paragraph_1', $owner->paragraph_1) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Paragraph 2</label>
                        <textarea name="paragraph_2" rows="3"
                                  class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ old('paragraph_2', $owner->paragraph_2) }}</textarea>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $owner->phone) }}"
                                   placeholder="e.g. +880 1700-000000"
                                   class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                            <input type="email" name="email" value="{{ old('email', $owner->email) }}"
                                   placeholder="e.g. info@cottongalary.com"
                                   class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                        </div>
                    </div>
                    <p class="text-xs text-slate-400">Phone &amp; email appear as contact buttons (leave blank to hide them).</p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                    <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2"><i class="fa-solid fa-image text-emerald-600"></i> Photo</h3>
                    @if ($owner->imageUrl())
                        <div class="mb-3 rounded-lg overflow-hidden border border-slate-200">
                            <img src="{{ $owner->imageUrl() }}" alt="Current photo" class="w-full h-48 object-cover">
                        </div>
                        <label class="flex items-center gap-2 text-xs text-slate-600 mb-3 cursor-pointer">
                            <input type="checkbox" name="remove_image" value="1" class="h-4 w-4 rounded border-slate-300 text-red-600 accent-red-600"> Remove current photo
                        </label>
                    @endif
                    <input type="file" name="image" accept="image/*"
                           class="block w-full text-sm text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer">
                    <p class="text-xs text-slate-400 mt-2">Portrait photo works best · JPG, PNG, WEBP · max 4 MB.</p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-3 rounded-lg transition-colors shadow-sm">
                        <i class="fa-solid fa-floppy-disk"></i> Save Owner Profile
                    </button>
                    <a href="{{ route('about') }}" target="_blank" class="mt-3 w-full inline-flex items-center justify-center gap-2 text-slate-600 hover:text-slate-900 text-sm font-medium px-4 py-2.5">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> Preview on site
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection
