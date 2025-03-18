@props(['type' => 'success', 'message' => ''])

@if(session('message'))
@php
$alertTypes = [
'success' => 'bg-green-100 border-green-500 text-green-700',
'error' => 'bg-red-100 border-red-500 text-red-700',
'warning' => 'bg-yellow-100 border-yellow-500 text-yellow-700',
'info' => 'bg-blue-100 border-blue-500 text-blue-700',
];
$alertClass = $alertTypes[session('type') ?? 'success'];
@endphp

<div id="flashMessage"
    class="fixed top-5 right-5 px-4 py-3 border-l-4 rounded-md shadow-lg transition-opacity duration-500 {{ $alertClass }}">
    <div class="flex items-center">
        <span class="flex-1">{{ session('message') }}</span>
        <button onclick="hideFlash()" class="ml-3 text-lg font-bold">&times;</button>
    </div>
</div>

<script>
    function hideFlash() {
            document.querySelector("#flashMessage").classList.add('hidden');
        }

        setTimeout(() => {
            hideFlash();
        }, 3000);
</script>
@endif