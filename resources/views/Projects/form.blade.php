<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('title', $project->exists ? 'Modifier un projet' : 'Créer un projet')

    <div class="container mt-5">
        <h1 class="pb-3 fw-bold h3">@yield('title')</h1>

        <form class="vstack gap-2" enctype="multipart/form-data"
            action="{{ route($project->exists ? 'project.update' : 'project.store', $project) }}" method="POST">
            {{-- @php 
                dd($project)
            @endphp --}}
            @csrf
            
            @method($project->exists ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-md-6">
                    <x-forms.input name='year' :value="$project->year" label='Année :' />
                </div>
               
                <div class="col-md-6">
                    <x-forms.input name='project_name' :value="$project->project_name" label='Nom du Projet :' />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='city' :value="$project->city" label='Ville :' />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='developer' :value="$project->developer" label='Dévelloper par :' />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='maitre_ouvre' :value="$project->maitre_ouvre" label="Maitre D'oeuvre  :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='typologie' :value="$project->typologie" label="Typology  :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='programme' :value="$project->programme" label="Programme  :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='procedure' :value="$project->procedure" label="Procedure  :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='signaletique' :value="$project->signaletique" label="Signaletique  :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='surface' :value="$project->surface" label="Surface  :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='realisation' :value="$project->realisation" label="Réalisation  :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input name='volume' :value="$project->volume" label="Volume  :"  />
                </div>
                <div class="col-md-6">
                    <x-forms.input type="file"  name='cover' :value="$project->cover" label='Importez une image' multiple=true  />
                    @if ($project->cover)
                        <div class="mt-2 w-20 h-20 overflow-hidden rounded-lg border border-gray-300" style="display: flex; justify-content: center;">
                            <img src="{{ asset("/storage/projects/covers/" . $project->cover->path) }}" alt="Image actuelle"
                                class="w-full h-full object-cover" style="width: 100% important !; height: auto;">
                        </div>
                    @endif
                </div>
                <div class="col-md-12 ">
                    <x-forms.textarea name='descriptions' :value="$project->descriptions" label='Descriptions' />
                </div>
            </div>
            <div class="text-center mt-5">
                <button class="btn btn-primary w-25">
                    @if ($project->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
