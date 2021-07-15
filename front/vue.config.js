module.exports = {
  css: {
    loaderOptions: {
      sass: {
        prependData: '@import "@/css/vars.scss";',
      },
    },
  },
};
