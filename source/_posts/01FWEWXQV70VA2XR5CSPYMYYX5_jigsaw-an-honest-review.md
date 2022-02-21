---
extends: _layouts.post
section: content
author: Sofia Vicedomini
title: Jigsaw - an honest review
slug: jigsaw-an-honest-review
id: 01FWEWXQV70VA2XR5CSPYMYYX5
date: 2022-02-21T19:43:09.469Z
tags: [jigsaw,laravel,php,blade,mix,laravel mix,development,static,static website,generator]
categories: [english,opinions,software-development]
excerpt: Jigsaw is a new tool designed for generating static websites with blade templates, here's an honest review for this piece of software.
description: Jigsaw, a tool to generate static website using Blade Templates
featured: false
language: English
cover_image: /assets/img/01FWEWXQV70VA2XR5CSPYMYYX5/cover.png
---

Jigsaw is a new tool designed for generating static websites with blade templates, here's a honest review for this piece of software.

Fun fact, this blog is built on top of Jigsaw, so all my experience with it is well documented on this [GitHub repo](//github.com/blacksoulgem95/blacksoulgem95.github.io)!

## Use Cases

So, Jigsaw is a fantastic tool to develop static website, but what are main usecases for a static website?


### 1. Portfolio Websites

Most professionals use portfolio websites to show off their work and sell themselves to companies.
As an example, this website has a portfolio section called "[Projects](/projects)".

### 2. Databaseless Blogs

It's quite easy to develop a blog using a static website generator such as Jigsaw, create a collection of posts and categories,
link them together, and start writing down markdowns of them. A markdown will be translated to an actual blog post.

### 3. Simple company websites

Most companies don't need a fancy website running on some weird backends, all they need is just a static generated website, 
as they will just showcase their services and products, while having a simple contact form (that you can insert with [Typeform](//typeform.com?utm_source=italianprogrammer.pizza))

You can find even more examples at [Built with Jigsaw Website](//builtwithjigsaw.com?utm_source=italianprogrammer.pizza).

---

I've been thinkering with Jigsaw for the whole weekend developing this website and get rid of the mess that
my Wordpress installation was, and it took me literally one day to get a blog site up and running with Jigsaw, and
especially with a nice UI that Wordpress couldn't give me out of the box (or without learning how to develop WP Themes).

Being based on Laravel Mix and Blade templates, jigsaw's learning curve is extremely flat, especially if you
come from experience with [Laravel](//laravel.com?utm_source=italianprogrammer.pizza), and comes with a set of pre-made
templates you can start off.

Everything is extremely customizable, being all the templates based on Tailwind CSS, hence any modification can be added with ease.

Everything was ready out of the box to work properly in production, with little to none configuration 
(you'd just need to setup the base path for your url rewrites in the <code class="language-bash">config.production.php</code> file).

The main hassle was developing a github workflows to deploy it properly, and now it works in this way:

1. Commit & push to main branch your changes
2. a on-push hook will trigger the deployment workflow
3. the workflow will build the website for production and change the directory from 
   <code>build_production</code> to <code>docs</code> which is the supported folder that Github allows
4. will commit everything and push to the **live** branch (literally a branch named live)

GitHub is expecting a docs folder in the live branch to be used for the site hosting, hence it just works out.

Also, is important to generate the CNAME file so that Github will not erase your custom domain settings at each deployment.

Summing up, this weekend working with Jigsaw was a pleasure, and I strongly suggest anyone thinking about building a 
simple website to try it out!

## Files required to deploy on GitHub Pages

#### CNAME file
<code>/source/CNAME.blade.php</code>

<pre>
<code class="language-markdown">
---
permalink: CNAME
---
italianprogrammer.pizza
</code>
</pre>

#### Workflow file
<code>/.github/workflows/build-docs.yml</code>

<pre>
<code class="language-yaml">
on:
  push:
    branches:
      - 'main'
name: deploy
jobs:
  build:
    runs-on: ubuntu-latest

    steps:
      - uses: actions/checkout@v1
        with:
          fetch-depth: 1

      - name: Setup PHP Action
        uses: shivammathur/setup-php@2.17.0

      - uses: actions/setup-node@v2
        with:
          node-version: '16'

      - name: Install dependencies
        run: |
          sudo apt update && sudo apt install git zip unzip -y
          git config --global user.email "41898282+github-actions[bot]@users.noreply.github.com"
          git config --global user.name "GitHubActions BOT"
          composer update --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist
          composer install --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist
          npm install

      - name: Build the site
        run: npm run prod

      - name: deploy
        run: |
          if [ -d "./docs" ]; then rm -Rf ./docs; fi
          mv ./build_production ./docs
          git add ./docs
          git commit -m "Deployment of website - $(date)"

      - name: Push changes
        uses: ad-m/github-push-action@master
        with:
          github_token: ${{ secrets.DEPLOY_SECRET }}
          branch: live
          force: true
</code>
</pre>