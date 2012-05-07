<?php
if(!defined('MEDIAWIKI')) {
	echo("This file is an extension to the MediaWiki software and cannot be used standalone\n");
	die( 1 );
}

$wgExtensionCredits['hook'][] = array(
	'path' => __FILE__,
	'name' => 'GitHub Repository',
	'descriptionmsg' => 'githubrepository-desc',
	'author' => array('Simon Walker'),
);

$directory = dirname( __FILE__ );
$wgExtensionMessagesFiles['GitHubRepository'] = "$directory/GitHubRepository.i18n.php";

$wgHooks['GitViewers'][] = "efGitHubGitViewers";

function efGitHubGitViewers(&$viewers) {
	$viewers["git@github.com:(.*).git"] = "https://github.com/$1/tree/%H";

	return true;
}
