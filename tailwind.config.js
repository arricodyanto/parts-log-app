/** @type {import('tailwindcss').Config} */
export default {
    important: true,
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
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
    plugins: [require("daisyui")],

    // daisyui config
    daisyui: {
        themes: false, // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "cupcake"]
        darkTheme: "light", // name of one of the included themes for dark mode
        base: true, // applies background color and foreground color for root element by default
        styled: true, // include daisyUI colors and design decisions for all components
        utils: true, // adds responsive and modifier utility classes
        prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
        logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
        themeRoot: ":root",
    },
};
