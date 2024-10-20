<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Home Platform Juan' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="/img/logo.png">
</head>

<body class="font-figtree">
    @include('front.navbar')

    <!-- About Section -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-screen-xl px-4 mx-auto">
            <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">Tentang Platform Juan</h2>
            <p class="mb-4 text-lg leading-relaxed text-gray-600">
                Platform Juan adalah sebuah ekosistem digital inovatif yang dirancang khusus untuk mendukung para reseller dalam memasarkan produk dengan cara yang lebih efisien dan efektif. Dengan misi untuk memberdayakan para pengusaha kecil dan menengah, kami menyediakan platform yang mudah digunakan, di mana para reseller dapat mengakses berbagai produk berkualitas dari berbagai penyedia terpercaya.
            </p>
            <p class="mb-4 text-lg leading-relaxed text-gray-600">
                Di Platform Juan, kami memahami tantangan yang dihadapi oleh para reseller, mulai dari pencarian produk hingga pengelolaan inventaris. Oleh karena itu, kami menyediakan fitur-fitur unggulan yang memudahkan pengguna untuk menemukan produk yang tepat, mengatur stok, dan melacak penjualan dengan mudah.
            </p>
            <p class="mb-4 text-lg leading-relaxed text-gray-600">
                Kami menawarkan sistem manajemen inventaris yang intuitif, sehingga pengguna dapat mengelola stok mereka secara real-time. Dengan fitur ini, reseller dapat dengan mudah menambahkan, mengedit, atau menghapus produk, memastikan bahwa mereka selalu memiliki informasi terkini tentang ketersediaan produk. Selain itu, kami menyediakan alat analisis yang memberikan wawasan mendalam tentang tren pasar dan perilaku konsumen, memungkinkan reseller untuk membuat keputusan bisnis yang lebih baik dan strategi pemasaran yang lebih efektif.
            </p>
            <p class="mb-4 text-lg leading-relaxed text-gray-600">
                Salah satu keunggulan dari Platform Juan adalah komunitas reseller yang aktif dan mendukung. Kami percaya bahwa kolaborasi adalah kunci sukses. Oleh karena itu, kami menyediakan forum diskusi dan pelatihan online untuk membantu reseller saling berbagi pengalaman, strategi, dan tips yang telah terbukti efektif dalam meningkatkan penjualan. Di sini, setiap pengguna dapat belajar dari satu sama lain dan tumbuh bersama dalam bisnis mereka.
            </p>
            <p class="mb-4 text-lg leading-relaxed text-gray-600">
                Kami juga mengutamakan pengalaman pengguna yang optimal. Dengan antarmuka yang responsif dan ramah pengguna, reseller dapat mengakses platform kami dengan mudah, baik melalui desktop maupun perangkat mobile. Kami berkomitmen untuk memberikan pengalaman yang menyenangkan dan mendukung bagi semua pengguna kami. Tim kami selalu siap membantu dengan layanan pelanggan yang responsif dan sumber daya pelatihan yang bermanfaat.
            </p>
            <p class="mb-4 text-lg leading-relaxed text-gray-600">
                Dengan Platform Juan, Anda bukan hanya menjadi reseller, tetapi juga bagian dari komunitas yang berkembang dan saling mendukung. Kami percaya bahwa setiap reseller memiliki potensi untuk berhasil, dan kami berkomitmen untuk membantu Anda mencapai tujuan bisnis Anda. Bergabunglah dengan kami dan jadilah bagian dari revolusi digital dalam dunia penjualan produk! Mari bersama-sama kita ciptakan masa depan yang lebih cerah untuk bisnis Anda!
            </p>
        </div>
    </section>

    @include('front.footer')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
