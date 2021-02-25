module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      backgroundImage: theme => ({
        'wave-nav': "url(../img/rewave.svg)",
        'blob-card':"url(../img/blob1.svg)"
      })
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
