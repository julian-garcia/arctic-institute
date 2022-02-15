const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  theme: {
    fontFamily: {
      title: ['ProximaBold', 'sans-serif'],
      sans: ['Proxima', 'sans-serif'],
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
        light: '#f7f7f7',
        DEFAULT: '#E3E3E3',
        dark: '#707070'
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
        alt3: '#C5283D',
        alt4: '#F4AD3D'
      },
      red: {
        DEFAULT: '#C32339',
        alt: '#C5283D'
      },
      input: {
        DEFAULT: '#EFF3F6'
      }
    },
    extend: {
      screens: {
        'md': '781px',
      },
      fontSize: {
        'alt-sm': '15px',
        'alt': '17px',
        'lg': '20px',
        'xl': '21px',
        '2xl': '25px',
        '4xl': '35px',
        '5xl': '45px',
      },
    },
    screens: {
      'xs': '400px',
      ...defaultTheme.screens,
    },
  },
  purge: {
    content: [
      './**/*.php',
      './assets/src/**/*.js',  
    ],
    safelist: [
      '-mt-20', '-ml-8', '-mt-8', 'mt-16', '-mt-20', '-mt-14', 'mt-12', 'mb-12', '-ml-9',
      'max-w-xl', 'max-w-3xl', 'my-8', 'md:-mt-20', 'md:hidden', 'md:flex',
      'bg-news', 'bg-news-alt1', 'bg-news-alt2', 'bg-news-alt3'
    ]
  },
}