module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      backgroundImage: theme => ({
        'wave-nav': "url(../img/Rewave2.png)",
        'wave-inv': "url(../img/Rewave2inv.png)",
        'blob-card':"url(../img/blob1.svg)"
      })
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
