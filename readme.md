# Brayworth Web Site(https://brayworth.com)

### Deploy to Web Server
1. Create a user account to run composer in
```bash
   useradd -m -s /bin/bash [user]
```

2. Create a folder to hold the deployment
```bash
   mkdir /opt/data
   chmod 777 /opt/data
```

3. Switch to that user and pull in the repository
```bash
   su [user]
   git clone https://github.com/bravedave/brayworth-www.git brayworth
   cd brayworth
   composer install
```

4. To stay up-to-date
```bash
   cd /opt/data/brayWorth
   su [user]
   git pull - maybe git fetch -p is better
   composer update
```
