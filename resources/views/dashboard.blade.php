<x-app-layout>
    @section('title')Dashboard @endsection
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="row text-center">
                <div class="col-6">
                    <h5>Jumlah Logistik</h5>
                    <p>{{ $totalLogistic }}</p>
                </div>
                <div class="col-6">
                    <h5>Jumlah Produksi</h5>
                    <p>{{ $totalProduction }}</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
