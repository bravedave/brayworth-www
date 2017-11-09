# Brayworth Web Site

## Deploy to Web Server
1. Create a user account to run composer in
```bash
   * useradd -m -s /bin/bash &lt;user&gt;
```

1. Create a folder to hold the deployment
```bash
   * mkdir /opt/data
   * chmod 777 /opt/data
```

1. Switch to that user and pull in the repository
```bash
   * su &lt;user&gt;
   * `git clone https://github.com/bravedave/brayworth-www.git brayworth`
   * cd brayworth
   * composer install
```

4. To stay up-to-date
```bash
   * cd /opt/data/brayWorth
   * su &lt;user&gt;
   * git pull - maybe git fetch -p is better
   * composer update
```
