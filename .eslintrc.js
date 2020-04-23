module.exports = {
  extends: [
    'airbnb',
    'plugin:@wordpress/eslint-plugin/recommended'
  ],
  rules: {
    // Prevent warnings for webpack resolve aliases.
    'import/no-unresolved': 'off',
    // Prevent warnings for webpack extension resolution.
    'import/extensions': 'off',
    // Prevent warnings for import statements with aliases.
    'import/first': 'off',
  },
};
