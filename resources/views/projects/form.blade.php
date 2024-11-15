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
            @csrf
            @method($project->exists ? 'PUT' : 'POST')

            <div class="row">
                <div class="col-md-6">
                    <x-forms.input name="year" value="{{ old('year', $project->year) }}" label="Année :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="title" value="{{ old('title', $project->title) }}" label="Titre :" />
                </div>
               
                <div class="col-md-6">
                    <x-forms.input name="project_name" value="{{ old('project_name', $project->project_name) }}" label="Nom du Projet :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="city" value="{{ old('city', $project->city) }}" label="Ville :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="developer" value="{{ old('developer', $project->developer) }}" label="Développé par :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="maitre_ouvre" value="{{ old('maitre_ouvre', $project->maitre_ouvre) }}" label="Maître d'Œuvre :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="typologie" value="{{ old('typologie', $project->typologie) }}" label="Typology :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="programme" value="{{ old('programme', $project->programme) }}" label="Programme :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="procedure" value="{{ old('procedure', $project->procedure) }}" label="Procédure :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="signaletique" value="{{ old('signaletique', $project->signaletique) }}" label="Signalétique :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="surface" value="{{ old('surface', $project->surface) }}" label="Surface :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="realisation" value="{{ old('realisation', $project->realisation) }}" label="Réalisation :" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="volume" value="{{ old('volume', $project->volume) }}" label="Volume :" />
                </div>

                <div class="col-md-6">
                    <x-forms.inputfile type="file" name="cover" label="Importez une image (Couverture)" />
                    @if ($project->cover_path)
                        <div class="mt-2 w-20 h-20 overflow-hidden rounded-lg border border-gray-300" style="display: flex; justify-content: center;">
                            <img src="{{ asset("/storage/projects/covers/" . $project->cover_path) }}" alt="Image actuelle"
                                class="w-full h-full object-cover" style="width: 100%; height: auto;">
                        </div>
                    @endif
                </div>

                <div class="col-md-6">
                    <x-forms.inputfile type="file" name="additional_images[]" label="Importez des images (Supplémentaires)" multiple="true" />
                    <div class="row gap-2">
                        @if ($project->galleries && $project->galleries->count() > 0)
                            @foreach ($project->galleries as $gallery)
                                <div class="mt-2 w-20 h-20 overflow-hidden rounded-lg border border-gray-300" style="display: flex; align-items:center;">
                                    <img src="{{ asset("/storage/projects/additional_images/" . $gallery->path) }}" alt="Image supplémentaire"
                                        class="w-full h-full object-cover" style="width: 100%; height: auto;">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <x-forms.textarea name="descriptions" value="{{ old('descriptions', $project->descriptions) }}" label="Descriptions" />
                </div>
            </div>

            <div class="text-center mt-5" style="padding-bottom: 50px;">
                <button class="btn btn-primary w-25">
                    {{ $project->exists ? 'Modifier' : 'Créer' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
