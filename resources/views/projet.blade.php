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
                        <img src="{{ asset('storage/'.$enterprise->image) }}" class="d-block mx-auto w-50" style="width: 400px; height: 200px;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $enterprise->name_enterprise }}</h5>
                            <p class="sec-title">Objectif : {{ $enterprise->objectif }}</p>
                            <p class="card-text text-success">Montant actuel: {{ $enterprise->montant_actuel }}
                            </p>
                             
                            <div class="row justify-content-center">
                                <div class="col-md-9">
                                    <a href="#" class="btn btn-success btn-lg float-start btn-block"> <div id="countdown">{{$date}}</div></a>
                                </div>
                            </div>

                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$enterprise->progress}};">{{$enterprise->bar}}%</div>
                            </div>
                            <div class="card-footer">
                                <div class="clearfix">
                                    <a href="{{ route('invest.create', ['enterprise' => $enterprise->id]) }}" class="btn btn-success btn-lg float-start btn-block">Investir</a>
                                    <a href="{{ route('enterprise.show', ['enterprise' => $enterprise->id]) }}" class="btn btn-warning btn-lg btn-block float-end">Details</a>
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
  
    <script> 
        var targetDate = "{{ $date }}";  
 
        function formatNumber(number) {
            return number < 10 ? "0" + number : number;
        }
 
        function updateCountdown() {
            var countdownElement = document.getElementById("countdown");
            var currentDate = new Date();
            var targetDateTime = new Date(targetDate).getTime();
            var remainingTime = targetDateTime - currentDate.getTime() ;
 
            var months = Math.floor(remainingTime / (1000 * 60 * 60 * 24 * 30));
            var days = Math.floor((remainingTime % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24));
            var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
 
            countdownElement.innerHTML = months + " mois, " + days + " jours, " +
                formatNumber(hours) + ":" + formatNumber(minutes) + ":" + formatNumber(seconds);
 
            if (remainingTime < 0) {
                countdownElement.innerHTML = "Compte à rebours terminé !";
                clearInterval(countdownInterval);
            }
        }
 
        updateCountdown(); 
        var countdownInterval = setInterval(updateCountdown, 1000);
    </script>

</body>

@include('layouts.footer')

</html>