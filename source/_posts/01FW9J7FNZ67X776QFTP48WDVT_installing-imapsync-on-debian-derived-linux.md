---
extends: _layouts.post
section: content
author: Sofia Vicedomini
title: Installing imapsync on Debian-derived Linux
slug: installing-imapsync-on-debian-derived-linux
id: 01FW9J7FNZ67X776QFTP48WDVT
date: 2022-01-14T18:00:08.618Z
tags: [imapsync,configuration,imap,pop,email,debian,linux,guide,installation]
categories: [configuration,it-sysadmin,english]
excerpt: One of the most awesome tools I’ve found in my side job as WebMaster, is imapsync, a fantastic tool to migrate IMAP mailboxes across different providers.
description: imapSync is a tool to syncronise two IMAP accounts
featured: false
language: english
---
One of the most awesome tools I’ve found in my side job as WebMaster, is [imapsync](https://imapsync.lamiral.info/), a fantastic tool to migrate IMAP 
mailboxes across different providers.

The main problem tho is that the package does not come pre-compiled, and lacks of proper instructions for installing it, if you’re a newbie.
Here’s a simple guide on Installing it!

I’ve developed an automated script that will automatically download and install all the 
dependencies needed and automatically installs imapsync in your <code  class="language-bash">/usr/bin</code> directory.

To simply one-click install <code class="language-bash">imapsync</code>, run this:

<pre class="language-bash">
curl https://raw.githubusercontent.com/blacksoulgem95/imapsync-installer/main/installer.sh | sudo bash
</pre>

To check what the script does, here it's hosted on [GitHub](https://github.com/blacksoulgem95/imapsync-installer).

To manually install <code  class="language-bash">imapsync</code>, we’d need to first install its required dependencies.
Remember to run <code  class="language-bash">sudo apt update && sudo apt upgrade</code> to update your system before proceeding.

## Step 1: Install APT Dependencies

<pre class="language-bash">
sudo apt-get -y install git rcs make makepasswd cpanminus apt-file
</pre>

<pre class="language-bash">
sudo apt-get -y install gcc libssl-dev libauthen-ntlm-perl \
libclass-load-perl libcrypt-ssleay-perl liburi-perl \
libdata-uniqid-perl libdigest-hmac-perl libdist-checkconflicts-perl \
libfile-copy-recursive-perl libio-compress-perl libio-socket-inet6-perl \
libio-socket-ssl-perl libio-tee-perl libmail-imapclient-perl \
libmodule-scandeps-perl libnet-ssleay-perl libpar-packer-perl \
libreadonly-perl libsys-meminfo-perl libterm-readkey-perl \
libtest-fatal-perl libtest-mock-guard-perl libtest-pod-perl \
libtest-requires-perl libtest-simple-perl libunicode-string-perl \
libencode-imaputf7-perl libfile-tail-perl libregexp-common-perl \
libregexp-common-email-address-perl libregexp-common-perl \
libregexp-common-time-perl libtest-deep-fuzzy-perl libtest-deep-perl \
libtest-deep-json-perl libtest-deep-perl libtest-deep-type-perl \
libtest-deep-unorderedpairs-perl libtest-modern-perl libtest-most-perl
</pre>

## Step 2: Install Python modules

<pre class="language-bash">
sudo cpanm Crypt::OpenSSL::RSA Crypt::OpenSSL::Random --force
sudo cpanm Mail::IMAPClient JSON::WebToken Test::MockObject 
sudo cpanm Unicode::String Data::Uniqid
</pre>

## Step 3: update apt-cache

<pre class="language-bash">
apt-file update
</pre>

## Step 4: Clone and build imapsync

The build process will automatically mount imapsync in your <code  class="language-bash">/usr/bin</code> directory so that is ready to use immediately.

<pre class="language-bash">
git clone https://github.com/imapsync/imapsync.git
cd imapsync
mkdir -p dist
sudo make install
</pre>

Now you have a working imapsync on your Debian-based linux distro of your choice 🙂 to run it, try

<pre class="language-bash">
imapsync \
--host1 mail.host.it \ # from this mail server
--user1 "info@host.it" \
--password1 myBeautifulFakePassword \
--ssl1 \ # the --ssl{1|2} Flag serves to let imapsync know that you're connecting to SSL secured hosts
--host2 mail.newhost.it \ # to this mail server
--user2 "info@newhost.it" \
--password2 anotherBeautifulPassword \
--ssl2 --addheader # the --addheader helps in copying messages without header (eg. Drafts)
</pre>
