<div>
    @include('layouts.title',['title'=>'Menu'])
    <div class="mb-3">
        <a href="{{ route('menu.add') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i></a>
    </div>
    <div class="row">
        @each('livewire.menu.card', $data, 'menu')
    </div>
</div>
