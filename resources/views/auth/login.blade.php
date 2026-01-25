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

<body class="flex flex-col h-fit items-center p-6 bg-[#fafafa]">

    <header class="flex flex-col items-center gap-4 mb-6">
        <div
            class="container-logos flex flex-col items-center bg-[#3b82f6] py-4 px-3 rounded-xl hover:scale-105 transition">
            <i class="fa-regular fa-file-lines text-white text-xl"></i>
        </div>
        <h3 class="font-semibold text-xl">InvoicePos</h3>
    </header>
    <main class="w-[500px] border border-gray-200 py-8 px-6 rounded-2xl bg-white">
        <div class="head flex flex-col items-center gap-1 mb-6">
            <h1 class="text-2xl font-bold">Masuk Ke Akun</h1>
            <p class="text-gray-500">Kelola transaksi dan invoice anda</p>
        </div>
        <form class="flex flex-col gap-2 m-2">

            <label class="text-sm font-medium" for="email">Email</label>
            <div class="email flex border border-gray-200 p-3 rounded mb-2">
                <i class="fa-regular fa-envelope fa-user mr-2"></i>
                <input class="text-sm outline-0 w-full" type="email" name="name" placeholder="nama@gmail.com">
            </div>
            <div class="top flex justify-between items-center">
                <label class="text-sm font-medium" for="password">Password</label>
                <a href="">
                    <p class="text-sm text-[#3b82f6] hover:underline">Lupa password?</p>
                </a>
            </div>
            <div class="password flex border border-gray-200 p-3 rounded mb-2">
                <input class="text-sm outline-0 w-full" type="password" name="password" placeholder="Masukkan password"
                    id="inp1">
                <i class="fa-solid fa-eye text-gray-500 cursor-pointer" id="hide-password"></i>
            </div>

            <button class="w-full bg-[#3b82f6] hover:bg-[#5c91e8] p-2.5 text-white font-bold rounded cursor-pointer"
                type="submit">Masuk</button>
        </form>
        <p class="w-full flex justify-center gap-1 text-sm mt-6 text-gray-500">
            <span>Sudah punya akun?</span>
            <a href="/register" class="text-blue-500 hover:underline font-medium">
                Daftar
            </a>
        </p>
    </main>
    <footer class="text-sm mt-6 text-gray-500">
        © 2026 InvoicePOS. All rights reserved.
    </footer>
</body>
<script>
    const hidePw = document.getElementById('hide-password')
    const inp1 = document.getElementById('inp1')

    let active = false
    hidePw.addEventListener("click", () => {
        active = !active
        if (!active) {
            inp1.type = "password"
            hidePw.classList.add('fa-eye')
            hidePw.classList.remove('fa-eye-slash')
        } else {
            inp1.type = "text"
            hidePw.classList.remove('fa-eye')
            hidePw.classList.add('fa-eye-slash')
        }
    })

    async function loginLoad() {
        const data = {

        }
        try {
            const response = await fetch('/api/login', {
                method: "POST",
                headers: {
                    'Content-Type': 'aplication/json'
                },
                body: JSON.stringify(data),
                credential: 'include'
            })

            if (!response.ok) {
                const res = await response.json()
                throw res
            }

            const res = await response.json()
            return res;
        } catch (error) {
            console.error('error fetching data', error)
        }
    }
</script>

</html>
