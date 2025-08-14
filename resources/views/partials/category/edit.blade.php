<section>
    <form action="{{ route('category.update', ['id' => $category->id])}}" method="POST">
        @csrf
        @method('patch')
        <input type="hidden" name="user_id" value="{{ auth()->user->id ?? 1}}">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" autocomplete="given-name">
        <button type="submit">Salvar</button>
    </form>
</section>