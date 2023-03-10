# PUB/SUB example with REDIS - Docker/Docker Composer

Keep two CLIs open to see the magic happen

### Up containers
```
    docker-composer up -d --build
```

### Bash PHP container
```
    docker-compose exec app  bash
    composer require predis/predis
```
### Check REDIS is running
```
    ping redis
```

### Inside Bash, start php application
```
    php index.php
```

## REDIS commands - Obs.: commands to manager Redis pub/sub
### Acess REDIS CLI
```
    redis-cli -h redis
```

### Create message on REDIS CLI - bash
```
    PUBLISH canal_exemplo 'Ola Mundo'
```

### Exit from channel - unsubscribe
```
    PUBLISH canal_exemplo 'exit'
```