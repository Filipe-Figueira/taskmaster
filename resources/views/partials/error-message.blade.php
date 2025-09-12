@if ($errors->any())
<div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4">
    <ul class="list-disc ml-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif