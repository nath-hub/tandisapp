<!DOCTYPE html>
<html class="no-js" lang="en">

<body>

    @include('layouts.head')
    @include('layouts.header')
    @include('layouts.headsection')

    <table class="table caption-top">
        <caption>Modifier les informations de l'entreprise</caption>

        <form action="{{route('phases.update', $phase->id)}}" method="POST">
            @csrf
            @method('PUT')

            <tbody>
                <tr>
                    <th scope="row">phase : </th>
                    <td>
                        <div class="col-12">
                            <div class="form-group border " style="border-radius: 10px;">
                                <input type="text" placeholder="phase" class="form-control" value="{{ $phase->phase }}"
                                    name="phases" aria-describedby="phasesHelp">
                                @if ($errors->has('phases'))
                                    <span class="text-danger text-left">{{ $errors->first('phases') }}</span>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">date de debut : </th>
                    <td>
                        <div class="col-12">
                            <div class="form-group border " style="border-radius: 10px;">
                                <input type="date" placeholder="date de debut" class="form-control"
                                    value="{{ $phase->date_debut }}" name="date_debut"
                                    aria-describedby="date_debutHelp">
                                @if ($errors->has('date_debut'))
                                    <span class="text-danger text-left">{{ $errors->first('date_debut') }}</span>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">date_fin : </th>
                    <td>
                        <div class="col-12">
                            <div class="form-group border " style="border-radius: 10px;">
                                <input type="date" placeholder="date_fin" class="form-control"
                                    value="{{ $phase->date_fin }}" name="date_fin" aria-describedby="date_finHelp">
                                @if ($errors->has('date_fin'))
                                    <span class="text-danger text-left">{{ $errors->first('date_fin') }}</span>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">prix de la phase : </th>
                    <td>
                        <div class="col-12">
                            <div class="form-group border " style="border-radius: 10px;">
                                <input type="number" placeholder="prix de la phase" class="form-control"
                                    value="{{ $phase->prix_phase }}" name="prix_phase"
                                    aria-describedby="prix_phaseHelp">
                                @if ($errors->has('prix_phase'))
                                    <span class="text-danger text-left">{{ $errors->first('prix_phase') }}</span>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th scope="row">prix d'une action : </th>
                    <td>
                        <div class="col-12">
                            <div class="form-group border " style="border-radius: 10px;">
                                <input type="number" placeholder="prix d'une action" class="form-control"
                                    name="prix_action" aria-describedby="prix_actionHelp"
                                    value="{{ $phase->prix_action }}">
                                @if ($errors->has('prix_action'))
                                    <span class="text-danger text-left">{{ $errors->first('prix_action') }}</span>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">nombre d'action pendant la phase : </th>
                    <td>
                        <div class="col-12">
                            <div class="form-group border " style="border-radius: 10px;">
                                <input type="number" placeholder="nombre action" class="form-control"
                                    name="nombre_action" value="{{ $phase->nombre_action }}"
                                    aria-describedby="nombre_actionHelp">
                                @if ($errors->has('nombre_action'))
                                    <span class="text-danger text-left">{{ $errors->first('nombre_action') }}</span>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">statut_phase : </th>
                    <td>
                        <div class="col-12">
                            <div class="form-group border " style="border-radius: 10px;">

                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    name="statut_phase" {{-- value="{{ $phase->statut_phase }}" --}}
                                    placeholder="{{ $phase->statut_phase }}">
                                <datalist id="datalistOptions">
                                    <option value="En-cour">
                                    <option value="Terminer">
                                    <option value="Non débuté">
                                </datalist>

                                @if ($errors->has('statut_phase'))
                                    <span class="text-danger text-left">{{ $errors->first('statut_phase') }}</span>
                                @endif
                            </div>
                        </div>
 
                            <div class="col-md-6"></div>
                            <div class="col-md-6 p-3 float-right">
                                <button type="submit" class="btn btn-success"> Enregistrer</button>
                            </div> 
        
                    </td>
                </tr>
                
            </tbody>
        </form>

    </table>

    @include('layouts.footer')

</html>
