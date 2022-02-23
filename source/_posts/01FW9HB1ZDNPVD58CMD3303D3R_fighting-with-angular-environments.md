---
extends: _layouts.post
section: content
author: Sofia Vicedomini
title: Fighting with Angular Environments
slug: fighting-with-angular-environments
id: 01FW9HB1ZDNPVD58CMD3303D3R
date: 2022-01-13T07:00:19.656Z
tags: [angular,configuration,environment,environments,saas]
categories: [english,software-development]
excerpt: Angular has a fantastic way of setting configurations for our application if our application has only one company as its users. But, what if we need to deploy our application, with different variables each time?
description: How to properly configure an Angular application for SAAS solutions
featured: false
language: en_GB
---

Angular has a fantastic way of setting configurations for our application if our application has only one company as its users. But, what if we need to deploy our application, with different variables each time? (Like in a white-labeled SaaS deployment or on-prem deployment).

## How Angular Env works

Angular works through the magic of the <code  class="language-bash">src/environments/environment.ts</code> file, which is substituted every time with the correct version, which lives alongside it.

If you deep dive into the configuration of our <code  class="language-bash">angular.json</code> file you will notice this:

<pre class="language-json">
<code class="language-json">
"development": {
 "buildOptimizer": false,
 "optimization": false,
 "vendorChunk": true,
 "extractLicenses": false,
 "sourceMap": true,
 "namedChunks": true,
 "fileReplacements": [
   {
     "replace": "src/environments/environment.ts",
     "with": "src/environments/environment.dev.ts"
   }
 ]
}
</code>
</pre>

As you see, when we deploy for a specific environment, Angular copies it’s environment file and uses it to substitute with the original one, and will be taken by the rest of the application for processing.

## But I can’t have 2000 configuration files around!

Exactly! That’s the problem we’re going to solve right now.

We will need two (dev) dependencies tho:
<pre class="language-bash">
<code class="language-bash">
dotenv
handlebars
</code>
</pre>

you can simply install them through the following code:

<pre class="language-bash">
<code class="language-bash">
npm i --save-dev dotenv handlebars
</code>
</pre>

## Creating our configuration template

In the <code class="language-bash">src/environments</code> folder we will create a <code class="language-bash">environment.hbs</code> file, with the following content:

<pre class="language-javascript">
<code class="language-javascript">
export const environment = {
  production: {{PRODUCTION}},
  apiURL: '{{BACKEND_URL}}',
  authURL: '{{AUTH_URL}}'
}
</code>
</pre>

Obviously, feel free to adapt it to your needs, remember to refer to the handlebars documentation, which will come quite handy if you’re new to handlebars templating engine.

## Parsing the template

Now comes the fun part, in the root of your project, let’s create a <code class="langauge-bash">env-config.js</code> file that looks like the following:

<pre class="language-javascript">
<code class="language-javascript">
require('dotenv')
const path = require('path')
const fs = require('fs')
const hbs = require('handlebars')

const envPath = path.join(__dirname, 'src', 'environments')
const templateFilePath = path.join(envPath, 'environment.hbs')
const environmentFilePath = path.join(envPath, 'environment.ts')

const template = hbs.compile(fs.readFileSync(templateFilePath, { encoding: 'utf-8' }))

const data = {
  PRODUCTION: process.env.PRODUCTION || false,
  BACKEND_URL: process.env.BACKEND_URL || 'http://localhost:3000',
  AUTH_URL: process.env.AUTH_URL || 'http://localhost:3000/auth'
}

fs.writeFileSync(environmentFilePath, template(data), { encoding: 'utf-8' })
</code>
</pre>

What does it do? Let’s go through it together.

1. Loads the <code  class="language-bash">dotenv</code> library, which will read our <code  class="language-bash">.env</code> file in our local machines and feed it into the <code  class="language-bash">process.env</code> variable.
2. Loads our <code  class="language-bash">environment.hbs</code> template file and feeds it into the handlebars compile API, which will return us a function that we can later use to fill in the gaps.
3. Configures the data we need to fill in our template, as you might notice, in the object, the key is the keys defined between the <code  class="language-bash">{{</code> and <code  class="language-bash">}}</code> in our handlebars template, handlebars will substitute that key with the value we’re passing in. In here we can also configure defaults for our variables.
4. Takes the data we made and sends it to the template ( <code  class="language-bash">template(data)</code> ), then saves it’s content to <code  class="language-bash">src/environments/environment.ts</code>

And voilà! Our environment file is ready for our custom n-th environment!

## Processing the template at each build

We need to create a new script in our <code  class="language-bash">package.json</code> file, let’s call it ‘config’.

<pre class="language-javascript">
<code class="language-javascript">
{
   ...
   "scripts": {
     "ng": "ng",
     "config": "node env-config.js",
     ...
   }
   ...
}
</code>
</pre>

and now, we need to refer to it every time we build or need to serve our application:

<pre class="language-javascript">
<code class="language-javascript">
{
   ...
   "scripts": {
     "ng": "ng",
     "config": "node env-config.js",
     "start": "npm run config && ng serve --configuration=local",
     "build": "npm run config && ng build --configuration=production --output-hashing=all",
     "build-dev": "npm run config && ng build --configuration=development --output-hashing=all",
     "build-local": "npm run config && ng build --configuration=local",
     "watch": "npm run config && ng build --watch --configuration local",
     "test": "npm run config && ng test",
     ...
   }
   ...
}
</code>
</pre>

And here, folks, is how we parametrize the environment of an Angular application through the environment variables of the machines that build it.
