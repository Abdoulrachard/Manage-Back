<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('title', $equipe->exists ? 'Modifier une equipe' : 'Créer une equipe')

    <div class="container mt-5">
        <h1 class="pb-3 fw-bold h3">@yield('title')</h1>

        <form class="vstack gap-2" enctype="multipart/form-data"
            action="{{ route($equipe->exists ? 'equipe.update' : 'equipe.store', $equipe) }}" method="POST">
            {{-- @php 
                dd($equipe)
            @endphp --}}
            @csrf
            
            @method($equipe->exists ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-md-6">
                    <x-forms.input name='name' :value="$equipe->name" label='Nom et Prénom :' />
                </div>
               
                <div class="col-md-6">
                    <x-forms.input name='posted' :value="$equipe->posted" label='Poste occupé :' />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='domaine_competence' :value="$equipe->domaine_competence" label='Domaine de compétence :' />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='formations' :value="$equipe->formations" label='Formations :' />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='affilations' :value="$equipe->affilations" label="Affilations :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='curiculum' :value="$equipe->curiculum" label="Curriculum vitae :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='links' :value="$equipe->links" label="Liens Partagé  :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='selections' :value="$equipe->selections" label="Selection des projets  :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input type="file"  name='cover' :value="$equipe->cover" label='Importez une image' multiple=true  />
                    @if ($equipe->cover)
                        <div class="mt-2 w-20 h-20 overflow-hidden rounded-lg border border-gray-300" style="display: flex; justify-content: center;">
                            <img src="{{ asset("/storage/equipes/covers/" . $equipe->cover->path) }}" alt="Image actuelle"
                                class="w-full h-full object-cover" style="width: 100% important !; height: auto;">
                        </div>
                    @endif
                </div>
                <div class="col-md-12 ">
                    <x-forms.textarea name='descriptions' :value="$equipe->descriptions" label='Descriptions' />
                </div>
            </div>
            <div class="text-center mt-5">
                <button class="btn btn-primary w-25">
                    @if ($equipe->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
