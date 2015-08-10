# Hello World Docker Container in PHP

This repo is meant to show a sample PHP app in a Docker container.

## Running this container

From the root directory of this repo, run:

```
docker build .
```

Note the Docker image ID returned (e.g. `5b8cce461b1c`) and run it with:

```
docker run -d -p 80:80 5b8
```

Note that we need only use the first 2 - 3 characters of the image ID (in this case `5b8`) as an alternative to copying & pasting the entire image ID.

## Accessing this container in localdev (Mac)

1. Use the instructions above to build and run the container.

2. Now we need to login to the VM running Docker and `curl` the container on port 80:

   ```
   boot2docker ssh
   curl localhost
   ```
