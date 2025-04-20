# [Brayworth Web Site](https://brayworth.com)

The Website of Brayworth

## Install

```bash
git clone https://github.com/bravedave/brayworth-www.git brayworth
cd brayworth
composer install
```


# SE Linux

if the system is running SE Linux set the contexts
```bash
# semanage fcontext -a -t httpd_sys_rw_content_t "<path to web>(/.*)?"
restorecon -R <path to web>
```