module.exports = {
  theme: {
    fontFamily: {
      sans: ['Raleway', 'sans-serif'],
      serif: ['PT Serif', 'serif'],
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      blue: {
        light: '#05507A',
        DEFAULT: '#05507A',
        dark: '#05507A',
      },
      white: {
        light: '#fff',
        DEFAULT: '#fff',
        dark: '#fff',
      },
      black: {
        light: '#032538',
        DEFAULT: '#032538',
        dark: '#032538',
      },
    }
  },
  purge: [
    './**/*.php',
    './assets/src/**/*.js',
  ]
}