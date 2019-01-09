# WP Steak [![Build Status](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/badges/build.png?b=develop)](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/build-status/develop) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/?branch=develop) [![Code Coverage](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/badges/coverage.png?b=develop)](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/?branch=develop)
## API Reference
http://wpsteak-api.surge.sh/master/
## Directory structure
```
.
├── dist/                          # Bundles, optimized images etc.
├── languages/                     # Language files.
├── resources/                     # Build process configuration, Scripts, Styles, etc.
├── src/                           # PSR-4 autoloaded classes.
│   ├── Entities/                  # Classes for using on data mapper.
│   │   ├── AbstractCollection.php
│   │   ├── AbstractPost.php
│   │   ├── AbstractTerm.php
│   │   ├── CollectionInterface.php
│   │   ├── EntityInterface.php
│   │   ├── PostInterface.php
│   │   └── TermInterface.php
│   ├── Loggers/                   # Classes for handle log.
│   │   └── WordPress.php
│   ├── Providers/                 # Your hooks declarations.
│   │   ├── AbstractPostType.php
│   │   ├── AbstractTaxonomy.php
│   │   └── Assets.php
│   ├── Repositories/              # Where you put your data handle (includes API).
│   ├── Services/                  # Where your business logic goes on.
│   └── Widgets/                   # Widget classes.
├── tests/                         # PHP Unit tests.
├── views/                         # View files used for metaboxes, shortcodes, etc.
├── config.json.dist
├── config.php                     # Where your providers and services providers will be loaded.
└── wpsteak.php                    # Bootstrap plugin.
```