<div>
    @include('layouts.title',['title'=>'Menu'])
    <div class="mb-3">
        <a href="{{ route('menu.add') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i></a>
    </div>
    <div class="row">
        @foreach ($data as $item)
            @include('livewire.menu.card',['menu'=>$item,'options'=>['menu'=>true]])
        @endforeach
    </div>
</div>
