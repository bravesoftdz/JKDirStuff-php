# JKDirStuff-php

For example, give a path with some ../ in it and see if it correctly converts it to an absolute path
```
Testing JKDirStuff::abspath

1. PASS 'a/path/to/the/../../stuff' => 'a/path/stuff'
2. PASS 'a/path/../this' => 'a/this'
3. PASS '/a/path/to/this' => '/a/path/to/this'
4. PASS '/a/path/to/this/trailingslash/' => '/a/path/to/this/trailingslash/'
5. PASS '/a/path/to/this/../' => '/a/path/to/'
6. PASS '/../foobar' => false
7. PASS '../foobar' => false
8. PASS '/a/../../../' => false
9. PASS '/a/../../' => false
10. PASS '/a/../' => '/'
11. PASS 'a/../' => ''
12. PASS './foobar' => 'foobar'
13. PASS '/./foobar' => '/foobar'

13 passed.
0 failed.
```
