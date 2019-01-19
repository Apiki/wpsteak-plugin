# WP Steak [![Build Status](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/badges/build.png?b=develop)](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/build-status/develop) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/?branch=develop) [![Code Coverage](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/badges/coverage.png?b=develop)](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/?branch=develop)
## Features
* [Dependency injection container](https://container.thephpleague.com/);
* Ready for unit tests with PHPUnit;
* PHP CodeSniffer configured with WordPress Coding Standards;
* Wonderful resources processing configuration extracted from [wpemerge-theme](https://github.com/htmlburger/wpemerge-theme);
* PHP PSR-4 autoloading for all your source code and tests;
## Requirements
* PHP >= 7.1
* Composer
## API Reference
http://wpsteak-api.surge.sh/master/
## Quickstart
1. Browse to `wp-content/plugins`.
1. Run `composer create-project apiki/wpsteak-plugin your-plugin-name`.
## Directory structure
```shell
.
├── dist/                            # Bundles, optimized images etc.
├── languages/                       # Language files.
├── resources/                       # Build process configuration, Scripts, Styles, etc.
├── src/                             # PSR-4 autoloaded classes.
│   ├── Entities/                    # Classes for using on data mapper.
│   │   ├── AbstractPost.php
│   │   ├── AbstractTerm.php
│   │   ├── Category.php
│   │   ├── CollectionInterface.php
│   │   ├── Collection.php
│   │   ├── EntityInterface.php
│   │   ├── Page.php
│   │   ├── PostInterface.php
│   │   ├── Post.php
│   │   ├── Tag.php
│   │   └── TermInterface.php
│   ├── Loggers/                     # Classes for handle log.
│   │   └── WordPress.php
│   ├── Providers/                   # Your hooks declarations.
│   │   ├── AbstractPostType.php
│   │   ├── AbstractTaxonomy.php
│   │   └── Assets.php
│   ├── Repositories/                # Where you put your data handle (includes API).
│   │   ├── AbstractPost.php
│   │   ├── AbstractTerm.php
│   │   ├── Category.php
│   │   ├── Page.php
│   │   ├── Post.php
│   │   └── Tag.php
│   ├── Services/                    # Where your business logic goes on.
│   │   ├── Labels/
│   │   │   ├── Common.php
│   │   │   ├── PostType.php
│   │   │   └── Taxonomy.php
│   │   ├── Meta/
│   │   │   ├── IMeta.php
│   │   │   ├── PostInterface.php
│   │   │   ├── Post.php
│   │   │   ├── ServiceProvider.php
│   │   │   ├── TermInterface.php
│   │   │   └── Term.php
│   │   └── Assets.php
│   └── Widgets/                     # Widget classes.
├── tests/                           # PHP Unit tests.
├── views/                           # View files used for metaboxes, shortcodes, etc.
├── config.json.dist
├── config.php                       # Where your providers and services providers will be loaded.
└── wpsteak.php                      # Bootstrap plugin.
```
