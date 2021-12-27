<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
</head>
<body>
    @if($was_successful)
    <p>Yes, we can now use your instagram feed</p>
    @else
    <p>Sorry, we failed to get permission to use your insagram feed.</p>
    @endif
</body>
</html>