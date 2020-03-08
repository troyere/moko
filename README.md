# Moko

Note, reminder, todolist manager

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

### Install api vendors

```sh
docker exec -it moko_php bash
./composer.phar install --prefer-dist -o
```
