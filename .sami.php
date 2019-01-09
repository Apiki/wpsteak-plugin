<?php
/**
 * @package   App
 * @author    Apiki
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 */

use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Version\GitVersionCollection;
use Sami\Parser\Filter\PublicFilter;

define( 'DS', DIRECTORY_SEPARATOR );

$repository = 'Apiki/wpsteak-plugin';
$relative_dir = 'src';
$dir = __DIR__ . DS . $relative_dir;
$documentation_dir = __DIR__ . DS . 'api-reference';

$versions = GitVersionCollection::create($dir)
	->addFromTags('*.*.*')
	->add('develop', 'develop branch');

return new \Sami\Sami( $dir, [
	'title' => 'WP Steak',
	'versions' => $versions,
	'remote_repository' => new GitHubRemoteRepository( $repository, dirname( $dir ) ),
	'build_dir' => $documentation_dir . DS . 'build' . DS . '%version%',
	'cache_dir' => $documentation_dir . DS . 'cache' . DS . '%version%',
	'filter' => new PublicFilter(),
] );
