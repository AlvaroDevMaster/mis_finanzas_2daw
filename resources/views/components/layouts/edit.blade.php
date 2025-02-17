<!DOCTYPE html>
<html class="h-full bg-gray-100 dark:bg-gray-900">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style></style>
    @endif
</head>

<body class="h-full text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-900">

    <div class="min-h-full">
        <x-menu />

        <!-- Header -->
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{$title}}
                </h1>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            @if($errors->any())
                {{$message = '<span>There were errors when trying to fullfill you request:</span>';}}
                {{$errorsList = '<ul class="mt-1.5 list-disc list-inside">';}}
                @foreach($errors->all() as $error)
                    {{$errorsList .= '<li>' . $error . '</li>';}}
                @endforeach
                {{$errorsList .= '</ul>';}}
                <x-alert :type="'error'" :message="$message . $errorsList" />
            @endif
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{$slot}}
            </div>
        </main>
    </div>
</body>

</html>