<!DOCTYPE html>
<html lang="en">

<head>

        <noscript> Powered by <a href=“https://www.smartsuApp.com” target=“_blank”>Smartsupp</a></noscript>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

        <title>AltCryptoGEMS | Crypto Trading Platform for everyone</title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="{{ config('brand.title') }}">
        <meta name="author" content="{{ config('brand.site_name') }}">
        <meta name="theme-color" content="#FC5B3F">
        <meta property="og:url" content="{{ request()->url() }}">
        <link rel="canonical" href="{{ request()->url() }}" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/frontends/liquid') }}/img/favicon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/frontends/liquid') }}/img/favicon.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontends/liquid') }}/img/favicon.png">
        <link rel="manifest" href="/wp-content/uploads/fbrfg/site.webmanifest">
        <link rel="mask-icon" href="{{ asset('assets/frontends/liquid') }}/img/favicon.png" color="#5bbad5">
        <link rel="shortcut icon" href="{{ asset('assets/frontends/liquid') }}/img/favicon.png">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="/wp-content/uploads/fbrfg/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        <meta name="generator"
                content="Elementor 3.23.4; features: e_optimized_css_loading, e_font_icon_svg, additional_custom_breakpoints, e_optimized_control_loading, e_lazyload; settings: css_print_method-external, google_font-disabled, font_display-swap">
        <link rel="icon" href="{{ asset('assets/frontends/liquid') }}/img/favicon.png" sizes="32x32" />
        <link rel="icon" href="{{ asset('assets/frontends/liquid') }}/img/favicon.png" sizes="192x192" />
        <link rel='stylesheet' id='gform_basic-css' href='{{ asset(' assets/frontends/solids') }}/css/custom-home.css'
                media='all' />
        <link rel="apple-touch-icon" href="{{ asset('assets/frontends/liquid') }}/img/favicon.png" />
        <meta name="msapplication-TileImage" content="{{ asset('assets/frontends/liquid') }}/img/favicon.png" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
                tailwind.config = {
                        darkMode: 'class',
                        theme: {
                                extend: {
                                        container: {
                                                center: true,
                                        },
                                        backgroundImage: {
                                                'dot-black-0.2': "url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='16' height='16' fill='none'%3e%3ccircle fill='rgb(0 0 0 / 0.2)' id='pattern-circle' cx='10' cy='10' r='1.6257413380501518'%3e%3c/circle%3e%3c/svg%3e\")",
                                                'dot-white-0.2': "url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='16' height='16' fill='none'%3e%3ccircle fill='rgb(255 255 255 / 0.2)' id='pattern-circle' cx='10' cy='10' r='1.6257413380501518'%3e%3c/circle%3e%3c/svg%3e\")",
                                        },

                                        fontSize: {
                                                xs: "0.6rem", // Smaller than default 0.75rem
                                                sm: "0.7rem", // Smaller than default 0.875rem
                                                md: "0.75rem", // Smaller than default 1rem
                                                base: "0.8rem", // Smaller than default 1rem
                                                lg: "0.9rem", // Smaller than default 1.125rem
                                                xl: "1rem", // Smaller than default 1.25rem
                                                "2xl": "1.2rem", // Smaller than default 1.5rem
                                                "3xl": "1.4rem", // Smaller than default 1.875rem
                                                "4xl": "1.6rem", // Smaller than default 2.25rem
                                                "5xl": "1.8rem", // Smaller than default 3rem
                                                "6xl": "2rem", // Smaller than default 4rem
                                                "7xl": "2.2rem", // Smaller than default 5rem
                                                "8xl": "2.4rem", // Smaller than default 6rem
                                                "9xl": "2.6rem", // Smaller than default 8rem
                                                "10xl": "2.8rem", // Smaller than default 10rem
                                        },
                                        // spacing * 0.8
                                        spacing: {
                                                sm: "6.4px", // 80% of the default 8px
                                                md: "9.6px", // 80% of the default 12px
                                                lg: "12px", // 80% of the default 16px
                                                xl: "16px", // 80% of the default 24px
                                                px: "0.75px", // 80% of the default 1px
                                                0.5: "0.1rem", // 80% of 0.125rem
                                                1: "0.2rem", // 80% of 0.25rem
                                                1.5: "0.3rem", // 80% of 0.375rem
                                                2: "0.4rem", // 80% of 0.5rem
                                                2.5: "0.5rem", // 80% of 0.625rem
                                                3: "0.6rem", // 80% of 0.75rem
                                                3.5: "0.7rem", // 80% of 0.875r
                                                4: "0.8rem", // 80% of 1rem
                                                5: "1rem", // 80% of 1.25rem
                                                6: "1.2rem", // 80% of 1.5rem
                                                7: "1.4rem", // 80% of 1.75rem
                                                8: "1.6rem", // 80% of 2rem
                                                9: "1.8rem", // 80% of 2.25rem
                                                10: "2rem", // 80% of 2.5rem
                                                11: "2.2rem", // 80% of 2.75rem
                                                12: "2.4rem", // 80% of 3rem
                                                14: "2.8rem", // 80% of 3.5rem
                                                16: "3.2rem", // 80% of 4rem
                                                20: "4rem", // 80% of 5rem
                                                24: "4.8rem", // 80% of 6rem
                                                28: "5.6rem", // 80% of 7rem
                                                32: "6.4rem", // 80% of 8rem
                                                36: "7.2rem", // 80% of 9rem
                                                40: "8rem", // 80% of 10rem
                                                44: "8.8rem", // 80% of 11rem
                                                48: "9.6rem", // 80% of 12rem
                                                52: "10.4rem", // 80% of 13rem
                                                56: "11.2rem", // 80% of 14rem
                                                60: "12rem", // 80% of 15rem
                                                64: "12.8rem", // 80% of 16rem
                                                72: "14.4rem", // 80% of 18rem
                                                80: "16rem", // 80% of 20rem
                                                96: "19.2rem", // 80% of 24rem
                                        },

                                        screens: {
                                                // Extra small devices (portrait phones)
                                                xss: { max: "280px" },
                                                xs: { min: "280px", max: "479px" },
                                                // Small devices (landscape phones)
                                                sm: "480px",
                                                // Medium devices (tablets)
                                                md: "768px",
                                                // Medium devices (portrait tablets)
                                                mdp: { raw: "(min-width: 768px) and (orientation: portrait)" },
                                                // Medium devices (landscape tablets)
                                                mdl: { raw: "(min-width: 768px) and (orientation: landscape)" },
                                                // Large devices (desktops)
                                                lg: "1024px",
                                                // Extra large devices (large desktops)
                                                xl: "1280px",
                                                // Extra extra large devices
                                                xxl: "1536px",
                                                // Portrait tablets
                                                ptablet: {
                                                        raw: "(min-width: 768px) and (max-width: 1024px) and (orientation: portrait)",
                                                },
                                                // Landscape tablets
                                                ltablet: {
                                                        raw: "(min-width: 768px) and (max-width: 1024px) and (orientation: landscape)",
                                                },
                                                // Portrait small devices
                                                smdp: { raw: "(min-width: 640px) and (orientation: portrait)" },
                                                // Landscape small devices
                                                smdl: { raw: "(min-width: 640px) and (orientation: landscape)" },
                                                // High Resolution devices
                                                hdpi: {
                                                        raw: "(-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi)",
                                                },
                                        },

                                        fontFamily: {
                                                sans: ["var(--font-inter)"],
                                        },
                                        colors: {
                                                muted: {
                                                        50: "#f9f9fa",
                                                        100: "#f3f3f4",
                                                        150: "#ededee",
                                                        200: "#dfdfe1",
                                                        300: "#cfcfd3",
                                                        400: "#9e9ea7",
                                                        500: "#6e6e76",
                                                        600: "#4b4b55",
                                                        700: "#3f3f46",
                                                        800: "#27272a",
                                                        850: "#252529",
                                                        900: "#1c1c1f",
                                                        950: "#141416",
                                                        1000: "#0b0b0d",
                                                },
                                                primary: {
                                                        '50': "#eef2ff",
                                                        '100': "#e0e7ff",
                                                        '200': "#c7d2fe",
                                                        '300': "#a5b4fc",
                                                        '400': "#818cf8",
                                                        '500': "#6366f1",
                                                        '600': "#4f46e5",
                                                        '700': "#4338ca",
                                                        '800': "#3730a3",
                                                        '900': "#312e81",
                                                        '950': "#1e1b4b",
                                                },
                                                info: {
                                                        '50': "#f0f9ff",
                                                        '100': "#e0f2fe",
                                                        '200': "#bae6fd",
                                                        '300': "#7dd3fc",
                                                        '400': "#38bdf8",
                                                        '500': "#0ea5e9",
                                                        '600': "#0284c7",
                                                        '700': "#0369a1",
                                                        '800': "#075985",
                                                        '900': "#0c4a6e",
                                                        '950': "#082f49",
                                                },
                                                success: {
                                                        '50': "#f0fdfa",
                                                        '100': "#ccfbf1",
                                                        '200': "#99f6e4",
                                                        '300': "#5eead4",
                                                        '400': "#2dd4bf",
                                                        '500': "#14b8a6",
                                                        '600': "#0d9488",
                                                        '700': "#0f766e",
                                                        '800': "#115e59",
                                                        '900': "#134e4a",
                                                        '950': "#042f2e",
                                                },
                                                warning: {
                                                        '50': "#fffbeb",
                                                        '100': "#fef3c7",
                                                        '200': "#fde68a",
                                                        '300': "#fcd34d",
                                                        '400': "#fbbf24",
                                                        '500': "#f59e0b",
                                                        '600': "#d97706",
                                                        '700': "#b45309",
                                                        '800': "#92400e",
                                                        '900': "#78350f",
                                                        '950': "#451a03",
                                                },
                                                danger: {
                                                        '50': "#fff1f2",
                                                        '100': "#ffe4e6",
                                                        '200': "#fecdd3",
                                                        '300': "#fda4af",
                                                        '400': "#fb7185",
                                                        '500': "#f43f5e",
                                                        '600': "#e11d48",
                                                        '700': "#be123c",
                                                        '800': "#9f1239",
                                                        '900': "#881337",
                                                        '950': "#4c0519",
                                                },
                                        },

                                        typography: (theme) => {
                                                return {
                                                        DEFAULT: {
                                                                css: [
                                                                        {
                                                                                maxWidth: "inherit",
                                                                                lineHeight: theme("lineHeight.snug"),
                                                                                // These default styles are overridden in global.css
                                                                                h1: {
                                                                                        color: theme("colors.zinc.800"),
                                                                                        marginTop: theme("margin.8"),
                                                                                        marginBottom: theme("margin.6"),
                                                                                },
                                                                                h2: {
                                                                                        color: theme("colors.zinc.800"),
                                                                                        marginTop: theme("margin.8"),
                                                                                        marginBottom: theme("margin.6"),
                                                                                },
                                                                                h3: {
                                                                                        color: theme("colors.zinc.800"),
                                                                                        marginTop: theme("margin.6"),
                                                                                        marginBottom: theme("margin.4"),
                                                                                },
                                                                                h4: {
                                                                                        color: theme("colors.zinc.800"),
                                                                                        marginTop: theme("margin.6"),
                                                                                        marginBottom: theme("margin.4"),
                                                                                },
                                                                                h5: {
                                                                                        color: "var(--tw-prose-headings)",
                                                                                        marginTop: theme("margin.6"),
                                                                                        marginBottom: theme("margin.4"),
                                                                                },
                                                                                h6: {
                                                                                        color: "var(--tw-prose-headings)",
                                                                                        marginTop: theme("margin.6"),
                                                                                        marginBottom: theme("margin.4"),
                                                                                },
                                                                                figcaption: {
                                                                                        margin: 0,
                                                                                        paddingTop: theme("padding.4"),
                                                                                        paddingBottom: theme("padding.4"),
                                                                                        textAlign: "center",
                                                                                        backgroundColor: theme("colors.omega.800"),
                                                                                        color: theme("colors.omega.400"),
                                                                                },
                                                                                ":is(h1, h2, h3, h4, h5, h6):first-child": {
                                                                                        marginTop: "0",
                                                                                },
                                                                                "figure:first-child > img": {
                                                                                        marginTop: "0",
                                                                                },
                                                                                blockquote: {
                                                                                        fontWeight: theme("fontWeight.normal"),
                                                                                },
                                                                                a: {
                                                                                        textDecoration: "none",
                                                                                },
                                                                                th: {
                                                                                        backgroundColor: theme("colors.omega.800"),
                                                                                },
                                                                                "td, th": {
                                                                                        paddingTop: theme("padding.2"),
                                                                                        paddingBottom: theme("padding.2"),
                                                                                        paddingRight: theme("padding.4"),
                                                                                        paddingLeft: theme("padding.4"),
                                                                                },
                                                                                code: {
                                                                                        fontWeight: theme("fontWeight.normal"),
                                                                                },
                                                                                "code::before": {
                                                                                        content: '""',
                                                                                },
                                                                                "code::after": {
                                                                                        content: '""',
                                                                                },
                                                                                "ul > li > *:first-child": {
                                                                                        margin: 0,
                                                                                },
                                                                                "ul > li > *:last-child": {
                                                                                        margin: 0,
                                                                                },
                                                                        },
                                                                ],
                                                        },
                                                        dark: {
                                                                css: [
                                                                        {
                                                                                color: theme("colors.zinc.200"),
                                                                                strong: { color: theme("colors.zinc.100") },
                                                                                h1: { color: theme("colors.zinc.100") },
                                                                                h2: { color: theme("colors.zinc.100") },
                                                                                h3: { color: theme("colors.zinc.100") },
                                                                                li: { color: theme("colors.zinc.300") },
                                                                                h4: { color: theme("colors.zinc.200") },
                                                                                h5: { color: "var(--tw-prose-headings)" },
                                                                                h6: { color: "var(--tw-prose-headings)" },
                                                                                figcaption: {
                                                                                        backgroundColor: theme("colors.omega.800"),
                                                                                        color: theme("colors.omega.400"),
                                                                                },
                                                                                th: {
                                                                                        backgroundColor: theme("colors.omega.800"),
                                                                                },
                                                                                blockquote: {
                                                                                        fontWeight: theme("fontWeight.normal"),
                                                                                        color: theme("colors.zinc.200"),
                                                                                },
                                                                                a: {
                                                                                        textDecoration: "none",
                                                                                },
                                                                        },
                                                                ],
                                                        },
                                                };
                                        },
                                        gridTemplateColumns: {
                                                fluid:
                                                        "repeat(auto-fit, minmax(var(--tw-fluid-col-min, 20rem), var(--tw-fluid-col-max, 1fr)))",
                                        },
                                        keyframes: {
                                                indeterminate: {
                                                        "0%": { "margin-left": "-10%" },
                                                        "100%": { "margin-left": "100%" },
                                                },
                                                "circle-chart-fill": {
                                                        to: {
                                                                "stroke-dasharray": "0 100",
                                                        },
                                                },
                                                wave: {
                                                        "0%": {
                                                                transform: "scale(1)",
                                                                opacity: "1",
                                                        },

                                                        "25%": {
                                                                transform: "scale(1)",
                                                                opacity: "1",
                                                        },

                                                        "100%": {
                                                                transform: "scale(4.5)",
                                                                opacity: "0",
                                                        },
                                                },
                                                fadeInUp: {
                                                        from: {
                                                                transform: "translate3d(0, 20px, 0)",
                                                        },

                                                        to: {
                                                                transform: "translate3d(0, 0, 0)",
                                                                opacity: 1,
                                                        },
                                                },
                                                fadeInLeft: {
                                                        from: {
                                                                transform: "translate3d(20px, 0, 0)",
                                                                opacity: "0",
                                                        },
                                                        to: {
                                                                transform: "translate3d(0, 0, 0)",
                                                                opacity: "1",
                                                        },
                                                },
                                                spinAround: {
                                                        from: {
                                                                transform: "rotate(0deg)",
                                                        },

                                                        to: {
                                                                transform: "rotate(359deg)",
                                                        },
                                                },
                                                spotlight: {
                                                        "0%": {
                                                                opacity: 0,
                                                                transform: "translate(-72%, -62%) scale(0.5)",
                                                        },
                                                        "100%": {
                                                                opacity: 1,
                                                                transform: "translate(-50%,-40%) scale(1)",
                                                        },
                                                },
                                                "fade-in": {
                                                        "0%": { opacity: 0 },
                                                        "100%": { opacity: 1 },
                                                },
                                                "grow-in": {
                                                        "0%": { transform: "scale(0)" },
                                                        "100%": { transform: "scale(1)" },
                                                },
                                                typing: {
                                                        "0%": { width: 0 },
                                                        "100%": { width: "100%" },
                                                },
                                                "blink-caret": {
                                                        "50%": { opacity: 0 },
                                                },
                                        },
                                        animation: {
                                                "spin-slow": "spin 3s linear infinite",
                                                "spin-fast": "spin 0.65s linear infinite",
                                                indeterminate: "indeterminate 1s cubic-bezier(0.4, 0, 0.2, 1) infinite",
                                                spotlight: "spotlight 2s ease .75s 1 forwards",
                                                "fade-in": "fade-in 0.5s ease-in forwards",
                                                "grow-in": "grow-in 0.25s ease-in-out forwards",
                                                blink: "blink-caret .75s steps(17, end) infinite",
                                                typewriter: "typing 2s steps(30, end)",
                                        },
                                },
                        }
                }
        </script>
        <style>
                @keyframes rotate {
                        from {
                                transform: rotate(0deg);
                        }

                        to {
                                transform: rotate(360deg);
                        }
                }

                .rotating {
                        animation: rotate 4s linear infinite;
                }

                .hover-animate {
                        animation: moveToLeft 2s forwards ease-in-out infinite;
                }

                @keyframes moveToLeft {
                        0% {
                                transform: translateX(0);
                        }

                        10% {
                                transform: translateX(-2.5px);
                        }

                        20% {
                                transform: translateX(-5px);
                        }

                        30% {
                                transform: translateX(-2.5px);
                        }

                        40% {
                                transform: translateX(0);
                        }

                        50% {
                                transform: translateX(2.5px);
                        }

                        60% {
                                transform: translateX(5px);
                        }

                        70% {
                                transform: translateX(2.5px);
                        }

                        80% {
                                transform: translateX(0);
                        }

                        90% {
                                transform: translateX(-2.5px);
                        }

                        100% {
                                transform: translateX(-5px);
                        }
                }

                .animation-sliding-img-up-1 {
                        animation: sliding-img-up-1 30s linear infinite;
                }

                .animation-sliding-img-up-2 {
                        animation: sliding-img-up-2 30s linear infinite;
                }

                .animation-sliding-img-down-1 {
                        animation: sliding-img-down-1 30s linear infinite;
                }

                @keyframes infinite-carousel-x {
                        0% {
                                transform: translateX(calc(-400px * 7));
                        }

                        100% {
                                transform: translateX(0);
                        }
                }

                @keyframes infinite-carousel-x-reverse {
                        0% {
                                transform: translateX(0);
                        }

                        100% {
                                transform: translateX(calc(-400px * 7));
                        }
                }

                @media (max-width: 1320px) {
                        @keyframes infinite-carousel-x {
                                0% {
                                        transform: translateX(calc(-300px * 7));
                                }

                                100% {
                                        transform: translateX(0);
                                }
                        }

                        @keyframes infinite-carousel-x-reverse {
                                0% {
                                        transform: translateX(0);
                                }

                                100% {
                                        transform: translateX(calc(-300px * 7));
                                }
                        }
                }

                @media (max-width: 640px) {
                        @keyframes infinite-carousel-x {
                                0% {
                                        transform: translateX(calc(-250px * 7));
                                }

                                100% {
                                        transform: translateX(0);
                                }
                        }

                        @keyframes infinite-carousel-x-reverse {
                                0% {
                                        transform: translateX(0);
                                }

                                100% {
                                        transform: translateX(calc(-250px * 7));
                                }
                        }
                }

                @keyframes shine {
                        0% {
                                background-position: 0% 50%;
                        }

                        100% {
                                background-position: 100% 50%;
                        }
                }

                @keyframes sliding-img-up-1 {
                        0% {
                                transform: translateY(0);
                        }

                        100% {
                                transform: translateY(-722px);
                        }
                }

                @keyframes sliding-img-up-2 {
                        0% {
                                transform: translateY(0);
                        }

                        100% {
                                transform: translateY(-1098px);
                        }
                }

                @keyframes sliding-img-down-1 {
                        0% {
                                transform: translateY(-1161px);
                        }

                        100% {
                                transform: translateY(0);
                        }
                }

                @keyframes sliding-img-down-2 {
                        0% {
                                transform: translateY(-1389px);
                        }

                        100% {
                                transform: translateY(0);
                        }
                }

                @media (min-width: 640px) {
                        @keyframes sliding-img-up-1 {
                                0% {
                                        transform: translateY(0);
                                }

                                100% {
                                        transform: translateY(-936px);
                                }
                        }

                        @keyframes sliding-img-up-2 {
                                0% {
                                        transform: translateY(0);
                                }

                                100% {
                                        transform: translateY(-1438px);
                                }
                        }

                        @keyframes sliding-img-down-1 {
                                0% {
                                        transform: translateY(-1511px);
                                }

                                100% {
                                        transform: translateY(0);
                                }
                        }

                        @keyframes sliding-img-down-2 {
                                0% {
                                        transform: translateY(-1135px);
                                }

                                100% {
                                        transform: translateY(0);
                                }
                        }
                }

                @media (min-width: 1024px) {
                        @keyframes sliding-img-up-1 {
                                0% {
                                        transform: translateY(0);
                                }

                                100% {
                                        transform: translateY(-615px);
                                }
                        }

                        @keyframes sliding-img-up-2 {
                                0% {
                                        transform: translateY(0);
                                }

                                100% {
                                        transform: translateY(-928px);
                                }
                        }

                        @keyframes sliding-img-down-1 {
                                0% {
                                        transform: translateY(-986px);
                                }

                                100% {
                                        transform: translateY(0);
                                }
                        }

                        @keyframes sliding-img-down-2 {
                                0% {
                                        transform: translateY(-928px);
                                }

                                100% {
                                        transform: translateY(0);
                                }
                        }
                }

                @keyframes sliding-img-right-1 {
                        0% {
                                background-position-x: 0;
                        }

                        100% {
                                background-position-x: -2880px;
                        }
                }

                @keyframes sliding-img-left-1 {
                        0% {
                                background-position-x: 0;
                        }

                        100% {
                                background-position-x: 2880px;
                        }
                }

                .pulsing-circle {
                        fill: none;
                        stroke-width: 2;
                        animation: pulsingCircle 1.5s infinite;
                }

                @keyframes pulsingCircle {
                        0% {
                                r: 3;
                                opacity: 1;
                        }

                        100% {
                                r: 15;
                                opacity: 0;
                        }
                }
        </style>
        <style>
                html,
                body {
                        font-family: "Inter", "acumin-pro", -apple-system, BlinkMacSystemFont,
                                "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans",
                                "Droid Sans", "Helvetica Neue", sans-serif;
                        font-size: 16px;
                }


                @layer base {

                        .order-input::-webkit-inner-spin-button,
                        .order-input::-webkit-outer-spin-button {
                                -webkit-appearance: none;
                                margin: 0;
                        }

                        .component-selected {
                                @apply relative;
                        }

                        .component-selected::after {
                                content: " ";
                                @apply border-info-500 border border-dashed w-full h-full absolute left-0 top-0 pointer-events-none block;
                        }
                }

                .hidden-scrollbar {
                        -ms-overflow-style: none;
                        /* Internet Explorer 10+ */
                        scrollbar-width: none;
                        /* Firefox */
                }

                .hidden-scrollbar::-webkit-scrollbar {
                        display: none;
                        /* Safari and Chrome */
                }

                .ease-animation {
                        transition-timing-function: ease-in;
                        transition: 0.2s cubic-bezier(0.2, 1, 0.2, 1);
                }

                .no-transition * {
                        transition-property: none !important;
                        transition-duration: 0 !important;
                }

                :root {
                        --editor-background-color: #ffffff;
                        --editor-text-color: #000000;
                        --toolbar-background-color: #f0f0f0;
                        --toolbar-border-color: #cccccc;
                        --editor-border-color: #dddddd;
                }

                body.dark-mode {
                        --editor-background-color: #333333;
                        --editor-text-color: #ffffff;
                        --toolbar-background-color: #444444;
                        --toolbar-border-color: #555555;
                        --editor-border-color: #666666;
                }

                .quillEditor {
                        background-color: var(--editor-background-color);
                        color: var(--editor-text-color);
                }

                .ql-toolbar.ql-snow {
                        background-color: var(--toolbar-background-color);
                        border: 1px solid var(--toolbar-border-color);
                }

                .ql-container.ql-snow {
                        border: 1px solid var(--editor-border-color);
                        color: var(--editor-text-color);
                }

                .ql-editor {
                        min-height: 200px;
                }

                .ql-editor p {
                        color: var(--editor-text-color);
                }

                @keyframes slow-gradient {
                        0% {
                                background-position: 0% 50%;
                        }

                        50% {
                                background-position: 100% 50%;
                        }

                        100% {
                                background-position: 0% 50%;
                        }
                }

                .animate-slow-gradient {
                        background-size: 200% 200%;
                        animation: slow-gradient 6s ease infinite;
                }

                /* Add this CSS in your global styles file */
                .custom-scroll::-webkit-scrollbar {
                        width: 0;
                        /* Hide the scrollbar */
                }

                .custom-scroll {
                        -ms-overflow-style: none;
                        /* IE and Edge */
                        scrollbar-width: none;
                        /* Firefox */
                }
        </style>
        <style>
                /* Custom color palette */
                :root {
                        --color-primary: #4338ca;
                        --color-info: #0ea5e9;
                        --color-success: #10b981;
                        --color-warning: #f59e0b;
                        --color-danger: #f43f5e;
                        --color-muted: #6b7280;
                }

                /* Custom font sizes */
                .text-xs {
                        font-size: 0.6rem;
                }

                .text-sm {
                        font-size: 0.7rem;
                }

                .text-md {
                        font-size: 0.75rem;
                }

                .text-lg {
                        font-size: 0.9rem;
                }

                .text-xl {
                        font-size: 1rem;
                }

                .text-2xl {
                        font-size: 1.2rem;
                }

                .text-3xl {
                        font-size: 1.4rem;
                }

                /* Additional font sizes if needed */

                /* Custom container centering */
                .container {
                        max-width: 100%;
                        margin-left: auto;
                        margin-right: auto;
                }

                /* Breakpoints for responsive design */
                @media (max-width: 479px) {
                        .xs\:text-lg {
                                font-size: 0.9rem;
                        }
                }

                @media (min-width: 480px) {
                        .sm\:text-lg {
                                font-size: 0.9rem;
                        }
                }

                @media (min-width: 768px) {
                        .md\:text-lg {
                                font-size: 0.9rem;
                        }
                }

                @media (min-width: 1024px) {
                        .lg\:text-lg {
                                font-size: 0.9rem;
                        }
                }

                @media (min-width: 1280px) {
                        .xl\:text-lg {
                                font-size: 0.9rem;
                        }
                }

                @media (min-width: 1536px) {
                        .xxl\:text-lg {
                                font-size: 0.9rem;
                        }
                }

                /* Custom animations */
                @keyframes fade-in {
                        from {
                                opacity: 0;
                        }

                        to {
                                opacity: 1;
                        }
                }

                .animate-fade-in {
                        animation: fade-in 0.5s ease-in forwards;
                }

                /* Custom classes for slim scroll */
                .slimscroll::-webkit-scrollbar {
                        width: 6px;
                }

                .slimscroll::-webkit-scrollbar-thumb {
                        background-color: var(--color-muted);
                        border-radius: 8px;
                }
        </style>
        <style>
                .resizer-handle {
                        position: absolute;
                        z-index: 50;
                        background-color: #ccc;
                        /* Visible color */
                }

                .resizer {
                        transform: translateZ(0);
                        display: block;
                        z-index: 50;
                }

                .resizer-x {
                        cursor: ew-resize;
                        /* Horizontal resize cursor */
                }

                .resizer-x::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        bottom: 0;
                        margin-left: -4px;
                        width: 24px;
                        z-index: 50;
                }

                .resizer-x::after {
                        content: "";
                        display: flex;
                        background: rgba(2, 2, 2, 0.354);
                        border-radius: 50px;
                        position: absolute;
                        width: 4px;
                        height: 10%;
                        top: 45%;
                        margin-left: 6px;
                        opacity: 1;
                }

                .resizer-x:hover::after {
                        background: rgba(2, 2, 2, 0.554);
                }

                .resizer-y {
                        cursor: ns-resize;
                        /* Vertical resize cursor */
                }

                .resizer-y::before {
                        content: "";
                        position: absolute;
                        left: 0;
                        right: 0;
                        margin-top: -4px;
                        height: 24px;
                        z-index: 50;
                }

                .resizer-y::after {
                        content: "";
                        display: flex;
                        background: rgba(2, 2, 2, 0.354);
                        border-radius: 50px;
                        position: absolute;
                        height: 4px;
                        width: 10%;
                        left: 45%;
                        margin-top: 6px;
                        opacity: 1;
                }

                .resizer-y:hover::after {
                        background: rgba(2, 2, 2, 0.554);
                }

                .scrollbar-hidden {
                        -ms-overflow-style: none;
                        /* IE and Edge */
                        scrollbar-width: none;
                        /* Firefox */

                        /* Chrome, Safari and Opera */
                        &::-webkit-scrollbar {
                                display: none;
                        }
                }

                .border-thin {
                        @apply border border-gray-200 dark:border-gray-900;
                }

                ::-webkit-scrollbar {
                        width: 8px;
                        height: 8px;
                        background-color: transparent;
                }

                .dark ::-webkit-scrollbar {
                        width: 8px;
                        height: 8px;
                        background-color: #18181b;
                }

                .dark .slimscroll::-webkit-scrollbar {
                        border-radius: 12px;
                }

                ::-webkit-scrollbar-track {
                        background-color: #f4f4f5;
                        border-radius: 8px;
                }

                .dark ::-webkit-scrollbar-track {
                        background: #09090b;
                        border-radius: 8px;
                }

                .dark .slimscroll::-webkit-scrollbar-track {
                        background: #18181b;
                        border-radius: 12px;
                }

                ::-webkit-scrollbar-thumb {
                        background-color: #d4d4d8;
                        border: 2px solid #f4f4f5;
                        border-radius: 8px;
                }

                .dark ::-webkit-scrollbar-thumb {
                        background-color: #27272a;
                        border: 2px solid #09090b;
                        border-radius: 8px;
                }

                .dark .slimscroll::-webkit-scrollbar-thumb {
                        background-color: #27272a;
                        border: 2px solid #18181b;
                        border-radius: 12px;
                }

                ::-webkit-scrollbar-thumb:hover {
                        background-color: #a1a1aa;
                }

                .dark ::-webkit-scrollbar-thumb:hover {
                        background-color: #3f3f46;
                }

                .card-dashed {
                        @apply p-4 border rounded-md border-gray-300 dark:border-gray-600 border-dashed;
                }

                .card {
                        @apply border rounded-md border-gray-300 dark:border-gray-600;
                }

                .hover-card {
                        transition: opacity 0.3s, visibility 0.3s;
                        opacity: 0;
                        visibility: hidden;
                        position: fixed;
                        z-index: 20;
                        /* Adjust based on your layout */
                }

                .hover-card.visible {
                        opacity: 1;
                        visibility: visible;
                }

                .text-muted {
                        @apply text-muted-500 hover:text-muted-600 dark:text-muted-400 dark:hover:text-muted-300;
                }

                .scrollbar-hidden {
                        -ms-overflow-style: none;
                        /* IE and Edge */
                        scrollbar-width: none;
                        /* Firefox */

                        /* Chrome, Safari and Opera */
                        &::-webkit-scrollbar {
                                display: none;
                        }
                }

                .border-thin {
                        @apply border border-gray-200 dark:border-gray-900;
                }

                ::-webkit-scrollbar {
                        width: 8px;
                        height: 8px;
                        background-color: transparent;
                }

                .dark ::-webkit-scrollbar {
                        width: 8px;
                        height: 8px;
                        background-color: #18181b;
                }

                .dark .slimscroll::-webkit-scrollbar {
                        border-radius: 12px;
                }

                ::-webkit-scrollbar-track {
                        background-color: #f4f4f5;
                        border-radius: 8px;
                }

                .dark ::-webkit-scrollbar-track {
                        background: #09090b;
                        border-radius: 8px;
                }

                .dark .slimscroll::-webkit-scrollbar-track {
                        background: #18181b;
                        border-radius: 12px;
                }

                ::-webkit-scrollbar-thumb {
                        background-color: #d4d4d8;
                        border: 2px solid #f4f4f5;
                        border-radius: 8px;
                }

                .dark ::-webkit-scrollbar-thumb {
                        background-color: #27272a;
                        border: 2px solid #09090b;
                        border-radius: 8px;
                }

                .dark .slimscroll::-webkit-scrollbar-thumb {
                        background-color: #27272a;
                        border: 2px solid #18181b;
                        border-radius: 12px;
                }

                ::-webkit-scrollbar-thumb:hover {
                        background-color: #a1a1aa;
                }

                .dark ::-webkit-scrollbar-thumb:hover {
                        background-color: #3f3f46;
                }

                .loader {
                        animation: loaderRotate 2s linear infinite;
                        z-index: 2;
                }

                .loader .path {
                        stroke: currentColor;
                        stroke-linecap: round;
                        animation: loaderDash 1.5s ease-in-out infinite;
                }

                @keyframes loaderRotate {
                        0% {
                                transform: rotate(0deg);
                                transform-origin: center;
                        }

                        100% {
                                transform: rotate(360deg);
                                transform-origin: center;
                        }
                }

                @keyframes loaderDash {
                        0% {
                                stroke-dasharray: 1, 150;
                                stroke-dashoffset: 0;
                        }

                        50% {
                                stroke-dasharray: 90, 150;
                                stroke-dashoffset: -35;
                        }

                        100% {
                                stroke-dasharray: 90, 150;
                                stroke-dashoffset: -124;
                        }
                }

                .fade-slide {
                        opacity: 0;
                        transform: translateY(20px);
                        transition: opacity 1s ease, transform 1s ease;
                }

                .fade-slide.show {
                        opacity: 1;
                        transform: translateY(0);
                }
        </style>
</head>
<!-- Smartsupp Live Chat script -->
<!-- <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '7697792b3821879a2ce4b83b4104f0c855e4696f';
        window.smartsupp || (function (d) {
                var s, c, o = smartsupp = function () { o._.push(arguments) }; o._ = [];
                s = d.getElementsByTagName('script')[0]; c = d.createElement('script');
                c.type = 'text/javascript'; c.charset = 'utf-8'; c.async = true;
                c.src = 'https://www.smartsuppchat.com/loader.js?'; s.parentNode.insertBefore(c, s);
        })(document);
</script> -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'f918881d5a8a3e63506f0a64567cfce0d45f81b9';
window.smartsupp||(function(d) {
var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
s=d.getElementsByTagName('script')[0];c=d.createElement('script');
c.type='text/javascript';c.charset='utf-8';c.async=true;
c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>

<body class="dark">
        <div>
                <nav class="relative z-[11] border-b border-muted-200 bg-white dark:border-muted-900 dark:bg-muted-900"
                        role="navigation" aria-label="main navigation">
                        <div class="false flex flex-col lg:flex-row min-h-[2.6rem] items-stretch justify-center w-full">
                                <div class="flex justify-between items-center px-3"><a
                                                class="relative flex flex-shrink-0 flex-grow-0 items-center rounded-[.52rem] px-3 py-2 no-underline transition-all duration-300"
                                                href="/">
                                                <div
                                                        class="flex items-center h-[30px] w-[100px] max-w-[100px] w-[100px] text-muted-900 dark:text-white">
                                                        <img src="/assets/HomePageLogo.png" alt="Workflow" width="100"
                                                                height="30" class="max-h-full w-full fill-current">
                                                </div>
                                        </a>
                                        <div class="flex items-center justify-center">

                                                <!-- my code -->

                                                <div>
                                                        <button id="menu-toggle" type="button"
                                                                class="relative ms-auto block h-[2.6rem] w-[2.6rem] cursor-pointer appearance-none border-none bg-none text-muted-400 lg:hidden"
                                                                aria-label="menu" aria-expanded="false">
                                                                <span aria-hidden="true"
                                                                        class="absolute start-[calc(50%-8px)] top-[calc(50%-6px)] block h-px w-4 origin-center bg-current transition-all duration-[86ms] ease-out scale-[1.1]"></span>
                                                                <span aria-hidden="true"
                                                                        class="absolute start-[calc(50%-8px)] top-[calc(50%-1px)] block h-px w-4 origin-center scale-[1.1] bg-current transition-all duration-[86ms] ease-out"></span>
                                                                <span aria-hidden="true"
                                                                        class="absolute start-[calc(50%-8px)] top-[calc(50%+4px)] block h-px w-4 origin-center scale-[1.1] bg-current transition-all duration-[86ms] ease-out scale-[1.1]"></span>
                                                        </button>

                                                </div>


                                        </div>
                                </div>

                                <style>
                                        .menu {
                                                display: none;
                                        }

                                        @media (min-width: 1024px) {
                                                .menu {
                                                        display: block;
                                                }
                                        }
                                </style>


                                <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                                function toggleMenus() {
                                                        const menus = document.querySelectorAll('.menu');

                                                        menus.forEach(menu => {
                                                                if (menu.style.display === 'none' || menu.style.display === '') {
                                                                        menu.style.display = 'block';
                                                                } else {
                                                                        menu.style.display = 'none';
                                                                }
                                                        });
                                                }

                                                const toggleButton = document.getElementById('menu-toggle');
                                                if (toggleButton) {
                                                        toggleButton.addEventListener('click', function (event) {
                                                                event.preventDefault();
                                                                toggleMenus();
                                                        });
                                                } else {
                                                        console.error('Menu toggle button not found');
                                                }

                                                if (window.innerWidth <= 1024) {
                                                        const menus = document.querySelectorAll('.menu');
                                                        menus.forEach(menu => {
                                                                menu.style.display = 'none';
                                                        });
                                                }
                                        });

                                </script>

                                <div id="menu-1" class="menu" style="display: none;">
                                        <a class="dropdown-menu hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between"
                                                id="trade-menu">
                                                <div class="flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                                role="img" class="h-5 w-5 iconify iconify--solar"
                                                                width="1em" height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                        d="M3.293 9.293C3 9.586 3 10.057 3 11v6c0 .943 0 1.414.293 1.707S4.057 19 5 19s1.414 0 1.707-.293S7 17.943 7 17v-6c0-.943 0-1.414-.293-1.707S5.943 9 5 9s-1.414 0-1.707.293">
                                                                </path>
                                                                <path fill="currentColor"
                                                                        d="M17.293 2.293C17 2.586 17 3.057 17 4v13c0 .943 0 1.414.293 1.707S18.057 19 19 19s1.414 0 1.707-.293S21 17.943 21 17V4c0-.943 0-1.414-.293-1.707S19.943 2 19 2s-1.414 0-1.707.293"
                                                                        opacity=".4">
                                                                </path>
                                                                <path fill="currentColor"
                                                                        d="M10 7c0-.943 0-1.414.293-1.707S11.057 5 12 5s1.414 0 1.707.293S14 6.057 14 7v10c0 .943 0 1.414-.293 1.707S12.943 19 12 19s-1.414 0-1.707-.293S10 17.943 10 17z"
                                                                        opacity=".7">
                                                                </path>
                                                                <path fill="currentColor"
                                                                        d="M3 21.25a.75.75 0 0 0 0 1.5h18a.75.75 0 0 0 0-1.5z">
                                                                </path>
                                                        </svg>
                                                        <div class="ml-3 flex flex-col">
                                                                <span class="text-sm">Trade</span>
                                                        </div>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                                                        class="h-5 w-5 transition-transform rotate-0 iconify iconify--mdi"
                                                        width="1em" height="1em" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                                d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                        </path>
                                                </svg>
                                        </a>

                                        <div
                                                class="dropdown-sub-menu z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-0 lg:top-full lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                        href="/app/dashboard"><svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true" role="img"
                                                                class="h-5 w-5 iconify iconify--solar" width="1em"
                                                                height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                        d="M3.293 9.293C3 9.586 3 10.057 3 11v6c0 .943 0 1.414.293 1.707S4.057 19 5 19s1.414 0 1.707-.293S7 17.943 7 17v-6c0-.943 0-1.414-.293-1.707S5.943 9 5 9s-1.414 0-1.707.293">
                                                                </path>
                                                                <path fill="currentColor"
                                                                        d="M17.293 2.293C17 2.586 17 3.057 17 4v13c0 .943 0 1.414.293 1.707S18.057 19 19 19s1.414 0 1.707-.293S21 17.943 21 17V4c0-.943 0-1.414-.293-1.707S19.943 2 19 2s-1.414 0-1.707.293"
                                                                        opacity=".4"></path>
                                                                <path fill="currentColor"
                                                                        d="M10 7c0-.943 0-1.414.293-1.707S11.057 5 12 5s1.414 0 1.707.293S14 6.057 14 7v10c0 .943 0 1.414-.293 1.707S12.943 19 12 19s-1.414 0-1.707-.293S10 17.943 10 17z"
                                                                        opacity=".7"></path>
                                                                <path fill="currentColor"
                                                                        d="M3 21.25a.75.75 0 0 0 0 1.5h18a.75.75 0 0 0 0-1.5z">
                                                                </path>
                                                        </svg>
                                                        <div class="flex flex-col"><span class="text-sm">Spot
                                                                        Trading</span><span
                                                                        class="text-xs text-muted-400 dark:text-muted-500 leading-none">View
                                                                        the
                                                                        latest market
                                                                        data.</span></div>
                                                </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                        href="/app/dashboard"><svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true" role="img"
                                                                class="h-5 w-5 iconify iconify--solar" width="1em"
                                                                height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor" fill-rule="evenodd"
                                                                        d="M14 20.5V4.25c0-.728-.002-1.2-.048-1.546c-.044-.325-.115-.427-.172-.484s-.159-.128-.484-.172C12.949 2.002 12.478 2 11.75 2s-1.2.002-1.546.048c-.325.044-.427.115-.484.172s-.128.159-.172.484c-.046.347-.048.818-.048 1.546V20.5z"
                                                                        clip-rule="evenodd">
                                                                </path>
                                                                <path fill="currentColor"
                                                                        d="M8 8.75A.75.75 0 0 0 7.25 8h-3a.75.75 0 0 0-.75.75V20.5H8zm12 5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75v6.75H20z"
                                                                        opacity=".7"></path>
                                                                <path fill="currentColor"
                                                                        d="M1.75 20.5a.75.75 0 0 0 0 1.5h20a.75.75 0 0 0 0-1.5z"
                                                                        opacity=".5">
                                                                </path>
                                                        </svg>
                                                        <div class="flex flex-col"><span class="text-sm">Futures
                                                                        Trading</span><span
                                                                        class="text-xs text-muted-400 dark:text-muted-500 leading-none">Trade
                                                                        futures
                                                                        contracts.</span></div>
                                                </a>
                                                <div
                                                        class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                        <a href="/app/forex"
                                                                class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                <div class="flex items-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="m3.5 18.5l6-6l4 4L22 6.92L20.59 5.5l-7.09 8l-4-4L2 17z">
                                                                                </path>
                                                                        </svg>
                                                                        <div class="ml-3 flex flex-col">
                                                                                <span class="text-sm">Forex
                                                                                        Trading</span><span
                                                                                        class="text-xs text-muted-400 dark:text-muted-500 leading-none">Trade
                                                                                        forex
                                                                                        with
                                                                                        meta
                                                                                        trader 4
                                                                                        and
                                                                                        5.</span>
                                                                        </div>
                                                                </div><svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img"
                                                                        class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                        width="1em" height="1em" viewBox="0 0 24 24">
                                                                        <path fill="currentColor"
                                                                                d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                        </path>
                                                                </svg>
                                                        </a>
                                                        <div
                                                                class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                        href="/app/forex"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.28A2 2 0 0 0 22 15V9a2 2 0 0 0-1-1.72V5a2 2 0 0 0-2-2zm0 2h14v2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6v2H5zm8 4h7v6h-7zm3 1.5a1.5 1.5 0 0 0-1.5 1.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 0 1.5-1.5a1.5 1.5 0 0 0-1.5-1.5">
                                                                                </path>
                                                                        </svg>
                                                                        <div class="flex flex-col">
                                                                                <span class="text-sm">Accounts</span>
                                                                        </div>
                                                                </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                        href="/app/forex"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="m6 16.5l-3 2.94V11h3m5 3.66l-1.57-1.34L8 14.64V7h3m5 6l-3 3V3h3m2.81 9.81L17 11h5v5l-1.79-1.79L13 21.36l-3.47-3.02L5.75 22H3l6.47-6.34L13 18.64">
                                                                                </path>
                                                                        </svg>
                                                                        <div class="flex flex-col">
                                                                                <span class="text-sm">Investment
                                                                                        Plans</span>
                                                                        </div>
                                                                </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                        href="/app/forex"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="M7 15h2c0 1.08 1.37 2 3 2s3-.92 3-2c0-1.1-1.04-1.5-3.24-2.03C9.64 12.44 7 11.78 7 9c0-1.79 1.47-3.31 3.5-3.82V3h3v2.18C15.53 5.69 17 7.21 17 9h-2c0-1.08-1.37-2-3-2s-3 .92-3 2c0 1.1 1.04 1.5 3.24 2.03C14.36 11.56 17 12.22 17 15c0 1.79-1.47 3.31-3.5 3.82V21h-3v-2.18C8.47 18.31 7 16.79 7 15">
                                                                                </path>
                                                                        </svg>
                                                                        <div class="flex flex-col">
                                                                                <span class="text-sm">Investments</span>
                                                                        </div>
                                                                </a>
                                                        </div>
                                                </div>
                                                <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                        href="app/binary/trade/contracts"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true" role="img"
                                                                class="h-5 w-5 iconify iconify--mdi" width="1em"
                                                                height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                        d="m16 11.78l4.24-7.33l1.73 1l-5.23 9.05l-6.51-3.75L5.46 19H22v2H2V3h2v14.54L9.5 8z">
                                                                </path>
                                                        </svg>
                                                        <div class="flex flex-col"><span class="text-sm">Binary
                                                                        Trading</span><span
                                                                        class="text-xs text-muted-400 dark:text-muted-500 leading-none">Trade
                                                                        binary options with
                                                                        advanced tools.</span>
                                                        </div>
                                                </a>
                                                <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                        href="/app/bot"><svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true" role="img"
                                                                class="h-5 w-5 iconify iconify--mdi" width="1em"
                                                                height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                        d="m16 11.78l4.24-7.33l1.73 1l-5.23 9.05l-6.51-3.75L5.46 19H22v2H2V3h2v14.54L9.5 8z">
                                                                </path>
                                                        </svg>
                                                        <div class="flex flex-col"><span class="text-sm">AI
                                                                        Trading</span><span
                                                                        class="text-xs text-muted-400 dark:text-muted-500 leading-none">Trade
                                                                        AI options with
                                                                        advanced tools.</span>
                                                        </div>
                                                </a>
                                                <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                        href="app/staking"><svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true" role="img"
                                                                class="h-5 w-5 iconify iconify--mdi" width="1em"
                                                                height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                        d="m16 11.78l4.24-7.33l1.73 1l-5.23 9.05l-6.51-3.75L5.46 19H22v2H2V3h2v14.54L9.5 8z">
                                                                </path>
                                                        </svg>
                                                        <div class="flex flex-col"><span
                                                                        class="text-sm">Staking</span><span
                                                                        class="text-xs text-muted-400 dark:text-muted-500 leading-none">Explore
                                                                        stacking.</span>
                                                        </div>
                                                </a>
                                        </div>

                                        <div
                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                <!-- <a
                                                                        class="dropdown-menu hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                        <div class="flex items-center"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <g fill="none"
                                                                                                stroke="currentColor"
                                                                                                stroke-width="1.5">
                                                                                                <circle cx="9" cy="9"
                                                                                                        r="2"></circle>
                                                                                                <path
                                                                                                        d="M13 15c0 1.105 0 2-4 2s-4-.895-4-2s1.79-2 4-2s4 .895 4 2Z">
                                                                                                </path>
                                                                                                <path d="M2 12c0-3.771 0-5.657 1.172-6.828S6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172S22 8.229 22 12s0 5.657-1.172 6.828S17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172S2 15.771 2 12Z"
                                                                                                        opacity=".5">
                                                                                                </path>
                                                                                                <path stroke-linecap="round"
                                                                                                        d="M19 12h-4m4-3h-5">
                                                                                                </path>
                                                                                                <path stroke-linecap="round"
                                                                                                        d="M19 15h-3"
                                                                                                        opacity=".9">
                                                                                                </path>
                                                                                        </g>
                                                                                </svg>
                                                                                <div class="ml-3 flex flex-col"><span
                                                                                                class="text-sm">Account</span>
                                                                                </div>
                                                                        </div><svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 transition-transform rotate-0 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                </path>
                                                                        </svg>
                                                                </a> -->
                                                <div
                                                        class="dropdown-sub-menu z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-0 lg:top-full lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                href="/user/wallet"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img"
                                                                        class="h-5 w-5 iconify iconify--mdi" width="1em"
                                                                        height="1em" viewBox="0 0 24 24">
                                                                        <path fill="currentColor"
                                                                                d="M21 18v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1h-9a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2m0-2h10V8H12m4 5.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5">
                                                                        </path>
                                                                </svg>
                                                                <div class="flex flex-col"><span
                                                                                class="text-sm">Wallet</span><span
                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Manage
                                                                                your wallet.</span>
                                                                </div>
                                                        </a>
                                                        <div
                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                <a
                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                        <div class="flex items-center">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M21.71 8.71c1.25-1.25.68-2.71 0-3.42l-3-3c-1.26-1.25-2.71-.68-3.42 0L13.59 4H11C9.1 4 8 5 7.44 6.15L3 10.59v4l-.71.7c-1.25 1.26-.68 2.71 0 3.42l3 3c.54.54 1.12.74 1.67.74c.71 0 1.36-.35 1.75-.74l2.7-2.71H15c1.7 0 2.56-1.06 2.87-2.1c1.13-.3 1.75-1.16 2-2C21.42 14.5 22 13.03 22 12V9h-.59zM20 12c0 .45-.19 1-1 1h-1v1c0 .45-.19 1-1 1h-1v1c0 .45-.19 1-1 1h-4.41l-3.28 3.28c-.31.29-.49.12-.6.01l-2.99-2.98c-.29-.31-.12-.49-.01-.6L5 15.41v-4l2-2V11c0 1.21.8 3 3 3s3-1.79 3-3h7zm.29-4.71L18.59 9H11v2c0 .45-.19 1-1 1s-1-.55-1-1V8c0-.46.17-2 2-2h3.41l2.28-2.28c.31-.29.49-.12.6-.01l2.99 2.98c.29.31.12.49.01.6">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="ml-3 flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Affiliate</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Earn
                                                                                                money by
                                                                                                referring
                                                                                                friends.</span>
                                                                                </div>
                                                                        </div><svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                </path>
                                                                        </svg>
                                                                </a>
                                                                <div
                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/affiliate"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M17 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-4v2h1a1 1 0 0 1 1 1h7v2h-7a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1H2v-2h7a1 1 0 0 1 1-1h1v-2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Network</span>
                                                                                </div>
                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/affiliate/referral"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M12 5a3.5 3.5 0 0 0-3.5 3.5A3.5 3.5 0 0 0 12 12a3.5 3.5 0 0 0 3.5-3.5A3.5 3.5 0 0 0 12 5m0 2a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 12 10a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 12 7M5.5 8A2.5 2.5 0 0 0 3 10.5c0 .94.53 1.75 1.29 2.18c.36.2.77.32 1.21.32s.85-.12 1.21-.32c.37-.21.68-.51.91-.87A5.42 5.42 0 0 1 6.5 8.5v-.28c-.3-.14-.64-.22-1-.22m13 0c-.36 0-.7.08-1 .22v.28c0 1.2-.39 2.36-1.12 3.31c.12.19.25.34.4.49a2.48 2.48 0 0 0 1.72.7c.44 0 .85-.12 1.21-.32c.76-.43 1.29-1.24 1.29-2.18A2.5 2.5 0 0 0 18.5 8M12 14c-2.34 0-7 1.17-7 3.5V19h14v-1.5c0-2.33-4.66-3.5-7-3.5m-7.29.55C2.78 14.78 0 15.76 0 17.5V19h3v-1.93c0-1.01.69-1.85 1.71-2.52m14.58 0c1.02.67 1.71 1.51 1.71 2.52V19h3v-1.5c0-1.74-2.78-2.72-4.71-2.95M12 16c1.53 0 3.24.5 4.23 1H7.77c.99-.5 2.7-1 4.23-1">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Referrals</span>
                                                                                </div>
                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/affiliate/reward"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M22 12v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8a1 1 0 0 1-1-1V8a2 2 0 0 1 2-2h3.17A3 3 0 0 1 6 5a3 3 0 0 1 3-3c1 0 1.88.5 2.43 1.24v-.01L12 4l.57-.77v.01C13.12 2.5 14 2 15 2a3 3 0 0 1 3 3a3 3 0 0 1-.17 1H21a2 2 0 0 1 2 2v3a1 1 0 0 1-1 1M4 20h7v-8H4zm16 0v-8h-7v8zM9 4a1 1 0 0 0-1 1a1 1 0 0 0 1 1a1 1 0 0 0 1-1a1 1 0 0 0-1-1m6 0a1 1 0 0 0-1 1a1 1 0 0 0 1 1a1 1 0 0 0 1-1a1 1 0 0 0-1-1M3 8v2h8V8zm10 0v2h8V8z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Rewards</span>
                                                                                </div>
                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/affiliate/program"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M17 3h-3v2h3v16H7V5h3V3H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m-5 4a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2m4 8H8v-1c0-1.33 2.67-2 4-2s4 .67 4 2zm0 3H8v-1h8zm-4 2H8v-1h4zm1-15h-2V1h2z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span class="text-sm">Affiliate
                                                                                                Program</span>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                href="/user/ico"><svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img"
                                                                        class="h-5 w-5 iconify iconify--mdi" width="1em"
                                                                        height="1em" viewBox="0 0 24 24">
                                                                        <path d="M12 2a10 10 0 0 1 10 10a10 10 0 0 1-10 10A10 10 0 0 1 2 12A10 10 0 0 1 12 2m0 2a8 8 0 0 0-8 8a8 8 0 0 0 8 8a8 8 0 0 0 8-8a8 8 0 0 0-8-8m-1 13v-1H9v-2h4v-1h-3a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h1V7h2v1h2v2h-4v1h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v1h-2z"
                                                                                fill="currentColor">
                                                                        </path>
                                                                </svg>
                                                                <div class="flex flex-col"><span class="text-sm">Initial
                                                                                Coin
                                                                                Offering</span><span
                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Invest
                                                                                in ICO projects.</span>
                                                                </div>
                                                        </a>
                                                        <div
                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                <a
                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                        <div class="flex items-center">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="m6 16.5l-3 2.94V11h3m5 3.66l-1.57-1.34L8 14.64V7h3m5 6l-3 3V3h3m2.81 9.81L17 11h5v5l-1.79-1.79L13 21.36l-3.47-3.02L5.75 22H3l6.47-6.34L13 18.64">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="ml-3 flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Invest</span>
                                                                                </div>
                                                                        </div><svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                </path>
                                                                        </svg>
                                                                </a>
                                                                <div
                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/invest/general/plan"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="m6 16.5l-3 2.94V11h3m5 3.66l-1.57-1.34L8 14.64V7h3m5 6l-3 3V3h3m2.81 9.81L17 11h5v5l-1.79-1.79L13 21.36l-3.47-3.02L5.75 22H3l6.47-6.34L13 18.64">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span class="text-sm">Investment
                                                                                                Plans</span>
                                                                                </div>
                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/invest/general"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.28A2 2 0 0 0 22 15V9a2 2 0 0 0-1-1.72V5a2 2 0 0 0-2-2zm0 2h14v2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6v2H5zm8 4h7v6h-7zm3 1.5a1.5 1.5 0 0 0-1.5 1.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 0 1.5-1.5a1.5 1.5 0 0 0-1.5-1.5">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Investments</span>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <div
                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                <a
                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                        <div class="flex items-center">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--material-symbols-light"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M4.616 19q-.667 0-1.141-.475T3 17.386V4.615q0-.666.475-1.14T4.615 3h4.577q.667 0 1.141.475t.475 1.14v4.231h-1V6.827H4v8.346h6.808v2.212q0 .666-.475 1.14T9.193 19zm10.019 2q-.595 0-1.019-.424q-.424-.423-.424-1.018v-4.385h1v2H20V8.846h-6.808v-2.23q0-.667.475-1.141T14.807 5h4.577q.667 0 1.141.475T21 6.615v12.77q0 .666-.475 1.14t-1.14.475zM4 16.173v1.212q0 .269.173.442t.443.173h4.576q.27 0 .442-.173q.174-.173.174-.443v-1.211zm10.192 2v1.212q0 .269.174.442q.173.173.442.173h4.577q.269 0 .442-.173t.173-.443v-1.211zM4 5.827h5.808V4.616q0-.27-.173-.443T9.192 4H4.616q-.27 0-.443.173T4 4.616zm10.192 2.02H20V6.615q0-.27-.173-.443T19.385 6h-4.577q-.27 0-.443.173t-.173.443zM8.155 12.73q-.31 0-.521-.21T7.423 12t.21-.521q.21-.21.52-.21t.521.21q.21.209.21.52t-.21.52t-.52.21m3.847 0q-.31 0-.521-.21q-.21-.209-.21-.52t.21-.52q.209-.21.52-.21t.52.21q.21.209.21.52t-.21.52q-.209.21-.52.21m3.828 0q-.31 0-.521-.21q-.21-.209-.21-.52t.209-.52t.52-.21t.521.21q.21.209.21.52t-.21.52q-.209.21-.52.21M4 16.174V18zm10.192 2V20zM4 5.827V4zm10.192 2.02V6z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="ml-3 flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">P2P</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Trade
                                                                                                cryptocurrency
                                                                                                with
                                                                                                other
                                                                                                users.</span>
                                                                                </div>
                                                                        </div><svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                </path>
                                                                        </svg>
                                                                </a>
                                                                <div
                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/p2p/paymentMethod"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M20 8H4V6h16m0 12H4v-6h16m0-8H4c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span class="text-sm">Payment
                                                                                                Methods</span>
                                                                                </div>
                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/p2p"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="m21.41 11.58l-9-9A2 2 0 0 0 11 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 .59 1.42l9 9A2 2 0 0 0 13 22a2 2 0 0 0 1.41-.59l7-7A2 2 0 0 0 22 13a2 2 0 0 0-.59-1.42M13 20l-9-9V4h7l9 9M6.5 5A1.5 1.5 0 1 1 5 6.5A1.5 1.5 0 0 1 6.5 5">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Offers</span>
                                                                                </div>
                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/p2p/trade"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--material-symbols-light"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M4.616 19q-.667 0-1.141-.475T3 17.386V4.615q0-.666.475-1.14T4.615 3h4.577q.667 0 1.141.475t.475 1.14v4.231h-1V6.827H4v8.346h6.808v2.212q0 .666-.475 1.14T9.193 19zm10.019 2q-.595 0-1.019-.424q-.424-.423-.424-1.018v-4.385h1v2H20V8.846h-6.808v-2.23q0-.667.475-1.141T14.807 5h4.577q.667 0 1.141.475T21 6.615v12.77q0 .666-.475 1.14t-1.14.475zM4 16.173v1.212q0 .269.173.442t.443.173h4.576q.27 0 .442-.173q.174-.173.174-.443v-1.211zm10.192 2v1.212q0 .269.174.442q.173.173.442.173h4.577q.269 0 .442-.173t.173-.443v-1.211zM4 5.827h5.808V4.616q0-.27-.173-.443T9.192 4H4.616q-.27 0-.443.173T4 4.616zm10.192 2.02H20V6.615q0-.27-.173-.443T19.385 6h-4.577q-.27 0-.443.173t-.173.443zM8.155 12.73q-.31 0-.521-.21T7.423 12t.21-.521q.21-.21.52-.21t.521.21q.21.209.21.52t-.21.52t-.52.21m3.847 0q-.31 0-.521-.21q-.21-.209-.21-.52t.21-.52q.209-.21.52-.21t.52.21q.21.209.21.52t-.21.52q-.209.21-.52.21m3.828 0q-.31 0-.521-.21q-.21-.209-.21-.52t.209-.52t.52-.21t.521.21q.21.209.21.52t-.21.52q-.209.21-.52.21M4 16.174V18zm10.192 2V20zM4 5.827V4zm10.192 2.02V6z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Trades</span>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <div
                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                <a
                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                        <div class="flex items-center">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M6.5 10h-2v7h2zm6 0h-2v7h2zm8.5 9H2v2h19zm-2.5-9h-2v7h2zm-7-6.74L16.71 6H6.29zm0-2.26L2 6v2h19V6z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="ml-3 flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Staking</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Stake
                                                                                                your
                                                                                                coins
                                                                                                and earn
                                                                                                rewards.</span>
                                                                                </div>
                                                                        </div><svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                </path>
                                                                        </svg>
                                                                </a>
                                                                <div
                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/staking"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M2 15c1.67-.75 3.33-1.5 5-1.83V5a3 3 0 0 1 3-3c1.31 0 2.42.83 2.83 2H10a1 1 0 0 0-1 1v1h5V5a3 3 0 0 1 3-3c1.31 0 2.42.83 2.83 2H17a1 1 0 0 0-1 1v9.94c2-.32 4-1.94 6-1.94v2c-2.22 0-4.44 2-6.67 2c-2.22 0-4.44-2-6.66-2c-2.23 0-4.45 1-6.67 2zm12-7H9v2h5zm0 4H9v1c1.67.16 3.33 1.31 5 1.79zM2 19c2.22-1 4.44-2 6.67-2c2.22 0 4.44 2 6.66 2c2.23 0 4.45-2 6.67-2v2c-2.22 0-4.44 2-6.67 2c-2.22 0-4.44-2-6.66-2c-2.23 0-4.45 1-6.67 2z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Pools</span>
                                                                                </div>
                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/staking/history"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M13.5 8H12v5l4.28 2.54l.72-1.21l-3.5-2.08zM13 3a9 9 0 0 0-9 9H1l3.96 4.03L9 12H6a7 7 0 0 1 7-7a7 7 0 0 1 7 7a7 7 0 0 1-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.9 8.9 0 0 0 13 21a9 9 0 0 0 9-9a9 9 0 0 0-9-9">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Stakes</span>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <div
                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                <a
                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                        <div class="flex items-center">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M4.083 11.894c.439-2.34.658-3.511 1.491-4.203C6.408 7 7.598 7 9.98 7h4.04c2.383 0 3.573 0 4.407.691c.833.692 1.052 1.862 1.491 4.203l.75 4c.617 3.292.926 4.938.026 6.022S18.12 23 14.771 23H9.23c-3.349 0-5.024 0-5.923-1.084c-.9-1.084-.591-2.73.026-6.022z"
                                                                                                opacity=".5">
                                                                                        </path>
                                                                                        <path fill="currentColor"
                                                                                                d="M9.75 5.985a2.25 2.25 0 0 1 4.5 0v1c.566 0 1.062.002 1.5.015V5.985a3.75 3.75 0 1 0-7.5 0V7c.438-.013.934-.015 1.5-.015zm.128 9.765a2.251 2.251 0 0 0 4.245 0a.75.75 0 1 1 1.414.5a3.751 3.751 0 0 1-7.073 0a.75.75 0 0 1 1.414-.5">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="ml-3 flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Store</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Buy
                                                                                                products
                                                                                                from our
                                                                                                store.</span>
                                                                                </div>
                                                                        </div><svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                </path>
                                                                        </svg>
                                                                </a>
                                                                <div
                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/store"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M4.083 10.894c.439-2.34.658-3.511 1.491-4.203C6.408 6 7.598 6 9.98 6h4.04c2.383 0 3.573 0 4.407.691c.833.692 1.052 1.862 1.491 4.203l.75 4c.617 3.292.926 4.938.026 6.022S18.12 22 14.771 22H9.23c-3.349 0-5.024 0-5.923-1.084c-.9-1.084-.591-2.73.026-6.022z"
                                                                                                opacity=".5">
                                                                                        </path>
                                                                                        <path fill="currentColor"
                                                                                                d="M9.75 5a2.25 2.25 0 0 1 4.5 0v1c.566 0 1.062.002 1.5.015V5a3.75 3.75 0 1 0-7.5 0v1.015C8.688 6.002 9.184 6 9.75 6zm-1.49 5.877a.75.75 0 1 1 1.48.246l-1 6a.75.75 0 1 1-1.48-.246zm6.617-.617a.75.75 0 0 1 .863.617l1 6a.75.75 0 1 1-1.48.246l-1-6a.75.75 0 0 1 .617-.863">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Orders</span>
                                                                                </div>
                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/store/wishlist"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M4.083 10.894c.439-2.34.658-3.511 1.491-4.203C6.408 6 7.598 6 9.98 6h4.04c2.383 0 3.573 0 4.407.691c.833.692 1.052 1.862 1.491 4.203l.75 4c.617 3.292.926 4.938.026 6.022S18.12 22 14.771 22H9.23c-3.349 0-5.024 0-5.923-1.084c-.9-1.084-.591-2.73.026-6.022z"
                                                                                                opacity=".5">
                                                                                        </path>
                                                                                        <path fill="currentColor"
                                                                                                d="M9.75 5a2.25 2.25 0 0 1 4.5 0v1c.566 0 1.062.002 1.5.015V5a3.75 3.75 0 1 0-7.5 0v1.015C8.688 6.002 9.184 6 9.75 6zm1.293 10.866C10.165 15.22 9 14.18 9 13.196c0-1.672 1.65-2.297 3-1.005c1.35-1.292 3-.668 3 1.006c0 .984-1.165 2.024-2.043 2.669c-.42.308-.63.462-.957.462c-.328 0-.537-.154-.957-.462">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Wishlist</span>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <div
                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                <a href="/app/dashboard"
                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                        <div class="flex items-center">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--fluent"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 28 28">
                                                                                        <path fill="currentColor"
                                                                                                d="M6.75 3A3.75 3.75 0 0 0 3 6.75v14.5A3.75 3.75 0 0 0 6.75 25h14.5A3.75 3.75 0 0 0 25 21.25V6.75A3.75 3.75 0 0 0 21.25 3zM4.5 6.75A2.25 2.25 0 0 1 6.75 4.5h14.5a2.25 2.25 0 0 1 2.25 2.25v14.5a2.25 2.25 0 0 1-2.25 2.25H6.75a2.25 2.25 0 0 1-2.25-2.25zM6 9a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2zm2-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5V9a.5.5 0 0 0-.5-.5zm-2 7.25a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75m.75 3a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5zm8.75-2.5c0-.966.784-1.75 1.75-1.75h3c.966 0 1.75.784 1.75 1.75v3A1.75 1.75 0 0 1 20.25 21h-3a1.75 1.75 0 0 1-1.75-1.75zm1.75-.25a.25.25 0 0 0-.25.25v3c0 .138.112.25.25.25h3a.25.25 0 0 0 .25-.25v-3a.25.25 0 0 0-.25-.25z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="ml-3 flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Blog</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Read
                                                                                                and
                                                                                                write
                                                                                                articles.</span>
                                                                                </div>
                                                                        </div><svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                </path>
                                                                        </svg>
                                                                </a>
                                                                <div
                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/blog/author"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2M7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.5.88 4.93 1.78A7.9 7.9 0 0 1 12 20c-1.86 0-3.57-.64-4.93-1.72m11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33A7.93 7.93 0 0 1 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.5-1.64 4.83M12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6m0 5a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 12 8a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 12 11">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Author</span>
                                                                                </div>
                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/blog/post"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M19 5v14H5V5zm2-2H3v18h18zm-4 14H7v-1h10zm0-2H7v-1h10zm0-3H7V7h10z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col">
                                                                                        <span class="text-sm">New
                                                                                                Post</span>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                href="/user/support/ticket"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img"
                                                                        class="h-5 w-5 iconify iconify--mdi" width="1em"
                                                                        height="1em" viewBox="0 0 24 24">
                                                                        <path fill="currentColor"
                                                                                d="M13 3C9.23 3 6.19 5.95 6 9.66l-1.92 2.53c-.24.31 0 .81.42.81H6v3c0 1.11.89 2 2 2h1v3h7v-4.69c2.37-1.12 4-3.51 4-6.31c0-3.86-3.12-7-7-7m1 11h-2v-2h2zm1.75-5.19c-.29.4-.66.69-1.11.93c-.25.16-.42.33-.51.52c-.09.18-.13.43-.13.74h-2c0-.5.11-.92.31-1.18c.19-.27.54-.57 1.05-.91c.26-.16.47-.36.61-.59c.16-.23.23-.5.23-.82c0-.3-.08-.56-.26-.75c-.18-.18-.44-.28-.75-.28a1 1 0 0 0-.66.23c-.18.16-.27.39-.28.69h-1.93l-.01-.03c-.01-.79.25-1.36.77-1.77c.54-.39 1.24-.59 2.11-.59c.93 0 1.66.23 2.19.68c.54.45.81 1.06.81 1.82c0 .5-.15.91-.44 1.31">
                                                                        </path>
                                                                </svg>
                                                                <div class="flex flex-col"><span
                                                                                class="text-sm">Support</span><span
                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Get
                                                                                help
                                                                                from our support
                                                                                team.</span></div>
                                                        </a>
                                                </div>
                                        </div>
                                </div>


                                <div id="menu-2" class="menu" style="display: none;">
                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                href="app/p2p"><svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                        role="img"
                                                        class="h-5 w-5 iconify iconify--material-symbols-light"
                                                        width="1em" height="1em" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                                d="M4.616 19q-.667 0-1.141-.475T3 17.386V4.615q0-.666.475-1.14T4.615 3h4.577q.667 0 1.141.475t.475 1.14v4.231h-1V6.827H4v8.346h6.808v2.212q0 .666-.475 1.14T9.193 19zm10.019 2q-.595 0-1.019-.424q-.424-.423-.424-1.018v-4.385h1v2H20V8.846h-6.808v-2.23q0-.667.475-1.141T14.807 5h4.577q.667 0 1.141.475T21 6.615v12.77q0 .666-.475 1.14t-1.14.475zM4 16.173v1.212q0 .269.173.442t.443.173h4.576q.27 0 .442-.173q.174-.173.174-.443v-1.211zm10.192 2v1.212q0 .269.174.442q.173.173.442.173h4.577q.269 0 .442-.173t.173-.443v-1.211zM4 5.827h5.808V4.616q0-.27-.173-.443T9.192 4H4.616q-.27 0-.443.173T4 4.616zm10.192 2.02H20V6.615q0-.27-.173-.443T19.385 6h-4.577q-.27 0-.443.173t-.173.443zM8.155 12.73q-.31 0-.521-.21T7.423 12t.21-.521q.21-.21.52-.21t.521.21q.21.209.21.52t-.21.52t-.52.21m3.847 0q-.31 0-.521-.21q-.21-.209-.21-.52t.21-.52q.209-.21.52-.21t.52.21q.21.209.21.52t-.21.52q-.209.21-.52.21m3.828 0q-.31 0-.521-.21q-.21-.209-.21-.52t.209-.52t.52-.21t.521.21q.21.209.21.52t-.21.52q-.209.21-.52.21M4 16.174V18zm10.192 2V20zM4 5.827V4zm10.192 2.02V6z">
                                                        </path>
                                                </svg>
                                                <div class="flex flex-col"><span class="text-sm">P2P</span></div>
                                        </a>
                                </div>

                                <div id="menu-3" class="menu" style="display: none;">
                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                href="app/ico"><svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                        role="img" class="h-5 w-5 iconify iconify--solar" width="1em"
                                                        height="1em" viewBox="0 0 24 24">
                                                        <g fill="none" stroke="currentColor" stroke-width="1.5">
                                                                <circle cx="12" cy="12" r="10" opacity=".5"></circle>
                                                                <path stroke-linecap="round"
                                                                        d="M12 17v1m0-12v1m3 2.5C15 8.12 13.657 7 12 7S9 8.12 9 9.5s1.343 2.5 3 2.5s3 1.12 3 2.5s-1.343 2.5-3 2.5s-3-1.12-3-2.5">
                                                                </path>
                                                        </g>
                                                </svg>
                                                <div class="flex flex-col"><span class="text-sm">ICO</span></div>
                                        </a>

                                </div>

                                <div id="menu-4" class="menu" style="display: none;">
                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                href="app/marketplace/index"><svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                        role="img" class="h-5 w-5 iconify iconify--solar" width="1em"
                                                        height="1em" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                                d="M4.083 11.894c.439-2.34.658-3.511 1.491-4.203C6.408 7 7.598 7 9.98 7h4.04c2.383 0 3.573 0 4.407.691c.833.692 1.052 1.862 1.491 4.203l.75 4c.617 3.292.926 4.938.026 6.022S18.12 23 14.771 23H9.23c-3.349 0-5.024 0-5.923-1.084c-.9-1.084-.591-2.73.026-6.022z"
                                                                opacity=".5"></path>
                                                        <path fill="currentColor"
                                                                d="M9.75 5.985a2.25 2.25 0 0 1 4.5 0v1c.566 0 1.062.002 1.5.015V5.985a3.75 3.75 0 1 0-7.5 0V7c.438-.013.934-.015 1.5-.015zm.128 9.765a2.251 2.251 0 0 0 4.245 0a.75.75 0 1 1 1.414.5a3.751 3.751 0 0 1-7.073 0a.75.75 0 0 1 1.414-.5">
                                                        </path>
                                                </svg>
                                                <div class="flex flex-col"><span class="text-sm">Store</span></div>
                                        </a>
                                </div>

                                <div id="menu-5" class="menu" style="display: none;">
                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                href="app/knowledge"><svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                        role="img" class="h-5 w-5 iconify iconify--fluent" width="1em"
                                                        height="1em" viewBox="0 0 28 28">
                                                        <path fill="currentColor"
                                                                d="M6.75 3A3.75 3.75 0 0 0 3 6.75v14.5A3.75 3.75 0 0 0 6.75 25h14.5A3.75 3.75 0 0 0 25 21.25V6.75A3.75 3.75 0 0 0 21.25 3zM4.5 6.75A2.25 2.25 0 0 1 6.75 4.5h14.5a2.25 2.25 0 0 1 2.25 2.25v14.5a2.25 2.25 0 0 1-2.25 2.25H6.75a2.25 2.25 0 0 1-2.25-2.25zM6 9a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2zm2-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5V9a.5.5 0 0 0-.5-.5zm-2 7.25a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75m.75 3a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5zm8.75-2.5c0-.966.784-1.75 1.75-1.75h3c.966 0 1.75.784 1.75 1.75v3A1.75 1.75 0 0 1 20.25 21h-3a1.75 1.75 0 0 1-1.75-1.75zm1.75-.25a.25.25 0 0 0-.25.25v3c0 .138.112.25.25.25h3a.25.25 0 0 0 .25-.25v-3a.25.25 0 0 0-.25-.25z">
                                                        </path>
                                                </svg>
                                                <div class="flex flex-col"><span class="text-sm">Blog</span></div>
                                        </a>
                                </div>


                                        <!-- till -->
                                

                                <div class="w-full items-center justify-center flex">
                                        <div
                                                class="flex-grow flex-wrap items-stretch overflow-y-auto scrollbar-hidden dark:bg-muted-900 lg:flex lg:overflow-visible lg:bg-transparent dark:lg:bg-transparent hidden lg:block">
                                                <div
                                                        class="lg:!flex lg:flex-1 lg:basis-full lg:items-stretch lg:justify-center px-4 pb-2 lg:pb-0 lg:space-x-1  hidden">
                                                        <div
                                                                class=" relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">


                                                                <a class="dropdown-menu hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between"
                                                                        id="trade-menu">
                                                                        <div class="flex items-center">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M3.293 9.293C3 9.586 3 10.057 3 11v6c0 .943 0 1.414.293 1.707S4.057 19 5 19s1.414 0 1.707-.293S7 17.943 7 17v-6c0-.943 0-1.414-.293-1.707S5.943 9 5 9s-1.414 0-1.707.293">
                                                                                        </path>
                                                                                        <path fill="currentColor"
                                                                                                d="M17.293 2.293C17 2.586 17 3.057 17 4v13c0 .943 0 1.414.293 1.707S18.057 19 19 19s1.414 0 1.707-.293S21 17.943 21 17V4c0-.943 0-1.414-.293-1.707S19.943 2 19 2s-1.414 0-1.707.293"
                                                                                                opacity=".4">
                                                                                        </path>
                                                                                        <path fill="currentColor"
                                                                                                d="M10 7c0-.943 0-1.414.293-1.707S11.057 5 12 5s1.414 0 1.707.293S14 6.057 14 7v10c0 .943 0 1.414-.293 1.707S12.943 19 12 19s-1.414 0-1.707-.293S10 17.943 10 17z"
                                                                                                opacity=".7">
                                                                                        </path>
                                                                                        <path fill="currentColor"
                                                                                                d="M3 21.25a.75.75 0 0 0 0 1.5h18a.75.75 0 0 0 0-1.5z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="ml-3 flex flex-col">
                                                                                        <span
                                                                                                class="text-sm">Trade</span>
                                                                                </div>
                                                                        </div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                aria-hidden="true" role="img"
                                                                                class="h-5 w-5 transition-transform rotate-0 iconify iconify--mdi"
                                                                                width="1em" height="1em"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                </path>
                                                                        </svg>
                                                                </a>

                                                                <div
                                                                        class="dropdown-sub-menu z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-0 lg:top-full lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/app/dashboard"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M3.293 9.293C3 9.586 3 10.057 3 11v6c0 .943 0 1.414.293 1.707S4.057 19 5 19s1.414 0 1.707-.293S7 17.943 7 17v-6c0-.943 0-1.414-.293-1.707S5.943 9 5 9s-1.414 0-1.707.293">
                                                                                        </path>
                                                                                        <path fill="currentColor"
                                                                                                d="M17.293 2.293C17 2.586 17 3.057 17 4v13c0 .943 0 1.414.293 1.707S18.057 19 19 19s1.414 0 1.707-.293S21 17.943 21 17V4c0-.943 0-1.414-.293-1.707S19.943 2 19 2s-1.414 0-1.707.293"
                                                                                                opacity=".4"></path>
                                                                                        <path fill="currentColor"
                                                                                                d="M10 7c0-.943 0-1.414.293-1.707S11.057 5 12 5s1.414 0 1.707.293S14 6.057 14 7v10c0 .943 0 1.414-.293 1.707S12.943 19 12 19s-1.414 0-1.707-.293S10 17.943 10 17z"
                                                                                                opacity=".7"></path>
                                                                                        <path fill="currentColor"
                                                                                                d="M3 21.25a.75.75 0 0 0 0 1.5h18a.75.75 0 0 0 0-1.5z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col"><span
                                                                                                class="text-sm">Spot
                                                                                                Trading</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">View
                                                                                                the
                                                                                                latest market
                                                                                                data.</span></div>
                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/app/dashboard"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                fill-rule="evenodd"
                                                                                                d="M14 20.5V4.25c0-.728-.002-1.2-.048-1.546c-.044-.325-.115-.427-.172-.484s-.159-.128-.484-.172C12.949 2.002 12.478 2 11.75 2s-1.2.002-1.546.048c-.325.044-.427.115-.484.172s-.128.159-.172.484c-.046.347-.048.818-.048 1.546V20.5z"
                                                                                                clip-rule="evenodd">
                                                                                        </path>
                                                                                        <path fill="currentColor"
                                                                                                d="M8 8.75A.75.75 0 0 0 7.25 8h-3a.75.75 0 0 0-.75.75V20.5H8zm12 5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75v6.75H20z"
                                                                                                opacity=".7"></path>
                                                                                        <path fill="currentColor"
                                                                                                d="M1.75 20.5a.75.75 0 0 0 0 1.5h20a.75.75 0 0 0 0-1.5z"
                                                                                                opacity=".5">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col"><span
                                                                                                class="text-sm">Futures
                                                                                                Trading</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Trade
                                                                                                futures
                                                                                                contracts.</span></div>
                                                                        </a>
                                                                        <div
                                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                                <a href="/app/forex"
                                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                                        <div class="flex items-center">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="m3.5 18.5l6-6l4 4L22 6.92L20.59 5.5l-7.09 8l-4-4L2 17z">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="ml-3 flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Forex
                                                                                                                Trading</span><span
                                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Trade
                                                                                                                forex
                                                                                                                with
                                                                                                                meta
                                                                                                                trader 4
                                                                                                                and
                                                                                                                5.</span>
                                                                                                </div>
                                                                                        </div><svg
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                aria-hidden="true"
                                                                                                role="img"
                                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                                width="1em" height="1em"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path fill="currentColor"
                                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                                </path>
                                                                                        </svg>
                                                                                </a>
                                                                                <div
                                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/app/forex"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.28A2 2 0 0 0 22 15V9a2 2 0 0 0-1-1.72V5a2 2 0 0 0-2-2zm0 2h14v2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6v2H5zm8 4h7v6h-7zm3 1.5a1.5 1.5 0 0 0-1.5 1.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 0 1.5-1.5a1.5 1.5 0 0 0-1.5-1.5">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Accounts</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/app/forex"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="m6 16.5l-3 2.94V11h3m5 3.66l-1.57-1.34L8 14.64V7h3m5 6l-3 3V3h3m2.81 9.81L17 11h5v5l-1.79-1.79L13 21.36l-3.47-3.02L5.75 22H3l6.47-6.34L13 18.64">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Investment
                                                                                                                Plans</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/app/forex"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M7 15h2c0 1.08 1.37 2 3 2s3-.92 3-2c0-1.1-1.04-1.5-3.24-2.03C9.64 12.44 7 11.78 7 9c0-1.79 1.47-3.31 3.5-3.82V3h3v2.18C15.53 5.69 17 7.21 17 9h-2c0-1.08-1.37-2-3-2s-3 .92-3 2c0 1.1 1.04 1.5 3.24 2.03C14.36 11.56 17 12.22 17 15c0 1.79-1.47 3.31-3.5 3.82V21h-3v-2.18C8.47 18.31 7 16.79 7 15">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Investments</span>
                                                                                                </div>
                                                                                        </a>
                                                                                </div>
                                                                        </div>
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="app/binary/trade/contracts"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="m16 11.78l4.24-7.33l1.73 1l-5.23 9.05l-6.51-3.75L5.46 19H22v2H2V3h2v14.54L9.5 8z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col"><span
                                                                                                class="text-sm">Binary
                                                                                                Trading</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Trade
                                                                                                binary options with
                                                                                                advanced tools.</span>
                                                                                </div>
                                                                        </a>
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/app/bot"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="m16 11.78l4.24-7.33l1.73 1l-5.23 9.05l-6.51-3.75L5.46 19H22v2H2V3h2v14.54L9.5 8z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col"><span
                                                                                                class="text-sm">AI
                                                                                                Trading</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Trade
                                                                                                AI options with
                                                                                                advanced tools.</span>
                                                                                </div>
                                                                        </a>
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="app/staking"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="m16 11.78l4.24-7.33l1.73 1l-5.23 9.05l-6.51-3.75L5.46 19H22v2H2V3h2v14.54L9.5 8z">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col"><span
                                                                                                class="text-sm">Staking</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Explore
                                                                                                stacking.</span>
                                                                                </div>
                                                                        </a>
                                                                </div>

                                                        </div>
                                                        <div
                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                <div
                                                                        class="dropdown-sub-menu z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-0 lg:top-full lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/wallet"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M21 18v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1h-9a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2m0-2h10V8H12m4 5.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col"><span
                                                                                                class="text-sm">Wallet</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Manage
                                                                                                your wallet.</span>
                                                                                </div>
                                                                        </a>
                                                                        <div
                                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                                <a
                                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                                        <div class="flex items-center">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M21.71 8.71c1.25-1.25.68-2.71 0-3.42l-3-3c-1.26-1.25-2.71-.68-3.42 0L13.59 4H11C9.1 4 8 5 7.44 6.15L3 10.59v4l-.71.7c-1.25 1.26-.68 2.71 0 3.42l3 3c.54.54 1.12.74 1.67.74c.71 0 1.36-.35 1.75-.74l2.7-2.71H15c1.7 0 2.56-1.06 2.87-2.1c1.13-.3 1.75-1.16 2-2C21.42 14.5 22 13.03 22 12V9h-.59zM20 12c0 .45-.19 1-1 1h-1v1c0 .45-.19 1-1 1h-1v1c0 .45-.19 1-1 1h-4.41l-3.28 3.28c-.31.29-.49.12-.6.01l-2.99-2.98c-.29-.31-.12-.49-.01-.6L5 15.41v-4l2-2V11c0 1.21.8 3 3 3s3-1.79 3-3h7zm.29-4.71L18.59 9H11v2c0 .45-.19 1-1 1s-1-.55-1-1V8c0-.46.17-2 2-2h3.41l2.28-2.28c.31-.29.49-.12.6-.01l2.99 2.98c.29.31.12.49.01.6">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="ml-3 flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Affiliate</span><span
                                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Earn
                                                                                                                money by
                                                                                                                referring
                                                                                                                friends.</span>
                                                                                                </div>
                                                                                        </div><svg
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                aria-hidden="true"
                                                                                                role="img"
                                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                                width="1em" height="1em"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path fill="currentColor"
                                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                                </path>
                                                                                        </svg>
                                                                                </a>
                                                                                <div
                                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/affiliate"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M17 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-4v2h1a1 1 0 0 1 1 1h7v2h-7a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1H2v-2h7a1 1 0 0 1 1-1h1v-2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Network</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/affiliate/referral"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M12 5a3.5 3.5 0 0 0-3.5 3.5A3.5 3.5 0 0 0 12 12a3.5 3.5 0 0 0 3.5-3.5A3.5 3.5 0 0 0 12 5m0 2a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 12 10a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 12 7M5.5 8A2.5 2.5 0 0 0 3 10.5c0 .94.53 1.75 1.29 2.18c.36.2.77.32 1.21.32s.85-.12 1.21-.32c.37-.21.68-.51.91-.87A5.42 5.42 0 0 1 6.5 8.5v-.28c-.3-.14-.64-.22-1-.22m13 0c-.36 0-.7.08-1 .22v.28c0 1.2-.39 2.36-1.12 3.31c.12.19.25.34.4.49a2.48 2.48 0 0 0 1.72.7c.44 0 .85-.12 1.21-.32c.76-.43 1.29-1.24 1.29-2.18A2.5 2.5 0 0 0 18.5 8M12 14c-2.34 0-7 1.17-7 3.5V19h14v-1.5c0-2.33-4.66-3.5-7-3.5m-7.29.55C2.78 14.78 0 15.76 0 17.5V19h3v-1.93c0-1.01.69-1.85 1.71-2.52m14.58 0c1.02.67 1.71 1.51 1.71 2.52V19h3v-1.5c0-1.74-2.78-2.72-4.71-2.95M12 16c1.53 0 3.24.5 4.23 1H7.77c.99-.5 2.7-1 4.23-1">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Referrals</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/affiliate/reward"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M22 12v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8a1 1 0 0 1-1-1V8a2 2 0 0 1 2-2h3.17A3 3 0 0 1 6 5a3 3 0 0 1 3-3c1 0 1.88.5 2.43 1.24v-.01L12 4l.57-.77v.01C13.12 2.5 14 2 15 2a3 3 0 0 1 3 3a3 3 0 0 1-.17 1H21a2 2 0 0 1 2 2v3a1 1 0 0 1-1 1M4 20h7v-8H4zm16 0v-8h-7v8zM9 4a1 1 0 0 0-1 1a1 1 0 0 0 1 1a1 1 0 0 0 1-1a1 1 0 0 0-1-1m6 0a1 1 0 0 0-1 1a1 1 0 0 0 1 1a1 1 0 0 0 1-1a1 1 0 0 0-1-1M3 8v2h8V8zm10 0v2h8V8z">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Rewards</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/affiliate/program"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M17 3h-3v2h3v16H7V5h3V3H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m-5 4a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2m4 8H8v-1c0-1.33 2.67-2 4-2s4 .67 4 2zm0 3H8v-1h8zm-4 2H8v-1h4zm1-15h-2V1h2z">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Affiliate
                                                                                                                Program</span>
                                                                                                </div>
                                                                                        </a>
                                                                                </div>
                                                                        </div><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/ico"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path d="M12 2a10 10 0 0 1 10 10a10 10 0 0 1-10 10A10 10 0 0 1 2 12A10 10 0 0 1 12 2m0 2a8 8 0 0 0-8 8a8 8 0 0 0 8 8a8 8 0 0 0 8-8a8 8 0 0 0-8-8m-1 13v-1H9v-2h4v-1h-3a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h1V7h2v1h2v2h-4v1h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v1h-2z"
                                                                                                fill="currentColor">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col"><span
                                                                                                class="text-sm">Initial
                                                                                                Coin
                                                                                                Offering</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Invest
                                                                                                in ICO projects.</span>
                                                                                </div>
                                                                        </a>
                                                                        <div
                                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                                <a
                                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                                        <div class="flex items-center">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="m6 16.5l-3 2.94V11h3m5 3.66l-1.57-1.34L8 14.64V7h3m5 6l-3 3V3h3m2.81 9.81L17 11h5v5l-1.79-1.79L13 21.36l-3.47-3.02L5.75 22H3l6.47-6.34L13 18.64">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="ml-3 flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Invest</span>
                                                                                                </div>
                                                                                        </div><svg
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                aria-hidden="true"
                                                                                                role="img"
                                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                                width="1em" height="1em"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path fill="currentColor"
                                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                                </path>
                                                                                        </svg>
                                                                                </a>
                                                                                <div
                                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/invest/general/plan"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="m6 16.5l-3 2.94V11h3m5 3.66l-1.57-1.34L8 14.64V7h3m5 6l-3 3V3h3m2.81 9.81L17 11h5v5l-1.79-1.79L13 21.36l-3.47-3.02L5.75 22H3l6.47-6.34L13 18.64">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Investment
                                                                                                                Plans</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/invest/general"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.28A2 2 0 0 0 22 15V9a2 2 0 0 0-1-1.72V5a2 2 0 0 0-2-2zm0 2h14v2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6v2H5zm8 4h7v6h-7zm3 1.5a1.5 1.5 0 0 0-1.5 1.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 0 1.5-1.5a1.5 1.5 0 0 0-1.5-1.5">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Investments</span>
                                                                                                </div>
                                                                                        </a>
                                                                                </div>
                                                                        </div>
                                                                        <div
                                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                                <a
                                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                                        <div class="flex items-center">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--material-symbols-light"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M4.616 19q-.667 0-1.141-.475T3 17.386V4.615q0-.666.475-1.14T4.615 3h4.577q.667 0 1.141.475t.475 1.14v4.231h-1V6.827H4v8.346h6.808v2.212q0 .666-.475 1.14T9.193 19zm10.019 2q-.595 0-1.019-.424q-.424-.423-.424-1.018v-4.385h1v2H20V8.846h-6.808v-2.23q0-.667.475-1.141T14.807 5h4.577q.667 0 1.141.475T21 6.615v12.77q0 .666-.475 1.14t-1.14.475zM4 16.173v1.212q0 .269.173.442t.443.173h4.576q.27 0 .442-.173q.174-.173.174-.443v-1.211zm10.192 2v1.212q0 .269.174.442q.173.173.442.173h4.577q.269 0 .442-.173t.173-.443v-1.211zM4 5.827h5.808V4.616q0-.27-.173-.443T9.192 4H4.616q-.27 0-.443.173T4 4.616zm10.192 2.02H20V6.615q0-.27-.173-.443T19.385 6h-4.577q-.27 0-.443.173t-.173.443zM8.155 12.73q-.31 0-.521-.21T7.423 12t.21-.521q.21-.21.52-.21t.521.21q.21.209.21.52t-.21.52t-.52.21m3.847 0q-.31 0-.521-.21q-.21-.209-.21-.52t.21-.52q.209-.21.52-.21t.52.21q.21.209.21.52t-.21.52q-.209.21-.52.21m3.828 0q-.31 0-.521-.21q-.21-.209-.21-.52t.209-.52t.52-.21t.521.21q.21.209.21.52t-.21.52q-.209.21-.52.21M4 16.174V18zm10.192 2V20zM4 5.827V4zm10.192 2.02V6z">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="ml-3 flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">P2P</span><span
                                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Trade
                                                                                                                cryptocurrency
                                                                                                                with
                                                                                                                other
                                                                                                                users.</span>
                                                                                                </div>
                                                                                        </div><svg
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                aria-hidden="true"
                                                                                                role="img"
                                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                                width="1em" height="1em"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path fill="currentColor"
                                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                                </path>
                                                                                        </svg>
                                                                                </a>
                                                                                <div
                                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/p2p/paymentMethod"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M20 8H4V6h16m0 12H4v-6h16m0-8H4c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Payment
                                                                                                                Methods</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/p2p"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="m21.41 11.58l-9-9A2 2 0 0 0 11 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 .59 1.42l9 9A2 2 0 0 0 13 22a2 2 0 0 0 1.41-.59l7-7A2 2 0 0 0 22 13a2 2 0 0 0-.59-1.42M13 20l-9-9V4h7l9 9M6.5 5A1.5 1.5 0 1 1 5 6.5A1.5 1.5 0 0 1 6.5 5">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Offers</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/p2p/trade"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--material-symbols-light"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M4.616 19q-.667 0-1.141-.475T3 17.386V4.615q0-.666.475-1.14T4.615 3h4.577q.667 0 1.141.475t.475 1.14v4.231h-1V6.827H4v8.346h6.808v2.212q0 .666-.475 1.14T9.193 19zm10.019 2q-.595 0-1.019-.424q-.424-.423-.424-1.018v-4.385h1v2H20V8.846h-6.808v-2.23q0-.667.475-1.141T14.807 5h4.577q.667 0 1.141.475T21 6.615v12.77q0 .666-.475 1.14t-1.14.475zM4 16.173v1.212q0 .269.173.442t.443.173h4.576q.27 0 .442-.173q.174-.173.174-.443v-1.211zm10.192 2v1.212q0 .269.174.442q.173.173.442.173h4.577q.269 0 .442-.173t.173-.443v-1.211zM4 5.827h5.808V4.616q0-.27-.173-.443T9.192 4H4.616q-.27 0-.443.173T4 4.616zm10.192 2.02H20V6.615q0-.27-.173-.443T19.385 6h-4.577q-.27 0-.443.173t-.173.443zM8.155 12.73q-.31 0-.521-.21T7.423 12t.21-.521q.21-.21.52-.21t.521.21q.21.209.21.52t-.21.52t-.52.21m3.847 0q-.31 0-.521-.21q-.21-.209-.21-.52t.21-.52q.209-.21.52-.21t.52.21q.21.209.21.52t-.21.52q-.209.21-.52.21m3.828 0q-.31 0-.521-.21q-.21-.209-.21-.52t.209-.52t.52-.21t.521.21q.21.209.21.52t-.21.52q-.209.21-.52.21M4 16.174V18zm10.192 2V20zM4 5.827V4zm10.192 2.02V6z">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Trades</span>
                                                                                                </div>
                                                                                        </a>
                                                                                </div>
                                                                        </div>
                                                                        <div
                                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                                <a
                                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                                        <div class="flex items-center">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M6.5 10h-2v7h2zm6 0h-2v7h2zm8.5 9H2v2h19zm-2.5-9h-2v7h2zm-7-6.74L16.71 6H6.29zm0-2.26L2 6v2h19V6z">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="ml-3 flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Staking</span><span
                                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Stake
                                                                                                                your
                                                                                                                coins
                                                                                                                and earn
                                                                                                                rewards.</span>
                                                                                                </div>
                                                                                        </div><svg
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                aria-hidden="true"
                                                                                                role="img"
                                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                                width="1em" height="1em"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path fill="currentColor"
                                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                                </path>
                                                                                        </svg>
                                                                                </a>
                                                                                <div
                                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/staking"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M2 15c1.67-.75 3.33-1.5 5-1.83V5a3 3 0 0 1 3-3c1.31 0 2.42.83 2.83 2H10a1 1 0 0 0-1 1v1h5V5a3 3 0 0 1 3-3c1.31 0 2.42.83 2.83 2H17a1 1 0 0 0-1 1v9.94c2-.32 4-1.94 6-1.94v2c-2.22 0-4.44 2-6.67 2c-2.22 0-4.44-2-6.66-2c-2.23 0-4.45 1-6.67 2zm12-7H9v2h5zm0 4H9v1c1.67.16 3.33 1.31 5 1.79zM2 19c2.22-1 4.44-2 6.67-2c2.22 0 4.44 2 6.66 2c2.23 0 4.45-2 6.67-2v2c-2.22 0-4.44 2-6.67 2c-2.22 0-4.44-2-6.66-2c-2.23 0-4.45 1-6.67 2z">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Pools</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/staking/history"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M13.5 8H12v5l4.28 2.54l.72-1.21l-3.5-2.08zM13 3a9 9 0 0 0-9 9H1l3.96 4.03L9 12H6a7 7 0 0 1 7-7a7 7 0 0 1 7 7a7 7 0 0 1-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.9 8.9 0 0 0 13 21a9 9 0 0 0 9-9a9 9 0 0 0-9-9">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Stakes</span>
                                                                                                </div>
                                                                                        </a>
                                                                                </div>
                                                                        </div>
                                                                        <div
                                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                                <a
                                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                                        <div class="flex items-center">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M4.083 11.894c.439-2.34.658-3.511 1.491-4.203C6.408 7 7.598 7 9.98 7h4.04c2.383 0 3.573 0 4.407.691c.833.692 1.052 1.862 1.491 4.203l.75 4c.617 3.292.926 4.938.026 6.022S18.12 23 14.771 23H9.23c-3.349 0-5.024 0-5.923-1.084c-.9-1.084-.591-2.73.026-6.022z"
                                                                                                                opacity=".5">
                                                                                                        </path>
                                                                                                        <path fill="currentColor"
                                                                                                                d="M9.75 5.985a2.25 2.25 0 0 1 4.5 0v1c.566 0 1.062.002 1.5.015V5.985a3.75 3.75 0 1 0-7.5 0V7c.438-.013.934-.015 1.5-.015zm.128 9.765a2.251 2.251 0 0 0 4.245 0a.75.75 0 1 1 1.414.5a3.751 3.751 0 0 1-7.073 0a.75.75 0 0 1 1.414-.5">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="ml-3 flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Store</span><span
                                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Buy
                                                                                                                products
                                                                                                                from our
                                                                                                                store.</span>
                                                                                                </div>
                                                                                        </div><svg
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                aria-hidden="true"
                                                                                                role="img"
                                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                                width="1em" height="1em"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path fill="currentColor"
                                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                                </path>
                                                                                        </svg>
                                                                                </a>
                                                                                <div
                                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/store"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M4.083 10.894c.439-2.34.658-3.511 1.491-4.203C6.408 6 7.598 6 9.98 6h4.04c2.383 0 3.573 0 4.407.691c.833.692 1.052 1.862 1.491 4.203l.75 4c.617 3.292.926 4.938.026 6.022S18.12 22 14.771 22H9.23c-3.349 0-5.024 0-5.923-1.084c-.9-1.084-.591-2.73.026-6.022z"
                                                                                                                opacity=".5">
                                                                                                        </path>
                                                                                                        <path fill="currentColor"
                                                                                                                d="M9.75 5a2.25 2.25 0 0 1 4.5 0v1c.566 0 1.062.002 1.5.015V5a3.75 3.75 0 1 0-7.5 0v1.015C8.688 6.002 9.184 6 9.75 6zm-1.49 5.877a.75.75 0 1 1 1.48.246l-1 6a.75.75 0 1 1-1.48-.246zm6.617-.617a.75.75 0 0 1 .863.617l1 6a.75.75 0 1 1-1.48.246l-1-6a.75.75 0 0 1 .617-.863">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Orders</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/store/wishlist"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M4.083 10.894c.439-2.34.658-3.511 1.491-4.203C6.408 6 7.598 6 9.98 6h4.04c2.383 0 3.573 0 4.407.691c.833.692 1.052 1.862 1.491 4.203l.75 4c.617 3.292.926 4.938.026 6.022S18.12 22 14.771 22H9.23c-3.349 0-5.024 0-5.923-1.084c-.9-1.084-.591-2.73.026-6.022z"
                                                                                                                opacity=".5">
                                                                                                        </path>
                                                                                                        <path fill="currentColor"
                                                                                                                d="M9.75 5a2.25 2.25 0 0 1 4.5 0v1c.566 0 1.062.002 1.5.015V5a3.75 3.75 0 1 0-7.5 0v1.015C8.688 6.002 9.184 6 9.75 6zm1.293 10.866C10.165 15.22 9 14.18 9 13.196c0-1.672 1.65-2.297 3-1.005c1.35-1.292 3-.668 3 1.006c0 .984-1.165 2.024-2.043 2.669c-.42.308-.63.462-.957.462c-.328 0-.537-.154-.957-.462">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Wishlist</span>
                                                                                                </div>
                                                                                        </a>
                                                                                </div>
                                                                        </div>
                                                                        <div
                                                                                class="relative flex-shrink-0 flex-grow-0 items-stretch space-x-1 lg:flex ">
                                                                                <a href="/app/dashboard"
                                                                                        class="hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 relative flex w-full cursor-pointer items-center justify-between  ">
                                                                                        <div class="flex items-center">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--fluent"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 28 28">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M6.75 3A3.75 3.75 0 0 0 3 6.75v14.5A3.75 3.75 0 0 0 6.75 25h14.5A3.75 3.75 0 0 0 25 21.25V6.75A3.75 3.75 0 0 0 21.25 3zM4.5 6.75A2.25 2.25 0 0 1 6.75 4.5h14.5a2.25 2.25 0 0 1 2.25 2.25v14.5a2.25 2.25 0 0 1-2.25 2.25H6.75a2.25 2.25 0 0 1-2.25-2.25zM6 9a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2zm2-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5V9a.5.5 0 0 0-.5-.5zm-2 7.25a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75m.75 3a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5zm8.75-2.5c0-.966.784-1.75 1.75-1.75h3c.966 0 1.75.784 1.75 1.75v3A1.75 1.75 0 0 1 20.25 21h-3a1.75 1.75 0 0 1-1.75-1.75zm1.75-.25a.25.25 0 0 0-.25.25v3c0 .138.112.25.25.25h3a.25.25 0 0 0 .25-.25v-3a.25.25 0 0 0-.25-.25z">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="ml-3 flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Blog</span><span
                                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Read
                                                                                                                and
                                                                                                                write
                                                                                                                articles.</span>
                                                                                                </div>
                                                                                        </div><svg
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                aria-hidden="true"
                                                                                                role="img"
                                                                                                class="h-5 w-5 transition-transform lg:rotate-90 rotate-0 iconify iconify--mdi"
                                                                                                width="1em" height="1em"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path fill="currentColor"
                                                                                                        d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6z">
                                                                                                </path>
                                                                                        </svg>
                                                                                </a>
                                                                                <div
                                                                                        class="z-20 hidden min-w-[220px] rounded-md py-2 text-[.7rem] shadow-lg transition-[opacity,transform] duration-[86ms] lg:absolute lg:start-full lg:top-0 lg:border lg:border-muted-200 lg:bg-white lg:dark:border-muted-800 lg:dark:bg-muted-950 [&amp;>*]:mx-2.5 ">
                                                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/blog/author"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2M7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.5.88 4.93 1.78A7.9 7.9 0 0 1 12 20c-1.86 0-3.57-.64-4.93-1.72m11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33A7.93 7.93 0 0 1 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.5-1.64 4.83M12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6m0 5a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 12 8a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 12 11">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">Author</span>
                                                                                                </div>
                                                                                        </a><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                                href="/user/blog/post"><svg
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                        aria-hidden="true"
                                                                                                        role="img"
                                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                                        width="1em"
                                                                                                        height="1em"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path fill="currentColor"
                                                                                                                d="M19 5v14H5V5zm2-2H3v18h18zm-4 14H7v-1h10zm0-2H7v-1h10zm0-3H7V7h10z">
                                                                                                        </path>
                                                                                                </svg>
                                                                                                <div
                                                                                                        class="flex flex-col">
                                                                                                        <span
                                                                                                                class="text-sm">New
                                                                                                                Post</span>
                                                                                                </div>
                                                                                        </a>
                                                                                </div>
                                                                        </div><a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                                href="/user/support/ticket"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        aria-hidden="true" role="img"
                                                                                        class="h-5 w-5 iconify iconify--mdi"
                                                                                        width="1em" height="1em"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                                d="M13 3C9.23 3 6.19 5.95 6 9.66l-1.92 2.53c-.24.31 0 .81.42.81H6v3c0 1.11.89 2 2 2h1v3h7v-4.69c2.37-1.12 4-3.51 4-6.31c0-3.86-3.12-7-7-7m1 11h-2v-2h2zm1.75-5.19c-.29.4-.66.69-1.11.93c-.25.16-.42.33-.51.52c-.09.18-.13.43-.13.74h-2c0-.5.11-.92.31-1.18c.19-.27.54-.57 1.05-.91c.26-.16.47-.36.61-.59c.16-.23.23-.5.23-.82c0-.3-.08-.56-.26-.75c-.18-.18-.44-.28-.75-.28a1 1 0 0 0-.66.23c-.18.16-.27.39-.28.69h-1.93l-.01-.03c-.01-.79.25-1.36.77-1.77c.54-.39 1.24-.59 2.11-.59c.93 0 1.66.23 2.19.68c.54.45.81 1.06.81 1.82c0 .5-.15.91-.44 1.31">
                                                                                        </path>
                                                                                </svg>
                                                                                <div class="flex flex-col"><span
                                                                                                class="text-sm">Support</span><span
                                                                                                class="text-xs text-muted-400 dark:text-muted-500 leading-none">Get
                                                                                                help
                                                                                                from our support
                                                                                                team.</span></div>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                href="app/p2p"><svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img"
                                                                        class="h-5 w-5 iconify iconify--material-symbols-light"
                                                                        width="1em" height="1em" viewBox="0 0 24 24">
                                                                        <path fill="currentColor"
                                                                                d="M4.616 19q-.667 0-1.141-.475T3 17.386V4.615q0-.666.475-1.14T4.615 3h4.577q.667 0 1.141.475t.475 1.14v4.231h-1V6.827H4v8.346h6.808v2.212q0 .666-.475 1.14T9.193 19zm10.019 2q-.595 0-1.019-.424q-.424-.423-.424-1.018v-4.385h1v2H20V8.846h-6.808v-2.23q0-.667.475-1.141T14.807 5h4.577q.667 0 1.141.475T21 6.615v12.77q0 .666-.475 1.14t-1.14.475zM4 16.173v1.212q0 .269.173.442t.443.173h4.576q.27 0 .442-.173q.174-.173.174-.443v-1.211zm10.192 2v1.212q0 .269.174.442q.173.173.442.173h4.577q.269 0 .442-.173t.173-.443v-1.211zM4 5.827h5.808V4.616q0-.27-.173-.443T9.192 4H4.616q-.27 0-.443.173T4 4.616zm10.192 2.02H20V6.615q0-.27-.173-.443T19.385 6h-4.577q-.27 0-.443.173t-.173.443zM8.155 12.73q-.31 0-.521-.21T7.423 12t.21-.521q.21-.21.52-.21t.521.21q.21.209.21.52t-.21.52t-.52.21m3.847 0q-.31 0-.521-.21q-.21-.209-.21-.52t.21-.52q.209-.21.52-.21t.52.21q.21.209.21.52t-.21.52q-.209.21-.52.21m3.828 0q-.31 0-.521-.21q-.21-.209-.21-.52t.209-.52t.52-.21t.521.21q.21.209.21.52t-.21.52q-.209.21-.52.21M4 16.174V18zm10.192 2V20zM4 5.827V4zm10.192 2.02V6z">
                                                                        </path>
                                                                </svg>
                                                                <div class="flex flex-col"><span
                                                                                class="text-sm">P2P</span>
                                                                </div>
                                                        </a>
                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                href="app/ico"><svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img"
                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                        width="1em" height="1em" viewBox="0 0 24 24">
                                                                        <g fill="none" stroke="currentColor"
                                                                                stroke-width="1.5">
                                                                                <circle cx="12" cy="12" r="10"
                                                                                        opacity=".5">
                                                                                </circle>
                                                                                <path stroke-linecap="round"
                                                                                        d="M12 17v1m0-12v1m3 2.5C15 8.12 13.657 7 12 7S9 8.12 9 9.5s1.343 2.5 3 2.5s3 1.12 3 2.5s-1.343 2.5-3 2.5s-3-1.12-3-2.5">
                                                                                </path>
                                                                        </g>
                                                                </svg>
                                                                <div class="flex flex-col"><span
                                                                                class="text-sm">ICO</span>
                                                                </div>
                                                        </a>
                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                href="app/marketplace/index"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img"
                                                                        class="h-5 w-5 iconify iconify--solar"
                                                                        width="1em" height="1em" viewBox="0 0 24 24">
                                                                        <path fill="currentColor"
                                                                                d="M4.083 11.894c.439-2.34.658-3.511 1.491-4.203C6.408 7 7.598 7 9.98 7h4.04c2.383 0 3.573 0 4.407.691c.833.692 1.052 1.862 1.491 4.203l.75 4c.617 3.292.926 4.938.026 6.022S18.12 23 14.771 23H9.23c-3.349 0-5.024 0-5.923-1.084c-.9-1.084-.591-2.73.026-6.022z"
                                                                                opacity=".5"></path>
                                                                        <path fill="currentColor"
                                                                                d="M9.75 5.985a2.25 2.25 0 0 1 4.5 0v1c.566 0 1.062.002 1.5.015V5.985a3.75 3.75 0 1 0-7.5 0V7c.438-.013.934-.015 1.5-.015zm.128 9.765a2.251 2.251 0 0 0 4.245 0a.75.75 0 1 1 1.414.5a3.751 3.751 0 0 1-7.073 0a.75.75 0 0 1 1.414-.5">
                                                                        </path>
                                                                </svg>
                                                                <div class="flex flex-col"><span
                                                                                class="text-sm">Store</span>
                                                                </div>
                                                        </a>
                                                        <a class="flex items-center gap-3 transition-colors duration-300 hover:bg-muted-100 hover:text-primary-500 dark:hover:bg-muted-800 leading-6 text-muted-500 dark:text-muted-400 relative flex cursor-pointer items-center gap-1 rounded-lg py-2 px-3 "
                                                                href="app/knowledge"><svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img"
                                                                        class="h-5 w-5 iconify iconify--fluent"
                                                                        width="1em" height="1em" viewBox="0 0 28 28">
                                                                        <path fill="currentColor"
                                                                                d="M6.75 3A3.75 3.75 0 0 0 3 6.75v14.5A3.75 3.75 0 0 0 6.75 25h14.5A3.75 3.75 0 0 0 25 21.25V6.75A3.75 3.75 0 0 0 21.25 3zM4.5 6.75A2.25 2.25 0 0 1 6.75 4.5h14.5a2.25 2.25 0 0 1 2.25 2.25v14.5a2.25 2.25 0 0 1-2.25 2.25H6.75a2.25 2.25 0 0 1-2.25-2.25zM6 9a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2zm2-.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5V9a.5.5 0 0 0-.5-.5zm-2 7.25a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75m.75 3a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5zm8.75-2.5c0-.966.784-1.75 1.75-1.75h3c.966 0 1.75.784 1.75 1.75v3A1.75 1.75 0 0 1 20.25 21h-3a1.75 1.75 0 0 1-1.75-1.75zm1.75-.25a.25.25 0 0 0-.25.25v3c0 .138.112.25.25.25h3a.25.25 0 0 0 .25-.25v-3a.25.25 0 0 0-.25-.25z">
                                                                        </path>
                                                                </svg>
                                                                <div class="flex flex-col"><span
                                                                                class="text-sm">Blog</span>
                                                                </div>
                                                        </a>
                                                </div>
                                        </div>
                                </div>
                                <div class="items-center gap-2 ms-auto me-3 hidden lg:flex"><button
                                                class="relative flex h-10 w-10 cursor-pointer items-center justify-center rounded-full transition-all duration-300  md:hidden"><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                        role="img"
                                                        class="h-5 w-5 text-muted-400 transition-colors duration-300 iconify iconify--lucide"
                                                        width="1em" height="1em" viewBox="0 0 24 24">
                                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2">
                                                                <circle cx="11" cy="11" r="8"></circle>
                                                                <path d="m21 21l-4.3-4.3"></path>
                                                        </g>
                                                </svg></button>
                                        <label class="mask mask-blob relative block overflow-hidden "><input
                                                        type="checkbox" id="theme-toggle"
                                                        class="peer absolute start-0 top-0 z-[2] h-full w-full cursor-pointer opacity-0"
                                                        aria-label="Toggle theme"><span
                                                        class="relative block h-9 w-9 bg-white text-lg dark:bg-muted-800 peer-checked:[&amp;>.moon-icon]:opacity-100 peer-checked:[&amp;>.moon-icon]:[transform:translate(-45%,-50%)] peer-checked:[&amp;>.sun-icon]:opacity-0 peer-checked:[&amp;>.sun-icon]:[transform:translate(-45%,-150%)]"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true" role="img"
                                                                class="sun-icon pointer-events-none absolute start-1/2 top-1/2 block -translate-x-[48%] -translate-y-[50%] text-yellow-400 opacity-100 transition-all duration-300 [&amp;>*]:fill-yellow-400 iconify iconify--lucide"
                                                                width="1em" height="1em" viewBox="0 0 24 24">
                                                                <g fill="none" stroke="currentColor"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2">
                                                                        <circle cx="12" cy="12" r="4"></circle>
                                                                        <path
                                                                                d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41">
                                                                        </path>
                                                                </g>
                                                        </svg><svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true" role="img"
                                                                class="moon-icon pointer-events-none absolute start-1/2 top-1/2 block text-yellow opacity-0 transition-all duration-300 [&amp;>*]:fill-yellow-400 iconify iconify--material-symbols"
                                                                width="1em" height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                        d="M12 21q-3.75 0-6.375-2.625T3 12t2.625-6.375T12 3q.35 0 .688.025t.662.075q-1.025.725-1.638 1.888T11.1 7.5q0 2.25 1.575 3.825T16.5 12.9q1.375 0 2.525-.613T20.9 10.65q.05.325.075.662T21 12q0 3.75-2.625 6.375T12 21">
                                                                </path>
                                                        </svg></span></label><a href="/login">
                                                <div tabindex="0"
                                                        style="text-shadow: transparent 0px 0px 0px; transform: none;">
                                                        <button
                                                                class="cursor-pointer relative inline-flex items-center justify-center gap-1 disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-300 rounded-md h-10 px-4 py-2 [&amp;>span>.loader]:text-primary-500 border border-primary-500 text-primary-500 hover:bg-primary-500 active:enabled:bg-primary-400 hover:text-white inline-flex items-center gap-1 whitespace-nowrap text-center text-sm  undefined"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img"
                                                                        class="h-5 w-5 me-1 iconify iconify--material-symbols-light"
                                                                        width="1em" height="1em" viewBox="0 0 24 24">
                                                                        <path fill="currentColor"
                                                                                d="M11.98 20v-1h6.405q.23 0 .423-.192t.192-.424V5.616q0-.231-.192-.424T18.384 5h-6.403V4h6.404q.69 0 1.152.463T20 5.616v12.769q0 .69-.463 1.153T18.385 20zm-.71-4.461l-.703-.72l2.32-2.319H4v-1h8.887l-2.32-2.32l.702-.718L14.808 12z">
                                                                        </path>
                                                                </svg>Login</button>
                                                </div>
                                        </a><a href="/register">
                                                <div tabindex="0"
                                                        style="text-shadow: transparent 0px 0px 0px; transform: none;">
                                                        <button
                                                                class="cursor-pointer relative inline-flex items-center justify-center gap-1 disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-300 rounded-md h-10 px-4 py-2 [&amp;>span>.loader]:text-muted-500 dark:[&amp;>span>.loader]:text-muted-200 border border-muted-300 dark:border-muted-700 text-muted-500 hover:bg-white hover:enabled:bg-muted-100 dark:hover:enabled:bg-muted-800 active:enabled:bg-muted-50 dark:active:enabled:bg-muted-700 hover:enabled:text-muted-600 dark:hover:enabled:text-muted-100 inline-flex items-center gap-1 whitespace-nowrap text-center text-sm  undefined"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img"
                                                                        class="h-5 w-5 me-1 iconify iconify--bx"
                                                                        width="1em" height="1em" viewBox="0 0 24 24">
                                                                        <path d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5s-3.5 1.505-3.5 3.5zM19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2z"
                                                                                fill="currentColor"></path>
                                                                </svg>Register</button>
                                                </div>
                                        </a>
                                </div>
                        </div>
                </nav>
        </div>
        <script>
                const themeToggle = document.getElementById('theme-toggle');
                themeToggle.checked = document.body.classList.contains('dark');

                themeToggle.addEventListener('change', () => {
                        document.body.classList.toggle('dark', themeToggle.checked);
                });
        </script>
        <script>
                document.addEventListener("DOMContentLoaded", function () {
                        // Get all dropdown menu buttons
                        const dropdownMenus = document.querySelectorAll(".dropdown-menu");

                        dropdownMenus.forEach((menu) => {
                                menu.addEventListener("click", function (event) {
                                        // Prevent propagation to avoid closing immediately
                                        event.stopPropagation();

                                        // Close any other open submenus
                                        dropdownMenus.forEach((otherMenu) => {
                                                if (otherMenu !== menu) {
                                                        otherMenu.nextElementSibling.classList.add("hidden");
                                                }
                                        });

                                        // Toggle the current submenu
                                        const submenu = menu.nextElementSibling;
                                        submenu.classList.toggle("hidden");
                                });
                        });

                        // Close all submenus if clicked outside
                        document.addEventListener("click", function () {
                                dropdownMenus.forEach((menu) => {
                                        const submenu = menu.nextElementSibling;
                                        submenu.classList.add("hidden");
                                });
                        });
                });
        </script>

        @yield('content')

        <footer class="bg-white dark:bg-muted-900 mt-auto w-full py-10 px-4 sm:px-6 lg:px-8 mx-auto">
                <div class="max-w-7xl relative pt-6 lg:pt-0 px-4 sm:px-6 lg:px-8 mx-auto">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
                                <div class="lg:col-span-1"><a class="flex-none text-xl font-semibold dark:text-white"
                                                aria-label="Brand" href="/#">AltCryptoGems</a>
                                        <p class="mt-3 text-xs sm:text-sm text-gray-600 dark:text-neutral-400">Our
                                                exchange uses charting
                                                technology provided by AltCryptoGems, a global platform where you can
                                                watch cryptocurrency prices,
                                                analyze market movements, and prepare for trades with the latest news
                                                and insights from fellow
                                                traders. <a
                                                        class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium dark:text-blue-500"
                                                        href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/">watch
                                                        cryptocurrency
                                                        prices</a> analyze market movements, and prepare for trades with
                                                the latest news and insights
                                                from fellow traders.</p>
                                </div>
                                <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div>
                                                <h4
                                                        class="text-xs font-semibold text-gray-900 uppercase dark:text-neutral-100">
                                                        Company</h4>
                                                <div class="mt-3 grid space-y-3 text-sm">
                                                        <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200"
                                                                        href="/register">About us</a></p>
                                                        <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200"
                                                                        href="/register">Blog</a></p>
                                                </div>
                                        </div>
                                        <div>
                                                <h4
                                                        class="text-xs font-semibold text-gray-900 uppercase dark:text-neutral-100">
                                                        Developers</h4>
                                                <div class="mt-3 grid space-y-3 text-sm">
                                                        <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200"
                                                                        href="/register">Help &amp;
                                                                        Support</a></p>
                                                        <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200"
                                                                        href="/register">Api</a></p>
                                                </div>
                                        </div>
                                        <div>
                                                <h4
                                                        class="text-xs font-semibold text-gray-900 uppercase dark:text-neutral-100">
                                                        Legal</h4>
                                                <div class="mt-3 grid space-y-3 text-sm">
                                                        <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200"
                                                                        href="/register">Terms &amp;
                                                                        Conditions</a></p>
                                                        <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200"
                                                                        href="/register">Privacy Policy</a></p>
                                                        <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200"
                                                                        href="/register">Cookies Policy</a></p>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="pt-5 mt-5 border-t border-gray-200 dark:border-neutral-700">
                                <div class="sm:flex sm:justify-between sm:items-start">
                                        <p class="mt-1 text-xs sm:text-sm text-gray-600 dark:text-neutral-400">© 2024
                                        Altcryptogems. All rights
                                                reserved.</p>
                                        <div class="flex space-x-4 mt-4 sm:mt-0"></div>
                                        <div class="flex items-center justify-center space-x-3">
                                                <a href="https://www.facebook.com/" target="_blank" class="text-gray-500 hover:text-blue-700 dark:text-gray-400 dark:hover:text-blue-600" aria-label="Facebook">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#9ca3af" height="25" width="25" version="1.1" id="Capa_1" viewBox="0 0 48.605 48.605" xml:space="preserve">
                                                                <g>
                                                                        <path d="M34.094,8.688h4.756V0.005h-8.643c-0.721-0.03-9.51-0.198-11.788,8.489c-0.033,0.091-0.761,2.157-0.761,6.983l-7.903,0.024   v9.107l7.913-0.023v24.021h12.087v-24h8v-9.131h-8v-2.873C29.755,10.816,30.508,8.688,34.094,8.688z M35.755,17.474v5.131h-8v24   h-8.087V22.579l-7.913,0.023v-5.107l7.934-0.023l-0.021-1.017c-0.104-5.112,0.625-7.262,0.658-7.365   c1.966-7.482,9.473-7.106,9.795-7.086l6.729,0.002v4.683h-2.756c-4.673,0-6.338,3.054-6.338,5.912v4.873L35.755,17.474   L35.755,17.474z"/>
                                                                </g>
                                                        </svg>
                                                </a>
                                                <a href="https://x.com" target="_blank" class="text-gray-500 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-400" aria-label="X">
                                                        <svg fill="#9ca3af" width="25" height="25" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1668.56 1221.19" viewBox="0 0 1668.56 1221.19" id="twitter-x"><path d="M283.94,167.31l386.39,516.64L281.5,1104h87.51l340.42-367.76L984.48,1104h297.8L874.15,558.3l361.92-390.99
                                                        h-87.51l-313.51,338.7l-253.31-338.7H283.94z M412.63,231.77h136.81l604.13,807.76h-136.81L412.63,231.77z" transform="translate(52.39 -25.059)"></path></svg>
                                                </a>
                                                <a href="https://www.instagram.com" target="_blank"  class="text-gray-500 hover:text-pink-500 dark:text-gray-400 dark:hover:text-pink-400" aria-label="Instagram">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill="#9ca3af" viewBox="0 0 16 16" id="instagram" width="25" height="25">
                                                                <path d="M11 0H5a5 5 0 0 0-5 5v6a5 5 0 0 0 5 5h6a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5zm3.5 11c0 1.93-1.57 3.5-3.5 3.5H5c-1.93 0-3.5-1.57-3.5-3.5V5c0-1.93 1.57-3.5 3.5-3.5h6c1.93 0 3.5 1.57 3.5 3.5v6z"></path>
                                                                <path d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8zm0 6.5A2.503 2.503 0 0 1 5.5 8c0-1.379 1.122-2.5 2.5-2.5s2.5 1.121 2.5 2.5c0 1.378-1.122 2.5-2.5 2.5z"></path>
                                                                <circle cx="12.3" cy="3.7" r=".533"></circle>
                                                        </svg>
                                                </a>
                                                <a href="https://youtube.com/@altcryptogems?si=Ur-L-huPwUZ1v5_s" target="_blank" class="text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-500" aria-label="YouTube" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="youtube"  width="25" height="25">
                                                        <g>
                                                        <g>
                                                        <g>
                                                                <path fill="none" stroke="#9ca3af" stroke-linecap="round" stroke-linejoin="round" d="M9.5 7.5v9l7-4.5-7-4.5z"></path>
                                                        </g>
                                                        <path fill="none" stroke="#9ca3af" stroke-linecap="round" stroke-linejoin="round" d="M3.13 4.17 5 3.93a56.22 56.22 0 0 1 7-.43h0a56.22 56.22 0 0 1 7 .43l1.9.24a3 3 0 0 1 2.63 3v9.7a3 3 0 0 1-2.63 3l-1.9.24a56.22 56.22 0 0 1-7 .43h0a56.22 56.22 0 0 1-7-.43l-1.9-.24a3 3 0 0 1-2.63-3V7.15a3 3 0 0 1 2.66-2.98Z"></path>
                                                        </g>
                                                        </g>
                                                        </svg>
                                                </a>
                                                <a href="https://discord.com" target="_blank" class="text-gray-500 hover:text-purple-600 dark:text-gray-400 dark:hover:text-purple-500" aria-label="Discord">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" id="discord" fill="#9ca3af" width="25" height="25">
                                                                <path d="M45.23 57.2c-6.16 0-11.17 5.6-11.17 12.48s5 12.47 11.17 12.47 11.16-5.59 11.16-12.47S51.38 57.2 45.23 57.2Zm0 21c-4 0-7.17-3.8-7.17-8.47s3.21-8.48 7.17-8.48 7.16 3.8 7.16 8.48-3.21 8.42-7.16 8.42Z"></path>
                                                                <path d="M121.83 59.58a156.78 156.78 0 0 0-11.52-31 2.1 2.1 0 0 0-.71-.77 87.08 87.08 0 0 0-15.23-7.17C84.55 17.07 79.91 17 79.72 17a2 2 0 0 0-2 1.72l-.6 4.17a133.14 133.14 0 0 0-26.28 0l-.6-4.17a2 2 0 0 0-2-1.72c-.19 0-4.83 0-14.65 3.61a87.08 87.08 0 0 0-15.19 7.2 2.1 2.1 0 0 0-.71.77 156.72 156.72 0 0 0-11.52 31C1 80.46 0 90.91 0 91.34a2 2 0 0 0 .49 1.5 55.2 55.2 0 0 0 18.2 12.74A76.32 76.32 0 0 0 38.48 111a2 2 0 0 0 1.92-1l5.4-9.25a105.08 105.08 0 0 0 18.2 1.49 105.08 105.08 0 0 0 18.2-1.51l5.4 9.27a2 2 0 0 0 1.72 1h.2a76.32 76.32 0 0 0 19.78-5.38 55.2 55.2 0 0 0 18.2-12.74 2 2 0 0 0 .49-1.5c.01-.47-.94-10.92-6.16-31.8Zm-14.06 42.31a76.76 76.76 0 0 1-17.39 4.92l-4.08-7c4.68-1.24 14.42-4.46 21.83-11.2a2 2 0 1 0-2.69-3c-9 8.23-22.46 10.84-22.6 10.87h-.06A96.59 96.59 0 0 1 64 98.24a96.59 96.59 0 0 1-18.78-1.7h-.06c-.14 0-13.55-2.64-22.6-10.87a2 2 0 1 0-2.69 3c7.41 6.74 17.15 10 21.83 11.2l-4.08 7a76.08 76.08 0 0 1-17.39-4.92A52.24 52.24 0 0 1 4.08 90.8c.33-2.91 1.68-13.07 6-30.24A156.25 156.25 0 0 1 21 30.92a88.17 88.17 0 0 1 14-6.52 61.35 61.35 0 0 1 11.58-3.19l.35 2.39c-4 1-13.85 3.86-21.65 9.53a2 2 0 1 0 2.36 3.23c8.82-6.41 21-9.06 21.86-9.25a118.4 118.4 0 0 1 14.5-.84 117.64 117.64 0 0 1 14.51.84c.91.19 13 2.83 21.86 9.25a2 2 0 1 0 2.36-3.23c-7.8-5.67-17.61-8.52-21.65-9.53l.35-2.39A61.75 61.75 0 0 1 93 24.4a88.17 88.17 0 0 1 14 6.52 156.25 156.25 0 0 1 11 29.64c4.29 17.17 5.64 27.33 6 30.24a52.24 52.24 0 0 1-16.23 11.09Z"></path>
                                                                <path d="M82.77 57.2c-6.15 0-11.16 5.6-11.16 12.48s5 12.47 11.16 12.47 11.17-5.59 11.17-12.47S88.93 57.2 82.77 57.2Zm0 21c-4 0-7.16-3.8-7.16-8.47s3.21-8.48 7.16-8.48 7.17 3.8 7.17 8.48-3.21 8.42-7.17 8.42Z"></path>
                                                        </svg>
                                                </a>
                                        </div>
                                </div>
                                
                        </div>
                </div>
        </footer>

</body>

</html>