#!/bin/bash
echo ''
echo 'Searching for names that include the title "Prof"'
echo '-----------'
curl -XGET 'http://127.0.0.1:9200/users/name/_search?q=name:Prof'
echo ''
echo ''
echo ''
echo 'Searching for names that include the title "PhD"'
echo '-----------'
curl -XGET 'http://127.0.0.1:9200/users/name/_search' -d '{
    "query": {
        "match":{
            "name":"Ressie Hettinger PhD"
        }
    }
}'
echo ""
