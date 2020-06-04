<?php

use brofit\Router;

//Router::add('^/news/get-news-after-date/(?P<>[&]+)$',['controller' => 'news', 'action' => 'get-news-after-date']);
Router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)$');
