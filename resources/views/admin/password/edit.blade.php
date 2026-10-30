@extends('layouts.admin')

@section('title', 'Change Password')

@section('content')
    <div class="max-w-2xl">
        <p class="text-sm text-slate-500 mb-6">
            Update the password you use to sign in to the admin panel. Your login email
            (<span class="font-medium text-slate-700">{{ auth()->user()->email }}</span>) cannot be changed here.
        </p>

        <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 space-y-4">
                <div>
                    <label for="current_password" class="block text-sm font-medium text-slate-700 mb-1.5">Current password <span class="text-red-500">*</span></label>
                    <x-pw-field name="current_password" id="current_password" autocomplete="current-password"
                        class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">New password <span class="text-red-500">*</span></label>
                    <x-pw-field name="password" id="password" autocomplete="new-password"
                        class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none" />
                    <p class="text-xs text-slate-400 mt-1">At least 8 characters.</p>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1.5">Confirm new password <span class="text-red-500">*</span></label>
                    <x-pw-field name="password_confirmation" id="password_confirmation" autocomplete="new-password"
                        class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none" />
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors shadow-sm">
                    <i class="fa-solid fa-key"></i> Update Password
                </button>
            </div>
        </form>
    </div>
@endsection
