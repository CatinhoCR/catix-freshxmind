const path = require('path')

module.exports = {
  THEME_NAME: 'freshxmind',
  HOST: 'catix-freshxmind.dev',
  BROWSER_SYNC_PORT: 3100,
  WEBPACK_DEV_SERVER_PORT: 8100,
  PATHS: {
    theme: unipath(path.resolve(__dirname, '..')),
    src: unipath(path.resolve(__dirname, '../src')),
    build: unipath(path.resolve(__dirname, '../build')),
  },
  HOMEDIR: require('os').homedir(),
}

function unipath(base) {
  return function join(...args) {
    const ppaths = [base].concat(Array.from(args))
    return path.resolve(path.join.apply(null, ppaths))
  }
}
