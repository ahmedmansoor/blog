module.exports = {
    purge: ["./resources/views/**/*.blade.php", "./resources/css/**/*.css"],
    theme: {
        extend: {
            backgroundImage: {
                hero: "url('/storage/img/bg.jpg')",
            },
            fontFamily: {
                heading: ["Calistoga", "sarif"],
                normal: ["Nunito", "sarif"],
            },
            colors: {
                primary: "#C9564E",
                primarydark: "#9D3730",
                primarylight: "#FAEEED",
            },
        },
    },
    variants: {},
    plugins: [require("@tailwindcss/ui")],
};
