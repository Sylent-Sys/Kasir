<div>
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1>Dashboard</h1>
    </div>
    @can('admin')
        @include('livewire.dashboard.admin')
    @endcan
    @canany(['pengguna','waiter','kasir','owner'])
        @include('livewire.dashboard.guest')
    @endcanany
</div>
