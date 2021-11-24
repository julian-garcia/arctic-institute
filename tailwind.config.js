module.exports = {
  theme: {
    fontFamily: {
      sans: ['Raleway', 'sans-serif'],
      serif: ['PT Serif', 'serif'],
    },
    colors: {
      transparent: 'transparent',
      current: 'inherit',
      blue: {
        light: '#052537',
        DEFAULT: '#05507A',
        dark: '#032538',
        project: '#002130'
      },
      grey: {
        DEFAULT: '#E3E3E3',
      },
      white: {
        light: '#fff',
        DEFAULT: '#fff',
        dark: '#fff',
      },
      black: {
        light: '#032538',
        DEFAULT: '#032538',
        dark: '#000',
      },
      news: {
        DEFAULT: '#F6AE2D',
        alt1: '#F68A2D',
        alt2: '#E25E34',
        alt3: '#C5283D'
      },
      red: {
        DEFAULT: '#C32339',
        alt: '#C5283D'
      }
    },
    extend: {
      screens: {
        'xs': '400px',
        'md': '781px',
      },
    },
  },
  purge: {
    content: [
      './**/*.php',
      './assets/src/**/*.js',  
    ],
    safelist: [
      '-mt-20', '-ml-9', 'max-w-xl', 'max-w-3xl'
    ]
  },
}