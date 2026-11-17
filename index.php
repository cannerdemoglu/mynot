<?php
include("includes/header.php");
?>

<div class="container-fluid" id="homepageDiv">

    <!-- HERO: arka plan dalgaları -->
    <section class="hero">
        <div class="hero-waves" aria-hidden="true">
            <div id="waveChart"></div>
        </div>

        <div class="hero-content">
            <div class="brand">
                <h1 class="daynot" style="font-size: 90px;"><span id="daynotText" style="font-size: 90px;"></span></h1>
                <span class="app-tag">.app</span>
            </div>

            <p class="hero-sub">Görevlerini ekle, gününü planla, ilerlemeni izle.</p>

            <div class="buttons">
                <a href="register.php" class="btn-start">Hemen Başla</a>
                <a href="login.php" class="btn-login">Giriş Yap</a>
            </div>
        </div>
    </section>

    <!-- UYGULAMA ÖNİZLEME KARTI -->
    <section class="preview reveal">
        <div class="preview-card">
            <div class="preview-head">
                <div>
                    <span class="preview-title">Bu hafta</span>
                    <span class="preview-sub">24 görev tamamlandı</span>
                </div>
                <span class="preview-pill">Örnek görünüm</span>
            </div>

            <div class="preview-body">
                <div class="preview-bars">
                    <div id="previewBarChart"></div>
                </div>
                <div class="preview-ring">
                    <div id="previewRadialChart"></div>
                    <span class="preview-ring-label">Haftalık hedef</span>
                </div>
            </div>

            <div class="preview-tasks">
                <div class="preview-task done">
                    <span class="preview-check"><i data-lucide="check"></i></span>
                    Sunumu hazırla
                </div>
                <div class="preview-task">
                    <span class="preview-check"></span>
                    Market alışverişi
                </div>
                <div class="preview-task">
                    <span class="preview-check"></span>
                    30 dk yürüyüş
                </div>
            </div>
        </div>
    </section>

    <!-- ÖZELLİK KARTLARI -->
    <section class="features">
        <div class="features-head reveal">
            <span class="features-eyebrow">Neden Day Not?</span>
            <h2 class="features-title">Günün, tek bakışta.</h2>
        </div>

        <div class="features-grid">
            <div class="feature-card reveal">
                <span class="feature-icon"><i data-lucide="plus"></i></span>
                <h3 class="feature-title">Hızlıca ekle</h3>
                <p class="feature-text">Aklına gelen görevi saniyeler içinde listene yaz, unutma derdi olmasın.</p>
                <div class="feature-chart" id="featureChartAdd"></div>
            </div>

            <div class="feature-card reveal">
                <span class="feature-icon"><i data-lucide="trending-up"></i></span>
                <h3 class="feature-title">İlerlemeni izle</h3>
                <p class="feature-text">Tamamladıklarını ve bekleyenleri ayrı ayrı gör, haftanın ritmini yakala.</p>
                <div class="feature-chart" id="featureChartTrack"></div>
            </div>

            <div class="feature-card reveal">
                <span class="feature-icon"><i data-lucide="check-check"></i></span>
                <h3 class="feature-title">Tamamla, rahatla</h3>
                <p class="feature-text">Tek tıkla görevi bitir, listen sadeleşsin, kafan hafiflesin.</p>
                <div class="feature-chart feature-chart-ring" id="featureChartDone"></div>
            </div>
        </div>
    </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.54.1/dist/apexcharts.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // --- Daktilo efekti ---
        const titleText = "Day Not";
        const target = document.getElementById("daynotText");
        let i = 0;

        function typeHello() {
            if (i < titleText.length) {
                target.textContent += titleText.charAt(i);
                i++;
                setTimeout(typeHello, 140);
            }
        }

        setTimeout(typeHello, 250);

        if (typeof lucide !== "undefined") {
            lucide.createIcons();
        }

        // --- Kaydırınca beliren bölümler ---
        const revealEls = document.querySelectorAll(".reveal");
        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-visible");
                        io.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });
            revealEls.forEach(el => io.observe(el));
        } else {
            revealEls.forEach(el => el.classList.add("is-visible"));
        }

        if (typeof ApexCharts === "undefined") return;

        const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        const blue = "#3955A2";
        const blueLight = "#6f8ad6";
        const blueSoft = "#9fb3ea";
        const font = "poppinsRegular, sans-serif";
        const base = {
            background: "transparent",
            fontFamily: font,
            toolbar: { show: false },
            zoom: { enabled: false }
        };

        // ---------- 1) Arka plan dalgaları ----------
        const WAVE_POINTS = 28;
        let phase = 0;

        function waveSeries() {
            const layers = [
                { amp: 14, freq: 0.32, offset: 0.0, level: 46 },
                { amp: 11, freq: 0.26, offset: 1.9, level: 36 },
                { amp: 8,  freq: 0.40, offset: 3.4, level: 26 }
            ];
            return layers.map((l, idx) => ({
                name: "w" + idx,
                data: Array.from({ length: WAVE_POINTS }, (_, x) =>
                    +(l.level
                        + l.amp * Math.sin(x * l.freq + phase + l.offset)
                        + (l.amp / 3) * Math.sin(x * l.freq * 2.3 - phase * 0.7)
                    ).toFixed(2))
            }));
        }

        const waveChart = new ApexCharts(document.querySelector("#waveChart"), {
            chart: {
                ...base,
                type: "area",
                height: "100%",
                sparkline: { enabled: true },
                animations: {
                    enabled: !reduceMotion,
                    easing: "linear",
                    speed: 1200,
                    animateGradually: { enabled: false },
                    dynamicAnimation: { enabled: true, speed: 3000 }
                }
            },
            series: waveSeries(),
            colors: [blue, blueLight, blueSoft],
            stroke: { curve: "smooth", width: [1.5, 1.5, 1.2] },
            fill: {
                type: "gradient",
                gradient: { shadeIntensity: 0, opacityFrom: [0.45, 0.32, 0.22], opacityTo: 0, stops: [0, 95] }
            },
            yaxis: { min: 0, max: 80 },
            tooltip: { enabled: false },
            states: { hover: { filter: { type: "none" } }, active: { filter: { type: "none" } } },
            legend: { show: false }
        });
        waveChart.render();

        // Hareket: sekme görünürken dalgalar akar
        if (!reduceMotion) {
            setInterval(() => {
                if (document.hidden) return;
                phase += 0.9;
                waveChart.updateSeries(waveSeries());
            }, 3000);
        }

        // ---------- 2) Uygulama önizleme kartı ----------
        const week = [2, 4, 3, 6, 5, 3, 1];
        const todayIdx = (new Date().getDay() + 6) % 7; // Pazartesi = 0

        new ApexCharts(document.querySelector("#previewBarChart"), {
            chart: { ...base, type: "bar", height: 170, foreColor: "rgba(255,255,255,0.45)" },
            series: [{ name: "Tamamlanan", data: week }],
            xaxis: {
                categories: ["Pt", "Sa", "Ça", "Pe", "Cu", "Ct", "Pz"],
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: { style: { fontSize: "11px" } }
            },
            yaxis: { show: false },
            grid: { show: false, padding: { left: 0, right: 0, top: -10 } },
            plotOptions: {
                bar: { borderRadius: 5, borderRadiusApplication: "end", columnWidth: "48%", distributed: true }
            },
            colors: week.map((_, idx) => idx === todayIdx ? blueSoft : blue),
            legend: { show: false },
            dataLabels: { enabled: false },
            tooltip: { theme: "dark", y: { formatter: v => v + " görev" } },
            states: { hover: { filter: { type: "lighten", value: 0.08 } } }
        }).render();

        new ApexCharts(document.querySelector("#previewRadialChart"), {
            chart: { ...base, type: "radialBar", height: 170, sparkline: { enabled: true } },
            series: [78],
            colors: [blue],
            plotOptions: {
                radialBar: {
                    hollow: { size: "64%" },
                    track: { background: "rgba(255,255,255,0.06)" },
                    dataLabels: {
                        name: { show: false },
                        value: {
                            offsetY: 8,
                            fontSize: "26px",
                            color: "#ffffff",
                            fontFamily: font,
                            formatter: v => Math.round(v) + "%"
                        }
                    }
                }
            },
            fill: {
                type: "gradient",
                gradient: { shade: "dark", type: "horizontal", gradientToColors: [blueSoft], stops: [0, 100] }
            },
            stroke: { lineCap: "round" }
        }).render();

        // ---------- 3) Özellik kartları ----------
        const miniBase = {
            ...base,
            height: 70,
            sparkline: { enabled: true },
            animations: { enabled: !reduceMotion, speed: 900 }
        };
        const noHover = { hover: { filter: { type: "none" } }, active: { filter: { type: "none" } } };

        new ApexCharts(document.querySelector("#featureChartAdd"), {
            chart: { ...miniBase, type: "bar" },
            series: [{ data: [3, 5, 4, 7, 6, 8, 10, 9, 12] }],
            colors: [blue],
            plotOptions: { bar: { borderRadius: 3, columnWidth: "55%" } },
            fill: { opacity: 0.85 },
            tooltip: { enabled: false },
            states: noHover
        }).render();

        new ApexCharts(document.querySelector("#featureChartTrack"), {
            chart: { ...miniBase, type: "area" },
            series: [{ data: [12, 18, 14, 22, 19, 28, 25, 34, 38] }],
            colors: [blueLight],
            stroke: { curve: "smooth", width: 2 },
            fill: { type: "gradient", gradient: { opacityFrom: 0.35, opacityTo: 0, stops: [0, 100] } },
            tooltip: { enabled: false },
            states: noHover
        }).render();

        new ApexCharts(document.querySelector("#featureChartDone"), {
            chart: { ...miniBase, type: "radialBar", height: 160 },
            series: [100],
            colors: [blue],
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,
                    hollow: { size: "58%" },
                    track: { background: "rgba(255,255,255,0.06)" },
                    dataLabels: { name: { show: false }, value: { show: false } }
                }
            },
            fill: {
                type: "gradient",
                gradient: { shade: "dark", type: "horizontal", gradientToColors: ["#22c55e"], stops: [0, 100] }
            },
            stroke: { lineCap: "round" },
            tooltip: { enabled: false },
            states: noHover
        }).render();
    });
</script>
</body>
</html>
<?php include("includes/footer.php"); ?>