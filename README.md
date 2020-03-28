# wordpress plugin (Command Line Interface) check  
Live WordPress Plugin Checker.
## System Requirements

-  PHP = 7.4
-  JSON PHP Extension
-  CURL PHP Extension

## Installation
### Via composer
```bash
composer global require benemohamed/wordpress-plugin-cli-check
```

## How to Use
```bash
$ wp-p-c target [-o|--output [OUTPUT]] [--] <url> [<plugin>]
```

> Log output one your HOME/.wp-p-c/{query-date(...)}/{good|bad}.csv

## License
[![GitHub license](https://img.shields.io/github/license/benemohamed/wordpress-plugin-cli-check.svg)](https://github.com/benemohamed/wordpress-plugin-cli-check)
