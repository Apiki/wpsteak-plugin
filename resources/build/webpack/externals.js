// List gutenberg packages to add as externals.
const wpPackages = [
  'data',
  'i18n',
  'blocks',
  'components',
];

const externals = {
  jquery: 'jQuery',
  react: 'React',
  'react-dom': 'ReactDOM',
};

// Auto include Gutenberg packages in externals.
wpPackages.forEach(wpPackage => {
  externals[`@wordpress/${wpPackage}`] = ['wp', wpPackage];
});

module.exports = externals;
