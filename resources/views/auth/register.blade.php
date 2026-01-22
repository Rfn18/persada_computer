<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.0.1/css/all.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>InvoicePos | manage your datas</title>
</head>

<body class="flex flex-col h-fit items-center p-6">
    <header class="flex flex-col items-center gap-4 mb-6">
        <div
            class="container-logos flex flex-col items-center bg-[#3b82f6] py-4 px-3 rounded-xl hover:scale-105 transition">
            <i class="fa-regular fa-file-lines text-white text-xl"></i>
        </div>
        <h3 class="font-semibold text-xl">InvoicePos</h3>
    </header>
    <main class="w-[500px] border border-gray-200 py-8 px-6 rounded-2xl">
        <div class="head flex flex-col items-center gap-1 mb-6">
            <h1 class="text-2xl font-bold">Buat Akun Baru</h1>
            <p class="text-gray-500">Mulai kelola bisnis anda hari ini</p>
        </div>
        <form class="flex flex-col gap-2 m-2">
            <label class="text-sm font-medium" for="name">Nama Lengkap</label>
            <div class="nama_lengkap flex border border-gray-200 p-3 rounded mb-2">
                <i class="fa-regular fa-user mr-2"></i>
                <input class="text-sm outline-0 w-full" type="text" name="name"
                    placeholder="Masukkan nama lengkap">
            </div>
            <label class="text-sm font-medium" for="email">Email</label>
            <div class="email flex border border-gray-200 p-3 rounded mb-2">
                <i class="fa-regular fa-envelope fa-user mr-2"></i>
                <input class="text-sm outline-0 w-full" type="email" name="name" placeholder="nama@gmail.com">
            </div>
            <label class="text-sm font-medium" for="password">Password</label>
            <div class="password flex border border-gray-200 p-3 rounded mb-2">
                <input class="text-sm outline-0 w-full" type="password" name="password" placeholder="Masukkan password">
                <i class="fa-solid fa-eye text-gray-500 cursor-pointer"></i>
            </div>
            <label class="text-sm font-medium" for="password_confirmation">Konfirmasi Password</label>
            <div class="password_confirmation flex border border-gray-200 p-3 rounded mb-2">
                <input class="text-sm outline-0 w-full" type="password" name="password_confirmation"
                    placeholder="Masukkan ulang password">
                <i class="fa-solid fa-eye text-gray-500 cursor-pointer"></i>
            </div>
            <button class="w-full bg-[#3b82f6] hover:bg-[#5c91e8] p-2.5 text-white font-bold rounded cursor-pointer"
                type="submit">Daftar</button>
        </form>
        <p class="w-full flex justify-center gap-1 text-sm mt-6 text-gray-500">
            <span>Sudah punya akun?</span>
            <a href="/login" class="text-blue-500 hover:underline font-medium">
                Masuk
            </a>
        </p>
    </main>
    <footer class="text-sm mt-6 text-gray-500">
        © 2024 InvoicePOS. All rights reserved.
    </footer>
</body>

</html>
