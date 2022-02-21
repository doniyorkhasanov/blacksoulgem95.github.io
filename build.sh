#!/usr/bin/env bash

./vendor/bin/jigsaw build production
npm run prod

if [ -d "./docs" ]; then rm -Rf ./docs; fi

mv ./build_production ./docs

git checkout -b live

git add ./docs
git commit -m "Deployment of website - $(date)"
git push --set-upstream origin live