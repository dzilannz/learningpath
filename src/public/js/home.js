document.addEventListener("DOMContentLoaded", () => {
    // Set default tombol filter ke "All"
    const filterButton = document.getElementById("filter-button");
    filterButton.innerText = "All";

    // Pastikan dropdown disembunyikan secara default
    const dropdown = document.getElementById("filter-dropdown");
    dropdown.classList.add("hidden");

    // Muat data awal "All"
    filterData("all");

    scrollToSection();
});


// Fungsi scroll ke bagian tertentu
function scrollToSection() {
    const section = document.getElementById("target-section");
    if (section) {
        section.scrollIntoView({ behavior: "smooth" });
    }
}

// Scroll animations untuk animasi bagian ketika terlihat
const sections = document.querySelectorAll(".stats-section, .chart-section, .about-section");
const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target); // Stop observing once animated
            }
        });
    },
    { threshold: 0.1 }
);

sections.forEach((section) => {
    observer.observe(section);
});

// Data awal
const dataSets = {
    all: {
        stats: [
            { title: "Mahasiswa Aktif", value: 345 },
            { title: "Ibtitah", value: 256 },
            { title: "Kerja Praktek", value: 189 },
            { title: "Sidang", value: 176 },
        ],
        statistik: [345, 256, 189, 176],
        ibtitah: [60, 70, 30],
        taSidang: [30, 15, 10, 5],
    },
    // Tambahan data lainnya (2024, 2023, 2022)
};

// Fungsi untuk memperbarui data berdasarkan tahun
function filterData(year) {
    const filterButton = document.getElementById("filter-button");
    filterButton.innerText = year === "all" ? "All" : year;

    const data = dataSets[year];
    updateStats(data.stats);
    updateCharts(data);
}

// Perbarui elemen statistik
function updateStats(stats) {
    const statsSection = document.querySelector(".stats-section");
    statsSection.innerHTML = stats
        .map(
            (stat) => `
            <div class="stats-card">
                <h3 class="stats-title">${stat.title}</h3>
                <p class="stats-value">${stat.value}</p>
            </div>
        `
        )
        .join("");
}

// Perbarui grafik
function updateCharts(data) {
    statistikChart.data.datasets[0].data = data.statistik;
    ibtitahChart.data.datasets[0].data = data.ibtitah;
    taSidangChart.data.datasets[0].data = data.taSidang;

    statistikChart.update();
    ibtitahChart.update();
    taSidangChart.update();
}

// Inisialisasi grafik
const statistikCtx = document.getElementById("statistikChart").getContext("2d");
const ibtitahCtx = document.getElementById("ibtitahChart").getContext("2d");
const taSidangCtx = document.getElementById("sidangChart").getContext("2d");

const statistikChart = new Chart(statistikCtx, {
    type: "bar",
    data: {
        labels: ["Mahasiswa Aktif", "Ibtitah", "Kerja Praktek", "Sidang"],
        datasets: [
            {
                label: "Jumlah",
                data: dataSets.all.statistik,
                backgroundColor: ["#FFD523", "#FFC107", "#FFB300", "#FFA000"],
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
    },
});

const ibtitahChart = new Chart(ibtitahCtx, {
    type: "doughnut",
    data: {
        labels: ["Ibadah", "Tilawah", "Tahfidz"],
        datasets: [
            {
                data: dataSets.all.ibtitah,
                backgroundColor: ["#FFE893", "#FFD65E", "#FFBF40"],
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
    },
});

const taSidangChart = new Chart(taSidangCtx, {
    type: "doughnut",
    data: {
        labels: ["Sempro", "Kompre", "Kolokium", "Munaqasyah"],
        datasets: [
            {
                data: dataSets.all.taSidang,
                backgroundColor: ["#FFE893", "#FFD65E", "#FFC244", "#FFAE2A"],
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
    },
});

// Dropdown Toggle
function toggleDropdown() {
    const dropdown = document.getElementById("filter-dropdown");
    dropdown.classList.toggle("hidden");
    dropdown.classList.toggle("visible");
}

// Tutup dropdown saat klik di luar
window.addEventListener("click", function (e) {
    const dropdown = document.getElementById("filter-dropdown");
    const button = document.getElementById("filter-button");
    if (!dropdown.contains(e.target) && !button.contains(e.target)) {
        dropdown.classList.add("hidden");
        dropdown.classList.remove("visible");
    }
});
