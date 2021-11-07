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
        light: '#052537',
        DEFAULT: '#05507A',
        dark: '#032538',
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
      news: {
        DEFAULT: '#F6AE2D',
        alt1: '#F68A2D',
        alt2: '#E25E34',
        alt3: '#C5283D'
      }
    }
  },
  purge: [
    './**/*.php',
    './assets/src/**/*.js',
  ]
}