module.exports = {
  purge: [],
  darkMode: "class", // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'background': '#283149',
        'content-background-light': '#F6F6F6',
        'background-component' : '#404B69',
        'background-component-2' : '#333C55',
        'background-component-light': 'rgba(0, 156, 167, 0.16)',
        'background-component-2-light': 'rgba(0, 156, 167, 0.08)',
        'primary-white' : '#fff',
        'primary-black' : '#292929',
        'subtext' : '#9AADB4',
        'component': '#009CA7',
        'hover-component' : '#2EADB6',
      },
      backgroundImage: {
        'content-background-gradient': 'linear-gradient(#283149, #232A3F)',
      },
    },
  },
  variants: {
    extend: { backgroundImage: ['dark'] },
  },
  plugins: [],
}
