/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./*.{html,js}"],
    theme: {
      extend: {
        colors: {
          aliceblue: "#f3f7ff",
          black: "#000",
          white: "#fff",
          dimgray: "#7a7272",
          dodgerblue: "#1976d2",
          gainsboro: "#e8e8e8",
          gray: { "100": "#fdfdfd", "200": "#fcfcfc" },
          darkgray: "#a1a7a3",
          cornflowerblue: "#1179c5",
          darkslategray: "#393939",
          darkslateblue: { "100": "#5962bc", "200": "rgba(89, 98, 188, 0.32)" },
          midnightblue: "#243aa0",
        },
        fontFamily: { inter: "Inter" },
        borderRadius: { base: "40px" },
      },
      fontSize: { sm: "24px", base: "36px", lg: "48px" },
    },
    corePlugins: { preflight: false },
  };
  