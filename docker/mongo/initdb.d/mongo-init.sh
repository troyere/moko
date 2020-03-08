#!/bin/bash
set -Eeuo pipefail

# _js_escape 'some "string" value'
_js_escape() {
	jq --null-input --arg 'str' "$1" '$str'
}

"${mongo[@]}" "$MONGO_INITDB_DATABASE" <<-EOJS
  db.createUser({
    user: $(_js_escape "$MONGO_INITDB_USERNAME"),
    pwd: $(_js_escape "$MONGO_INITDB_PASSWORD"),
    roles: [ { role: 'dbOwner', db: $(_js_escape "$MONGO_INITDB_DATABASE") } ]
  })
EOJS
