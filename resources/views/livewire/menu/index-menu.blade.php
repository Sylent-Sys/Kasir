<div>
    @include('layouts.title',['title'=>'Menu'])
    <div class="row">
        @each('livewire.menu.card', $data, 'menu')
    </div>
</div>
