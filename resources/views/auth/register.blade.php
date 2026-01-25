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
    <div id="alert-success"
        class="hidden  fixed bottom-5 animate-[fade-in-left_300ms_ease_forwards] left-5 items-center justify-between text-blue-600 max-w-90 w-full bg-blue-600/10 h-10 shadow">
        <div class="h-full w-1.5 bg-blue-600"></div>
        <div class="flex items-center">
            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon line">
                <path style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.95"
                    d="M11.95 16.5h.1"></path>
                <path d="M3 12a9 9 0 0 1 9-9h0a9 9 0 0 1 9 9h0a9 9 0 0 1-9 9h0a9 9 0 0 1-9-9m9 0V7"
                    style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5">
                </path>
            </svg>
            <p class="text-sm ml-2">Success! Your task is fully completed.</p>
        </div>
        <button type="button" aria-label="close" class="active:scale-90 transition-all mr-3">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 5L5 15M5 5L15 15" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>
    <header class="flex flex-col items-center gap-4 mb-6">
        <div
            class="container-logos flex flex-col items-center bg-[#3b82f6] py-4 px-3 rounded-xl hover:scale-105 transition">
            <i class="fa-regular fa-file-lines text-white text-xl"></i>
        </div>
        <h3 class="font-semibold text-xl">InvoicePos</h3>
    </header>
    <main class="w-[500px] border border-gray-200 py-8 px-6 rounded-2xl bg-white">
        <div class="head flex flex-col items-center gap-1 mb-6">
            <h1 class="text-2xl font-bold">Buat Akun Baru</h1>
            <p class="text-gray-500">Mulai kelola bisnis anda hari ini</p>
        </div>
        <form class="flex flex-col gap-2 m-2" onsubmit="registerLoad(event)">
            <label class="text-sm font-medium" for="name">Nama Lengkap</label>
            <div class="nama_lengkap flex border border-gray-200 p-3 rounded mb-2">
                <i class="fa-regular fa-user mr-2"></i>
                <input class="text-sm outline-0 w-full" type="text" name="name"
                    placeholder="Masukkan nama lengkap" id="inp_nama">
            </div>
            <label class="text-sm font-medium" for="email">Email</label>
            <div class="email flex border border-gray-200 p-3 rounded mb-2">
                <i class="fa-regular fa-envelope fa-user mr-2"></i>
                <input class="text-sm outline-0 w-full" type="email" name="name" placeholder="nama@gmail.com"
                    id="inp_email">
            </div>
            <label class="text-sm font-medium" for="password">Password</label>
            <div class="password flex border border-gray-200 p-3 rounded mb-2">
                <input class="text-sm outline-0 w-full" type="password" name="password" placeholder="Masukkan password"
                    id="inp_password">
                <i class="fa-solid fa-eye text-gray-500 cursor-pointer" id="hide_password1"></i>
            </div>
            <label class="text-sm font-medium" for="password_confirmation">Konfirmasi Password</label>
            <div class="password_confirmation flex border border-gray-200 p-3 rounded mb-2">
                <input class="text-sm outline-0 w-full" type="password" name="password_confirmation"
                    placeholder="Masukkan ulang password" id="inp_con_password">
                <i class="fa-solid fa-eye text-gray-500 cursor-pointer" id="hide_password2"></i>
            </div>
            <button id="btn-submit"
                class="w-full bg-[#3b82f6] hover:bg-[#5c91e8] p-2.5 text-white font-bold rounded cursor-pointer"
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
        © 2026 InvoicePOS. All rights reserved.
    </footer>
</body>

<script>
    const hidePw = document.getElementById("hide_password1")
    const hidePw2 = document.getElementById("hide_password2")

    const inpName = document.getElementById('inp_nama')
    const inpEmail = document.getElementById('inp_email')

    const inpPw = document.getElementById("inp_password")
    const inpConPw = document.getElementById("inp_con_password")

    let active = false
    hidePw.addEventListener("click", () => {
        active = !active
        if (!active) {
            inpPw.type = "password"
            hidePw.classList.add('fa-eye')
            hidePw.classList.remove('fa-eye-slash')
        } else {
            inpPw.type = "text"
            hidePw.classList.remove('fa-eye')
            hidePw.classList.add('fa-eye-slash')
        }
    })
    let active2 = false
    hidePw2.addEventListener("click", () => {
        active2 = !active2
        if (!active2) {
            inpConPw.type = "password"
            hidePw2.classList.add('fa-eye')
            hidePw2.classList.remove('fa-eye-slash')
        } else {
            inpConPw.type = "text"
            hidePw2.classList.remove('fa-eye')
            hidePw2.classList.add('fa-eye-slash')
        }
    })

    let loading = false;

    async function registerLoad(e) {
        e.preventDefault()
        document.getElementById('btn-submit').innerHTML =
            '<i class="fa-duotone animate-spin fa-solid fa-loader"></i>'
        document.getElementById('btn-submit').disabled = true;
        const data = {
            name: inpName.value,
            email: inpEmail.value,
            password: inpPw.value,
            password_confirmation: inpConPw.value
        }
        try {
            loading = true
            const response = await fetch('/api/register', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data),
                credentiala: 'include'
            })

            if (!response.ok) {
                const err = await response.json();
                throw err;
            }

            const datas = await response.json()

            document.getElementById('alert-success').classList.remove('hidden')
            document.getElementById('alert-success').classList.add('flex')
            setTimeout(() => {
                window.location = "/login"
            }, 1000);
            return datas
        } catch (error) {
            console.error('Error fetching data', error)
            document.getElementById('btn-submit').innerHTML = 'Daftar'
            document.getElementById('btn-submit').disabled = false
        } finally {
            document.getElementById('btn-submit').innerHTML = 'Daftar'
            document.getElementById('btn-submit').disabled = false;
        }
    }
</script>

</html>
