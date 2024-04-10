<!DOCTYPE html>
<html class="no-js" lang="en">

<body>

    @include('layouts.head')
    @include('layouts.header')
    @include('layouts.headsection')

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="container py-5 d-md-block">
        <div class="text-center shadow-lg rounded py-4">
          <h3 class="py-3">Projets en financement</h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($enterprises as $enterprise)
                    <div class="col"> 
                        <div class="card h-100 text-center">
                            <img src="{{ asset('assets/images/banner/ban1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $enterprise->name_enterprise }}</h5>
                                <p class="sec-title">Objectif : {{ $enterprise->objectif }}</p>
                                <p class="card-text text-success">Montant actuel: {{ $enterprise->montant_actuel }}</p>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                                <div class="card-footer d-flex  text-right justify-content-center">
                                    <a href="{{ route('invest.create', ['enterprise' => $enterprise->id]) }}"
                                        class="btn btn-success btn-lg btn-block">
                                        Investir </a>
                                    <a href="{{route('enterprise.show', ['enterprise' => $enterprise->id])}}" class="btn btn-warning btn-lg btn-block">Details</a>

                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Modifier il y'a {{ $enterprise->created_at }}</small>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

@include('layouts.footer')

</html>