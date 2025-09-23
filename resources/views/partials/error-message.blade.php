@if ($errors->any())
<div class="bg-red-900/70 text-red-100 p-3 rounded-lg mb-4">
    <ul class="font-medium ml-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif