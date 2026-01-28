<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mercury</title>
</head>
<body>

    <nav>
        <a href="{{ route('groups.index') }}">Groups</a>
    </nav>

    <hr>

    {{-- Flash message --}}
    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    {{-- Validation errors --}}
    @if($errors->any())
        <ul style="color: red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @yield('content')

</body>
</html>
