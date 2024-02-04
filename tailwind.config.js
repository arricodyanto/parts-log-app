import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    important: true,
    darkMode: "false",
    content: [
        // "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        // "./storage/framework/views/*.php",
        // "./resources/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: {
                xs: "0rem",
                xl: "8rem",
            },
        },
        screens: {
            xs: "310px",
            sm: "360px",
            md: "760px",
            lg: "1200px",
            xl: "1440px",
        },
        fontFamily: {
            sans: ['"Open Sans", sans-serif'],
        },
        extend: {
            fontFamily: {
                brand: ['"Montserrat", sans-serif'],
            },
            colors: {
                primary: "#0fa3b1",
                secondary: "#d7edf7",
                accent: "#f9dc66",
                dark: "#0f172a",
                grey: "#374151",
            },
        },
    },
    plugins: [require("daisyui"), forms],

    // daisyui config
    daisyui: {
        themes: [
            // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "cupcake"]
            {
                light: {
                    ...require("daisyui/src/theming/themes")["light"],
                    primary: "#0fa3b1",
                    secondary: "#d7edf7",
                    accent: "#f9dc66",
                },
            },
        ],
        darkTheme: "light", // name of one of the included themes for dark mode
        base: true, // applies background color and foreground color for root element by default
        styled: true, // include daisyUI colors and design decisions for all components
        utils: true, // adds responsive and modifier utility classes
        prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
        logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
        themeRoot: ":root",
    },
};
