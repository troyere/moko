# Moko

Sandbox for now, trying something with JSON Schema

## Install

### Environment variables

Create your own environment variables : 
- ```./.env```
- ```./api/.env```

> ```.env``` files should be created according to the latest structure given in ```.env.dist``` files 

### Start docker

```sh
docker-compose up
```

> Watch carefully the logs, containers can be up while still having errors

### Install api vendors

```sh
docker exec -it moko_php bash
./composer.phar install --prefer-dist -o
```

## Monitoring

http://localhost:8000/health

## Homepage

http://localhost:8000
