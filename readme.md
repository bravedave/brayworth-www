# Brayworth Web Site

## Deploy to Web Server
1. Create a user account to run composer in
<pre><code>
   * useradd -m -s /bin/bash &lt;user&gt;
</code></pre>

1. Create a folder to hold the deployment
<pre><code>
   * mkdir /opt/data
   * chmod 777 /opt/data
</code></pre>

1. Switch to that user and pull in the repository
<pre><code>
   * su &lt;user&gt;
   * `git clone https://github.com/bravedave/brayworth-www.git brayworth`
   * cd brayworth
   * composer install
</code></pre>

4. To stay up-to-date
<pre><code>
   * cd /opt/data/brayWorth
   * su &lt;user&gt;
   * git pull - maybe git fetch -p is better
   * composer update
</code></pre>
