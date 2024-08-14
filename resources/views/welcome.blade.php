<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Ebengkelku</title>
</head>
<body>
    <div class="relative min-h-screen bg-local">      
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-cover" 
        style="background-image:url({{ asset('assets/images/image.png') }});">
        </div>
            <div class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-tl from-transparent to-white backdrop-blur-lg"></div>
            @include('layouts.navbar')
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-cover">
            <img src="{{ asset('assets/logo/logo 3.png') }}" alt="Centered Image" class="h-auto mb-6" style="max-width: 25%">
            <p class="text-blue-500 text-2xl font-bold">Saling Support</p>
         </div>
    </div>
</body>
</html>
