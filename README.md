# Hello World Docker Container in PHP

This repo is meant to show a sample PHP app in a Docker container.

## Running this container locally

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

## Pushing the latest image build to Docker Hub

If the Docker Hub repo that corresponds to this GitHub repo is setup as an "Automated Build" (https://docs.docker.com/docker-hub/builds/), then simply pushing code to the `master` branch will trigger a build in Docker Hub.  For example, see https://hub.docker.com/r/phxdevops/abs-php-container/builds/.

If you wish to manually push a new build to Docker Hub, first build the container and add a tag to indicate the Docker Hub repo and version number:

```
# From the root directory containing the Dockerfile...
docker build -t "phxdevops/abs-php-container:0.2" .

# Now push the build up to Docker Hub
docker push phxdevops/abs-php-container
```

Note that you will need the appropriate permissions to push to Docker Hub.
