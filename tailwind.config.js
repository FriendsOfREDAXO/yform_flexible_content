module.exports = {
    mode: 'jit',
    important: '#flexible-content',
    content: [
        './lib/**/*.php',
        './pages/**/*.php',
        './fragments/**/*.php',
        './resources/**/*.js',
    ],  theme: {
        extend: {
        },
    },
    corePlugins: { // remove default styles
        preflight: false,
    },
    plugins: [
    ],
};
