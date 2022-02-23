<?php $__env->startSection('content'); ?><p>Jigsaw is a new tool designed for generating static websites with blade templates, here's a honest review for this piece
of software.</p>

<p>Fun fact, this blog is built on top of Jigsaw, so all my experience with it is well documented on
this <a href="//github.com/blacksoulgem95/blacksoulgem95.github.io">GitHub repo</a>!</p>

<h2>Use Cases</h2>

<p>So, Jigsaw is a fantastic tool to develop static website, but what are main usecases for a static website?</p>

<h3>1. Portfolio Websites</h3>

<p>Most professionals use portfolio websites to show off their work and sell themselves to companies. As an example, this
website has a portfolio section called "<a href="/projects">Projects</a>".</p>

<h3>2. Databaseless Blogs</h3>

<p>It's quite easy to develop a blog using a static website generator such as Jigsaw, create a collection of posts and
categories, link them together, and start writing down markdowns of them. A markdown will be translated to an actual
blog post.</p>

<h3>3. Simple company websites</h3>

<p>Most companies don't need a fancy website running on some weird backends, all they need is just a static generated
website, as they will just showcase their services and products, while having a simple contact form (that you can insert
with <a href="//typeform.com?utm_source=italianprogrammer.pizza">Typeform</a>)</p>

<p>You can find even more examples at <a href="//builtwithjigsaw.com?utm_source=italianprogrammer.pizza">Built with Jigsaw Website</a>.</p>

<hr />

<p>I've been thinkering with Jigsaw for the whole weekend developing this website and get rid of the mess that my Wordpress
installation was, and it took me literally one day to get a blog site up and running with Jigsaw, and especially with a
nice UI that Wordpress couldn't give me out of the box (or without learning how to develop WP Themes).</p>

<p>Being based on Laravel Mix and Blade templates, jigsaw's learning curve is extremely flat, especially if you come from
experience with <a href="//laravel.com?utm_source=italianprogrammer.pizza">Laravel</a>, and comes with a set of pre-made templates
you can start off.</p>

<p>Everything is extremely customizable, being all the templates based on Tailwind CSS, hence any modification can be added
with ease.</p>

<p>Everything was ready out of the box to work properly in production, with little to none configuration
(you'd just need to setup the base path for your url rewrites in the <code class="language-bash">
config.production.php</code> file).</p>

<p>The main hassle was developing a github workflows to deploy it properly, and now it works in this way:</p>

<ol>
<li>Commit &amp; push to main branch your changes</li>
<li>a on-push hook will trigger the deployment workflow</li>
<li>the workflow will build the website for production and change the directory from 
<code>build_production</code> to <code>docs</code> which is the supported folder that Github allows</li>
<li>will commit everything and push to the <strong>live</strong> branch (literally a branch named live)</li>
</ol>

<p>GitHub is expecting a docs folder in the live branch to be used for the site hosting, hence it just works out.</p>

<p>Also, is important to generate the CNAME file so that Github will not erase your custom domain settings at each
deployment.</p>

<p>Summing up, this weekend working with Jigsaw was a pleasure, and I strongly suggest anyone thinking about building a
simple website to try it out!</p>

<h2>Files required to deploy on GitHub Pages</h2>

<h4>CNAME file</h4>

<p><code>/source/CNAME.blade.php</code></p>

<pre>
<code class="language-markdown">
---
permalink: CNAME
---
italianprogrammer.pizza
</code>
</pre>

<h4>Workflow file</h4>

<p><code>/.github/workflows/build-docs.yml</code></p>

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
      - uses: actions/checkout<?php echo e('@'); ?>v1
        with:
          fetch-depth: 1

      - name: Setup PHP Action
        uses: shivammathur/setup-php<?php echo e('@'); ?>2.17.0

      - uses: actions/setup-node<?php echo e('@'); ?>v2
        with:
          node-version: '16'

      - name: Install dependencies
        run: |
          sudo apt update && sudo apt install git zip unzip -y
          git config --global user.email "41898282+github-actions[bot]<?php echo e('@'); ?>users.noreply.github.com"
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
        uses: ad-m/github-push-action<?php echo e('@'); ?>master
        with:
          github_token: ${{ secrets.DEPLOY_SECRET }}
          branch: live
          force: true
</code>
</pre>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>