# WP Steak [![Build Status](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/badges/build.png?b=develop)](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/build-status/develop) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/?branch=develop) [![Code Coverage](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/badges/coverage.png?b=develop)](https://scrutinizer-ci.com/g/Apiki/wpsteak-plugin/?branch=develop)
## Features
* All advantages from [WPSteak](https://github.com/Apiki/wpsteak)
* [Dependency injection container](https://container.thephpleague.com/);
* Ready for unit tests with PHPUnit;
* PHP CodeSniffer configured with WordPress Coding Standards;
* Wonderful resources processing configuration extracted from [wpemerge-theme](https://github.com/htmlburger/wpemerge-theme);
* PHP PSR-4 autoloading for all your source code and tests;
## Requirements
* PHP >= 7.1
* Composer
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
│   │   ├── Category.php
│   │   ├── Example.php
│   │   ├── Page.php
│   │   ├── Post.php
│   │   └── Tag.php
│   ├── Providers/                   # Your hooks declarations.
│   │   ├── Example/
│   │   │   ├── PostMeta.php
│   │   │   └── PostType.php
│   │   └── Assets.php
│   ├── Repositories/                # Where you put your data handle (includes API).
│   │   ├── Category.php
│   │   ├── Example.php
│   │   ├── Page.php
│   │   ├── Post.php
│   │   └── Tag.php
│   ├── Services/                    # Where your business logic goes on.
│   └── Widgets/                     # Widget classes.
├── tests/                           # PHP Unit tests.
├── views/                           # View files used for metaboxes, shortcodes, etc.
├── config.json.dist
├── config.php                       # Where your providers and services providers will be loaded.
└── wpsteak.php                      # Bootstrap plugin.
```
