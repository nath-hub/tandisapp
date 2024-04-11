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
                            <img src="{{ asset('storage/'.$enterprise->image) }}" class="d-block mx-auto w-50"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $enterprise->name_enterprise }}</h5>
                                <p class="sec-title">Objectif : {{ $enterprise->objectif }}</p>
                                <p class="card-text text-success">Montant actuel: {{ $enterprise->montant_actuel }}
                                </p>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$enterprise->progress}};">{{$enterprise->bar}}%</div>
                                  </div>
                                <div class="card-footer">
                                    <div class="clearfix">
                                        <a href="{{ route('invest.create', ['enterprise' => $enterprise->id]) }}"
                                            class="btn btn-success btn-lg float-start btn-block">Investir</a>
                                        <a href="{{ route('enterprise.show', ['enterprise' => $enterprise->id]) }}"
                                            class="btn btn-warning btn-lg btn-block float-end">Details</a>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Modifier il y'a {{ $enterprise->date }}</small>
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