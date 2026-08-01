@extends('layouts.app')

@section('title', 'Ressources - RAIL Bénin')

@section('content')

<div class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-folder-open"></i>
            Ressources
        </div>
        <h1>Ressources</h1>
        <p>Guides, rapports, études et supports de formation</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="flex gap-2 flex-wrap justify-center mb-8 animate-fade-up">
            <a href="{{ route('resources.index') }}" class="btn btn-sm {{ !isset($category) ? 'btn-primary' : 'btn-outline' }}">Tout</a>
            @foreach($categories ?? [] as $cat)
            <a href="{{ route('resources.category', $cat) }}" class="btn btn-sm {{ isset($category) && $category === $cat ? 'btn-primary' : 'btn-outline' }}">{{ ucfirst($cat) }}</a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 stagger">
            @forelse($resources as $resource)
            <div class="feature-card p-5 animate-fade-up" style="animation-delay:{{ $loop->index * 50 }}ms">
                <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center text-primary-500 mb-4">
                    <i class="fas {{ $resource->file_type === 'pdf' ? 'fa-file-pdf' : ($resource->file_type === 'doc' || $resource->file_type === 'docx' ? 'fa-file-word' : 'fa-file-alt') }}"></i>
                </div>
                <span class="badge badge-brand text-xs mb-2">{{ ucfirst($resource->category ?: 'Document') }}</span>
                <h3 class="font-bold text-sm mb-2">{{ $resource->title }}</h3>
                @if($resource->description)
                <p class="text-surface-500 text-xs leading-relaxed mb-4">{{ Str::limit($resource->description, 100) }}</p>
                @endif
                <div class="flex justify-between items-center text-xs">
                    <span class="text-surface-400"><i class="fas fa-download"></i> {{ $resource->download_count }} téléchargements</span>
                    <a href="{{ route('resources.download', $resource->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-download"></i> Télécharger
                    </a>
                </div>
            </div>
            @empty
            <div class="text-center py-16 col-span-full">
                <div class="w-16 h-16 rounded-xl bg-surface-100 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-folder-open text-2xl text-surface-300"></i>
                </div>
                <p class="text-surface-400">Aucune ressource trouvée.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $resources->links() }}
        </div>
    </div>
</section>

@endsection
