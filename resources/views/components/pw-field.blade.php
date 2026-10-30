{{--
    Password input with a show/hide eye toggle. Framework-agnostic: the toggle
    button uses inline styles + inline SVG so it works on the standalone auth pages
    (own CSS, no FontAwesome) AND inside the Tailwind admin layout.
    Pass `class` to style the input; the toggle script is emitted once per page.

    Usage: <x-pw-field name="password" autocomplete="new-password" class="..." />
--}}
@props([
    'name',
    'id' => null,
    'autocomplete' => 'current-password',
    'required' => true,
    'placeholder' => null,
])
@php $fieldId = $id ?? $name; @endphp

<div style="position:relative;">
    <input
        type="password"
        name="{{ $name }}"
        id="{{ $fieldId }}"
        autocomplete="{{ $autocomplete }}"
        @required($required)
        @if ($placeholder) placeholder="{{ $placeholder }}" @endif
        {{ $attributes->merge(['style' => 'padding-right:44px;']) }}
    >
    <button type="button" class="cg-pw-toggle" data-pw-target="{{ $fieldId }}" tabindex="-1"
            aria-label="Show or hide password"
            style="position:absolute; top:50%; right:12px; transform:translateY(-50%); display:inline-flex; align-items:center; justify-content:center; background:none; border:0; padding:2px; margin:0; cursor:pointer; color:#94a3b8; line-height:0;">
        <svg class="cg-eye-open" xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
        <svg class="cg-eye-off" style="display:none;" xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 19c-7 0-11-7-11-7a18.5 18.5 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 5c7 0 11 7 11 7a18.5 18.5 0 0 1-2.16 3.19M1 1l22 22"/></svg>
    </button>
</div>

@once
    <script>
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.cg-pw-toggle');
            if (!btn) return;
            var input = document.getElementById(btn.getAttribute('data-pw-target'));
            if (!input) return;
            var reveal = input.type === 'password';
            input.type = reveal ? 'text' : 'password';
            btn.querySelector('.cg-eye-open').style.display = reveal ? 'none' : '';
            btn.querySelector('.cg-eye-off').style.display = reveal ? '' : 'none';
        });
    </script>
@endonce
