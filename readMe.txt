
# PHP GitHub Issue Creation API and BitBucket Issue Creation API

A simple Object Oriented wrapper to create issues on GitHub, BitBucket and any other similiar API based interface, written with PHP5. 

Usage [GitHub API](https://developer.github.com/v3/). The object API is very similar to the RESTful API.
Usage [BitBucket API](https://confluence.atlassian.com/display/BITBUCKET/issues+Resource). The object API is very similar to the RESTful API.

## Features

* Covers GitHub, BitBucket and Third Party API for issue creation
* Follows PEAR conventions and coding standard: autoload friendly
* Light and fast thanks to lazy loading of API classes
* Extensively tested and documented

## Requirements

* PHP version support >= v5.5.x
* [php curl](http://php.net/manual/en/book.curl.php).
* For [Windows-cURL] Installation: Refer (https://guides.instructure.com/m/4214/l/83393-how-do-i-install-and-use-curl-on-a-windows-machine)
* For [Linux/Ubuntu-cURL] Installation: Step 1> Open Terminal; Step 2> apt-get update; Step 3> apt-get install php5-curl; Step 4> apt-get install curl;

## Autoload

The steps to setup:

[Step 1]: Unzip code to /path/to/root/foldername
[Step 2]: Open command line
[Step 3]: cd /browse/to/path/to/root/foldername

## For access to GitHub Issue API
[Step 4]: php create-ticket.php -u username -p password https://api.github.com/repos/{accountname}/{repo_slug}/issues -d "Issue Title" "Issue Description"

## For access to BitBucket Issue API
[Step 4]: php create-ticket.php -u username -p password https://bitbucket.org/api/1.0/repositories/{accountname}/{repo_slug}/issues/ -d "Issue Title" "Issue Description"
[NOTE] 	: You need to have 'Issue Tracking' enabled in you BitBucket repository.

[Syntax]: [-u] [username] [-p] [password] [repositoryURL] [-d] ["title"] ["body/content"] ["other data"]


Creating issues, creating new issue in repository with valid username and password.
Wrap [GitHub Issue API](https://developer.github.com/v3/issues/).
Wrap [BitBucket Issue API](https://confluence.atlassian.com/display/BITBUCKET/issues+Resource#issuesResource-POSTanewissue).

### Issue Creation

[Step 1]: Open command line
[Step 2]: cd /browse/to/path/to/api_unzipped_directory

# For access to GitHub Issue API
[Step 3]: php create-ticket.php -u username -p password https://api.github.com/repos/{accountname}/{repo_slug}/issues -d "Issue Title" "Issue Description"

# For access to BitBucket Issue API
[Step 3]: php create-ticket.php -u username -p password https://bitbucket.org/api/1.0/repositories/{accountname}/{repo_slug}/issues/ -d "Issue Title" "Issue Description"

---------------------------------------------------------------------------
Creates a new issue in your repository
The issue is assigned to the authenticated user. Requires authentication.
Returns valid error/success message.
---------------------------------------------------------------------------

[NOTE/Optional] : default GitHub(defined in GITHUB_REPO_URL variable) and BitBucket(defined in BITBUCKET_REPO_URL variable)  repository url can also be provided on config.php file (to be found on api directory).
And, then the script can also be used as,

php create-ticket.php -u username -p password github/GITHUB -d "Issue Title" "Issue Description"

php create-ticket.php -u username -p password bitbucket/BITBUCKET -d "Issue Title" "Issue Description"

[Default BitBucket/GitHub URL is provided in config.php]

Thanks to GitHub and BitBucket for the high quality API and documentation.
