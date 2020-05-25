<?php

use brofit\Router;

Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');