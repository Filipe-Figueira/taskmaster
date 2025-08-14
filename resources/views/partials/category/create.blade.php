<section>
    <form action="{{ route('category.store')}}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user->id ?? 1}}">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" autocomplete="given-name">
        <button type="submit">Salvar</button>
    </form>
</section>