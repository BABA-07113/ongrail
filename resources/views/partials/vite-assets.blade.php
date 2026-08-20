@php
    $viteCss = null;
    $viteJs = null;
    $manifestPath = public_path('build/manifest.json');
    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);
        if (isset($manifest['resources/css/app.css']['file'])) {
            $viteCss = $manifest['resources/css/app.css']['file'];
        }
        if (isset($manifest['resources/js/app.js']['file'])) {
            $viteJs = $manifest['resources/js/app.js']['file'];
        }
    }
    if (!$viteCss) {
        $cssFiles = glob(public_path('build/assets/app*.css'));
        if (!empty($cssFiles)) {
            $viteCss = 'build/assets/' . basename($cssFiles[0]);
        }
    }
    if (!$viteJs) {
        $jsFiles = glob(public_path('build/assets/app*.js'));
        if (!empty($jsFiles)) {
            $viteJs = 'build/assets/' . basename($jsFiles[0]);
        }
    }
@endphp
@if($viteCss)
    <link rel="stylesheet" href="/build/{{ ltrim($viteCss, '/') }}">
@endif
@if($viteJs)
    <script type="module" src="/build/{{ ltrim($viteJs, '/') }}"></script>
@endif
