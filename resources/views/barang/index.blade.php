@include('component.header')
<main class="bg-[#fafafa] w-full h-screen p-10">
    <div class="mb-10">
        <h1 class="text-2xl font-semibold">Master Produk</h1>
        <p class="text-gray-400">Kelola data produk dan inventaris toko anda</p>
    </div>
    <div class="w-full border-1 border-gray-200 bg-white rounded-2xl">
        <table class="w-full border-collapse">
            <caption class="caption-top border-b border-gray-200">
                <div class="flex w-full justify-between items-center p-4">
                    <div class="flex items-center gap-2 border-1 border-gray-200 bg-[#fafafa] px-2.5 py-2 rounded-md">
                        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                        <input type="text" placeholder="Cari produk..." class="outline-none text-sm">
                    </div>

                    <button
                        class="flex items-center gap-2 bg-[#3b82f6] hover:bg-[#5993f1] cursor-pointer text-white px-2.5 py-2 text-sm rounded">
                        <i class="fa-solid fa-plus"></i>
                        <span>Tambah Produk</span>
                    </button>
                </div>
            </caption>

            <thead class="border-b border-gray-200 ">
                <tr class="text-left">
                    <th class="py-3 px-4">Kode</th>
                    <th class="py-3 px-4">Nama Produk</th>
                    <th class="py-3 px-4">Harga</th>
                    <th class="py-3 px-4">Aksi</th>
                </tr>
            </thead>

            <tbody id="barang-table"></tbody>

            <tfoot class="border-t border-gray-200">
                <tr class="px-4">
                    <td colspan="5" class="py-3 px-4">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-500">Halaman 1 dari 2</p>
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-angle-left cursor-pointer"></i>
                                <span class="font-medium">1</span>
                                <span class="text-gray-400">2</span>
                                <i class="fa-solid fa-angle-right cursor-pointer"></i>
                            </div>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
</main>
</body>

<script>
    const message = "";

    async function deleteBarang(id) {
        
        if (!confirm("yakin ini menghapus item ini?")) return

        try {
            const response = await fetch(`api/barang/${id}`, {
                method: "DELETE"
            })
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.status)
            }

            if (response.status !== 204) {
                return response.json()
            }
            console.log(response)
        } catch (err) {
            console.error("error delete data", err)
        }
    }


    async function loadBarang() {
        const res = await fetch("api/barang");
        const json = await res.json();

        const tbody = document.getElementById("barang-table")
        tbody.innerHTML = ""

        json.data.data.forEach(p => {
            tbody.innerHTML += `
                <tr class="border-b border-gray-200 hover:bg-[#fafafa]">
                    <td class="py-3 px-4">${p.kd_barang}</td>
                    <td class="py-3 px-4">${p.nama_barang}</td>
                    <td class="py-3 px-4">${p.harga}</td>
                    <td class="py-3 px-4">
                        <ul class="flex gap-2">
                            <li class="hover:bg-gray-200 p-2 transition rounded cursor-pointer w-fit"><i class="fa-regular fa-pen "></i></li>    
                            <li class="deleteBtn hover:bg-gray-200 p-2 transition rounded cursor-pointer w-fit" data-id="${p.id}"><i class="fa-regular fa-trash-can text-[#f04f4f]" ></i></li>      
                        </ul>
                    </td>
                </tr>
            `
        })

    }

    document.getElementById("barang-table").addEventListener("click", (e) => {
        deleteBtn = e.target.closest(".deleteBtn");

        if (deleteBtn) {
            const id = deleteBtn.dataset.id;
            deleteBarang(id)
        }
    })

    loadBarang()
</script>

</html>
