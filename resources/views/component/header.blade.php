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
    <title>Master Data | manage your datas</title>
</head>

<body>
    <header class="flex items-center py-4 px-10 gap-6 border-b-1 border-gray-200">
        <div class="logo flex items-center">
            <div class="bg-[#3b82f6] w-fit rounded-[8px] p-1.5">
                <i class="fa-slab-press fa-regular fa-box text-md text-white"></i>
            </div>
            <p class="font-medium text-xl ml-2 tracking-wide">MasterData</p>
        </div>
        <div>
            <ul class="flex items-center gap-2">
                <li
                    class="flex gap-2 items-center text-gray-500 hover:bg-[#ebf3fe] hover:text-[#5995f7] p-2 px-3 transition-all cursor-pointer rounded">
                    <i class="fa-slab-press fa-regular fa-box text-md"></i>
                    <p>Master Produk</p>
                </li>
                <li
                    class="flex gap-2 items-center text-gray-500 hover:bg-[#ebf3fe] hover:text-[#5995f7] p-2 px-3 transition-all cursor-pointer rounded">
                    <i class="fa-regular fa-circle-user text-md"></i>
                    <p>Master Kasir</p>
                </li>
                <li
                    class="flex gap-2 items-center text-gray-500 hover:bg-[#ebf3fe] hover:text-[#5995f7] p-2 px-3 transition-all cursor-pointer rounded">
                    <i class="fa-utility fa-regular fa-users text-md"></i>
                    <p>Master Customer</p>
                </li>
            </ul>
        </div>
    </header>
