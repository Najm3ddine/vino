@extends('layouts.app')
@section('titre', 'MES CELLIERS')
@section('content')
        <main class="main-content">
            <section class="container">
                <div class="titre-section">
                    <h2>Mes Celliers  <span> > </span></h2>
                </div>
                <!-- <div class="recherche">
                    <img src="assets/lupe.png" alt="lupe">
                    <input type="text" placeholder="Rechercher un vin">
                </div> -->
            </section>

            <section>
                <a href=" {{ route('celliers.create') }} " class="align-right">
                    <img src="assets/add.png" alt="add">
                    Ajouter un cellier
                </a>
            </section>

            <section class="catalogue">
                <div class="row text-center carte">
                        @forelse($celliers as $cellier)

                            <div class="col-md-3 card mb-1 mr-1">
                                <div class="card-body text-carte">
                                    <h2 class="card-title">{{ $cellier->nom  }}</h2>
                                    <p class="card-subtitle mb-2 text-muted">{{ $cellier->note }}</p>

                                    <p>Vin rouge : 3 | Vin blanc : 4 | Vin rosé : 12</p>
                                    <div class="form-horizontal form-inline text-center btn-carte">
                                        <a href="{{route('celliers.show',$cellier->id)}}" class="card-link"> Détails</a>
                                            <a href="{{route('celliers.edit',$cellier->id)}}" class="card-link">Modifier</a>
                                            <form  action="{{route('celliers.destroy',$cellier->id)}}" method="POST">
                                                <a type="submit" class="btn btn-link card-link" value=""> Supprimer</a>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                    </div>
                                </div>
                            </div>

                        @empty

                            <label>Pas de Celliers</label>

                    @endforelse
                           
                              </div>
            </section>

            <section class="pagination">
                <!-- Pagination -->
                @include('../pagination.pagination', ['paginator' => $celliers])
            </section>



        </main>
@endsection
